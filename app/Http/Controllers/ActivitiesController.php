<?php

namespace App\Http\Controllers;

use App\Activities;
use App\Category;
use App\Event;
use App\RoleAttendee;
use Aws\S3\S3Client;
use Aws\Credentials\Credentials;
use Aws\S3\Transfer;
use Aws\Common\Exception\MultipartUploadException;
use Aws\S3\MultipartUploader;
use Aws\Exception\AwsException;
use Aws\S3\ObjectUploader;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * @resource Event
 */
class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $event_id)
    {
        $data = $request->json()->all();
        //esta condicion expresa si existe la variable 'locale' en una peticion por json o por url, y valida que valor existe en estas varibles
        $res = (!empty($data['locale']) && $data['locale'] == "en" || !empty($request->input('locale')) && $request->input('locale') == "en") ? "en" : "es";

        if($res=="en"){
            return JsonResource::collection(
               Activities::where("event_id", $event_id)->where('locale', "en")->orderBy('datetime_start', 'asc')->paginate(config('app.page_size')));
        }else{
            return JsonResource::collection(
                Activities::where("event_id", $event_id)->where('locale', '!=', "en")->orderBy('datetime_start', 'asc')->paginate(config('app.page_size')));
        }
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
        
        $activity = new Activities($data);     
        $activity->save();

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
    
    // endpoint que recibe el webhook de zoom guarda la info en mongo y la traspasa a s3 de aws
    public function storeMeetingRecording(Request $request)
    {
        $data = $request->json()->all();
        $meeting_id = $data["payload"]["object"]["id"];
        echo "id reunion".$meeting_id."<br>";
        $zoom_array = $data["payload"]["object"]["recording_files"];
        foreach ($zoom_array as $key => $value) {
            echo "tipo archivo".$value["file_type"]."<br>";
             if($value["file_type"] == "MP4" ){
                $zoom_url = $value["download_url"];
                echo "download_url".$zoom_url."<br>";break;
             }
        }
        $values["meeting_video"] = $zoom_url;
        $activity = Activities::where("meeting_id",$meeting_id)->first();
        echo "actividad".$activity->_id."<br>";
        $activity->fill($values);
        $activity->save();

        $client = new \GuzzleHttp\Client(); 
        
        $request = $client->get($zoom_url, ['allow_redirects' => false]); 
        
        $source = $request->getHeaderLine('location');
        
        $key = $meeting_id.".mp4";

        $credentials = new Credentials(config('app.aws_key'),config('app.aws_secret'));

        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => 'sa-east-1',
            'credentials' => $credentials
        ]);
          
        $uploader = new MultipartUploader($s3,$source, [
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
        return (string) $Activities->delete();
    }
}
