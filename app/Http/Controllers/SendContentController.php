<?php

namespace App\Http\Controllers;

use App\SendContent;
use App\Event;
use App\Models\Attendee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Mail;
use PDF;
use Storage;

/**
 * @resource Event
 *
 *
 */
class SendContentController extends Controller
{

    /* por defecto el modelo es en singular y el nombre de la tabla en prural
    //protected $table = 'categories';
    $a = new SendContent();
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
            SendContent::paginate(config('app.page_size'))
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
        $result = new SendContent($data);
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
        } $pdf = PDF::loadview('Public.ViewEvent.Partials.certificate', $data);
        $pdf->setPaper( 'letter',  'landscape' );
        return $pdf->download('Tickets.pdf');
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
     * @param  \App\SendContent  $SendContent
     * @return \Illuminate\Http\Response
     */
    public function show(string $event_id, string $id)
    {
      
        $SendContent = SendContent::findOrFail($id);
        $response = new JsonResource($SendContent);
        return $response;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SendContent  $SendContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,string $event_id, string $id)
    {
        $data = $request->json()->all();
        $SendContent = SendContent::findOrFail($id);
        $SendContent->fill($data);
        $SendContent->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,string $event_id, string $id)
    {
        $SendContent = SendContent::findOrFail($id);
        return (string) $SendContent->delete();

    }

    public function indexByEvent(Request $request, String $event_id)
    {
        $query = SendContent::where("event_id", $event_id);
        $results = $query->get();
        return JsonResource::collection($results);
    }

    public function sendContentGenerated(Request $request)
    {
        echo "hi";die;
        $data = $request->json()->all();

        $pdf = PDF::loadview('Public.ViewEvent.Partials.ContentMail', $data);
        $pdf->setPaper( 'letter',  'landscape' );
        return $pdf->download('content.pdf');
        return view('Public.ViewEvent.Partials.ContentMail', $data);
        $data_single = "tfrdrummer@gmail.com";
        Mail::send("Public.ViewEvent.Partials.ContentMail",$data , function ($message) use ($data,$pdf,$data_single){
            $message->to($data_single,"Evento PMI")
            ->subject("HI¡","VIII Congreso Internacional de Gerencia de Proyectos Bogotá 2019");
        });
        
       
   
        

        
        return view('Public.ViewEvent.Partials.ContentMail', $data);
    
    }

}
