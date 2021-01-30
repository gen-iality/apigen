<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Category;
use App\Event;
use App\ZoomHost;
use App\RoleAttendee;
use Aws\S3\S3Client;
use Aws\Credentials\Credentials;
use Aws\S3\Transfer;
use Carbon\Carbon;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\MultipartUploader;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Spatie\ResponseCache\Facades\ResponseCache;
use App\evaLib\Services\FilterQuery;
use Log;

/**
 * @resource Event
 */
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $event_id, FilterQuery $filterQuery)
    {
        $input = $request->all();
        $query  = Activities::where("event_id", $event_id);

        //por defecto lo ordenamos por fecha de inicio descentente
        if (!isset($input['orderBy'])){
            $input['orderBy'] = '[{"field":"datetime_start","order":"asc"}]';
        }
        $results = $filterQuery::addDynamicQueryFiltersFromUrl($query, $input);
        return JsonResource::collection($results);
    }   

    public function indexByHost(Request $request, $event_id, $host_id)
    {
        return JsonResource::collection(
            Activities::where("event_id", $event_id)->where('host_ids', $host_id)->paginate(config('app.page_size'))
        );
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $data["event_id"] = $event_id;

        $data["date_start_zoom"] =  Carbon::parse($data["datetime_start"]);            
        $data["date_start_zoom"] = $data["date_start_zoom"]->format('Y-m-d\TH:i:s');
        
        
        $activity = new Activities($data);     
        $activity->save();

        // var_dump($data);die;
        if(isset($data["activity_categories_ids"])){
            $activity_categories_ids = $data["activity_categories_ids"];
            $activity->activity_categories()->attach($activity_categories_ids);
        }
        if(isset($data["host_ids"])){
            $host_ids = $data["host_ids"];
            $activity->hosts()->attach($host_ids);
        }
        if(isset($data["type_id"])){
            $type_id = isset($data["type_id"]);
            $activity->type()->push($type_id); 
        }
        if(isset($data["space_id"])){
            $space_id = $data["space_id"];
            $activity->space()->push($space_id);            
        }
        if(isset($data["access_restriction_rol_ids"])){
            $ids = $data["access_restriction_rol_ids"];
            $activity->access_restriction_roles()->attach($ids);
        }
        //Cargamos de nuevo para traer la info de las categorias
        $activity = Activities::find($activity->id);  
        

        return $activity;
    }
    

    public function createMeeting(Request $request,$event_id,$activity_id){

        $data = $request->json()->all();

        $datetime_start_activity = date_format(Carbon::parse($data["activity_datetime_start"]),'Y-m-d');

        $where_date_exist = Activities::where('datetime_start', 'like', '%'.$datetime_start_activity.'%')->where("zoom_host_id","!=",null)->pluck("zoom_host_id");
        
        $available_host = ZoomHost::whereNotIn("id", $where_date_exist)->first();
        if( $available_host == null){
            return "No available host for this day :(";
        }
    
        $client = new Client();
        $url = config('app.zoom_server')."/crearroom";
        $headers =  [ 'Content-Type' => 'application/json' ];
        
        $request = $client->post($url, 
            ['json' => [
                "activity_name" => $data["activity_name"],
                "agenda" => $data["activity_description"],
                "activity_id" => $activity_id,
                "event_id" => $event_id,
                "host_id" => $available_host->id
                ]
            ],
            ['headers' => $headers
        ]); 

        $activity = Activities::find($activity_id);
        

        return $request;
    }

    // endpoint que recibe el webhook de zoom guarda la info en mongo y la traspasa a s3 de aws
    public function storeMeetingRecording(Request $request)
    {
        $data = $request->json()->all();
        $meeting_id = $data["payload"]["object"]["id"];
        $token = $data["download_token"];
        echo "id reunion".$meeting_id."<br>";
        $zoom_array = $data["payload"]["object"]["recording_files"];
        foreach ($zoom_array as $key => $value) {
            echo "tipo archivo".$value["file_type"]."<br>";
             if($value["file_type"] == "MP4" ){
                $zoom_url = $value["download_url"];
                echo $zoom_url;

                break;
             }
        }
        $values["meeting_video"] = $zoom_url;
        $activity = Activities::where("meeting_id",$meeting_id)->first();

        echo "actividad".$activity->_id."<br>";
        $activity->fill($values);
        $activity->save();

        $client = new \GuzzleHttp\Client();     
        $headers = [
            'Authorization' => 'Bearer ' . $token,        
        ];
        $request = $client->get($zoom_url."?access_token=".$token, ['allow_redirects' => false],[
            'headers' => $headers
        ]); 

        $cookies = $request->getHeaderLine('Set-Cookie');
        $source = $request->getHeaderLine('Location');
        
        $key = $meeting_id.Carbon::now().".mp4";

        $credentials = new Credentials(config('app.aws_key'),config('app.aws_secret'));

        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'sa-east-1',
            'credentials' => $credentials
        ]);
          
        $uploader = new MultipartUploader($s3,$source, [
            'cookies' => $cookies,
            'bucket' => 'meetingsrecorded',
            'key'    => $key,
            'ACL'    => 'public-read'
        ]);

        $result = $uploader->upload();
        $values["zoom_meeting_video"] = $result["Location"];
        str_replace('//','/',$values["meeting_video"]);
        $activity->fill($values);
        $activity->save();
        return $activity;

    }
    // endpoint destinado a indexar las conferencias del s3 de aws
    public function indexConferences(Request $request)
    {
        $credentials = new Credentials(config('app.aws_key'),config('app.aws_secret'));
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'sa-east-1',
            'credentials' => $credentials
        ]);
        
        return $s3->getPaginator('ListObjects', [
            'Bucket' => 'meetingsrecorded'
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Activities  $Activities
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        $activity = Activities::findOrFail($id);
        return $activity;
    }


    // endpoint destinado a la duplicacion de una actividad a idioma ingles
    public function duplicate($event_id, $id)
    {
        $activities_in_es = Activities::findOrFail($id);
        $Activities = Activities::findOrFail($id);
        $data['duplicate'] = true;
        $Activities->fill($data);
        $Activities->save();     
       
        if(!empty($activities_in_es->duplicate)){
            return "actividad ya duplicada";
        }
        $activities_in_es->get();
        $activities_in_en = json_decode(json_encode($activities_in_es),true);
        $activities_in_en["locale"] = "en";
        $activities_in_en["locale_original"] = $activities_in_en['_id'];
        $activity = new Activities($activities_in_en);
        $activity->save();
        return $activity;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activities  $Activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        $data = $request->json()->all();

        $Activities = Activities::findOrFail($id);

        if(isset($data["zoom_host_id"]))
        {   
                       
            $data['date_end_zoom'] = Carbon::parse($Activities["datetime_end"])->addMinutes(60);        
            $data['date_end_zoom'] = $data['date_end_zoom']->format('Y-m-d\TH:i:s');

        }
        $Activities->fill($data);
        $Activities->save();     
        if(isset($data["activity_categories_ids"])){
            $activity_categories_ids = $data["activity_categories_ids"];
            $Activities->activity_categories()->detach();
            $Activities->activity_categories()->attach($activity_categories_ids);
        }
        if(isset($data["host_ids"])){
            $host_ids = $data["host_ids"];
            $Activities->hosts()->detach();
            $Activities->hosts()->attach($host_ids);
        }
        if(isset($data["type_id"])){
            $type_id = isset($data["type_id"]);
            $Activities->type()->pull($data["type_id"]);
            $Activities->type()->push($type_id); 
        }        
        if(isset($data["space_id"])){
            $space_id = $data["space_id"];
            $Activities->space()->pull($data["space_id"]);
            $Activities->space()->push($space_id);            
        }
        if(isset($data["access_restriction_rol_ids"])){
            $ids = $data["access_restriction_rol_ids"];
            $Activities->access_restriction_roles()->detach();
            $Activities->access_restriction_roles()->attach($ids);       
        }
        $activity = Activities::find($Activities->id);
       

        return $activity;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event_id, $id)
    {
        $Activities = Activities::findOrFail($id);
        ResponseCache::clear();

        return (string) $Activities->delete();
    }

    /**
     * 
     */
    public function hostAvailability(Request $request , $event_id , $activity_id)
    {
        $data = $request->json()->all();
        
        //Filtrar reuniones por fecha para ver que hosts se estan usando
        $hostsUsed  = Activities::where('date_end_zoom' , '>', $data['date_start_zoom'])
                            ->where('date_start_zoom' , '<' ,  $data['date_end_zoom'])
                            ->pluck('zoom_host_id');      

        //Obtener los host habilitados para la organización
        $enabledHosts  = ZoomHost::pluck('id');        

        //Se crean arrays para comparar y ver que host están disponibles

            //Array de los host que están siendo usados
            $occupiedHosts  = []; 

            //Array de los host disponibles para la organización
            $hostAvailabilityArray = [];

        //Foreach que arma el array con los host que estan siendo utilizados
        foreach($hostsUsed as $host)
        {
            array_push($occupiedHosts , $host);
        }
        
        //Foreach que arma el array con los host que estan disponibles de la organización
        foreach($enabledHosts as $enabledHost)
        {
            array_push($hostAvailabilityArray , $enabledHost);
        }

        //Comparación para ver los array disponibles
        $hostUpdate =  array_diff($hostAvailabilityArray, $occupiedHosts);


        if(isset($hostUpdate[1]))
        {
            //Obtener el primer host disponible a la actividad a la que se le está creando la sala, para que lo pueda utilizar 
            $hostUpdate =  $hostUpdate[1];
            $hostName =  ZoomHost::where('id' , $hostUpdate)->first();
            $activity = Activities::find($activity_id);
            $activity->zoom_host_id = $hostUpdate;
            $activity->zoom_host_name = $hostName->first_name; 
            $activity->save();

            return $activity;
        }
        
        return response()->json([
            "message" => "No hay host disponible para las horas ingresadas"
        ] , 409);
    }
}

