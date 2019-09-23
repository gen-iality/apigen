<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Certificate;
use App\Event;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use Storage;
use PDF;
use Mail;

/**
 * @resource Event
 *
 *
 */
class CertificateController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new Certificate();
    var_dump($a->getTable());
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return JsonResource::collection(
            Certificate::paginate(config('app.page_size'))
        );
        //$events = Event::where('visibility', $request->input('name'))->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $result = new Certificate($data);
        $result->save();
        return $result;
        
    }
    public function delete($id)
    {
        $res = $id->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $Certificate = Certificate::findOrFail($id);
        $response = new JsonResource($Certificate);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $Certificate = Certificate::find($id);
        $Certificate->fill($data);
        $Certificate->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,string $id)
    {  
        $Certificate = Certificate::findOrFail($id); 
        return (string)$Certificate->delete();
            
    }


    public function indexByEvent(Request $request, String $event_id)
    {
        $query = Certificate::where("event_id", $event_id);
        $results = $query->get();
        return JsonResource::collection($results);
    }

    public function certificatePdf(Request $request)
    {

        
        //$content = Certificate::where("content"); 
        $image=$request->input("image");
        $content=$request->input("content");
       
        //$contentqry = Certificate::where("content", $id);
        //$backgroundqry = Certificate::where("background", $id);

        //$attendee = Attendee::scope()->backgrounddOrFid($attendee_id);
        
        $data = [
            'content'   => $content,
            'image'     => $image,
        ];
                
        $cedula = strstr($datos,'"iden">');
        $cedula = strstr($cedula,'</span>',true) ;
        $cedula = (int) filter_var($cedula, FILTER_SANITIZE_NUMBER_INT);
        if($cedula = o){echo "cedula no encontrada";} 
        echo '<script>console.log("entry now")</script>';
        if ($request->get('download') == '1') {

            
            $pdf = PDF::loadview('Public.ViewEvent.Partials.certificate', $data);
    
            $pdf->setPaper(
                'letter',  'landscape'
            );
            /*
            FUNCION DE ENVIAR CORREO
            Mail::send('Public.ViewEvent.Partials.certificate', $data, function ($message) use ($data,$pdf){
                $message->to("PARAMETRO DE CORREO",'PARAMETRO DE NOMBRE')
                ->subject("Tus certificados para el evento","PARAMETRO DE NOMBRE EVENTO")
                ->attachData($pdf->download(),'Tickets.pdf');
                });
            };*/

            
            return $pdf->download('Tickets.pdf');
        }
        return view(
            'Public.ViewEvent.Partials.certificate', $data
        );
       }
        //return view('Public.ViewEvent.Partials.PDFTicket', $data);    
    


    public function generateCertificate(Request $request)
    {

        $data = $request->json()->all();
        
        
        //$contentqry = Certificate::where("content", $id);
        //$backgroundqry = Certificate::where("background", $id);

        //$attendee = Attendee::scope()->backgrounddOrFid($attendee_id);
        
        /*$data = [
            'content'   => $content,
            'image'     => $image,
        ];*/
        try {
            echo "entry on";
            $cedula = strstr($data,'"iden">');
            echo "entry on 2";
            $cedula = strstr($data,'</span>',true) ;
            echo $cedula."entry on 3";
            echo '<script>console.log("entry now")</script>';
            $cedula = (int) filter_var($cedula, FILTER_SANITIZE_NUMBER_INT);
            if($cedula = 0){ echo "cedula no encontrada"; } 
            echo $cedula;    
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        
        if ($request->get('download') == '1') {

            
            $pdf = PDF::loadview('Public.ViewEvent.Partials.certificate', $data);
    
            $pdf->setPaper(
                'letter',  'landscape'
            );
            /*
            FUNCION DE ENVIAR CORREO
            Mail::send('Public.ViewEvent.Partials.certificate', $data, function ($message) use ($data,$pdf){
                $message->to("PARAMETRO DE CORREO",'PARAMETRO DE NOMBRE')
                ->subject("Tus certificados para el evento","PARAMETRO DE NOMBRE EVENTO")
                ->attachData($pdf->download(),'Tickets.pdf');
                });
            };*/

            return $pdf->download('Tickets.pdf');
        }
        return view(
            'Public.ViewEvent.Partials.certificate', $data
        );
    }
        //return view('Public.ViewEvent.Partials.PDFTicket', $data);    
}