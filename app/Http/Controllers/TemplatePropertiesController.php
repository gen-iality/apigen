<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\TemplateProperties;
use App\Event;
use App\UserProperties;

class TemplatePropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $query = TemplateProperties::paginate(config("app.page_size"));
     return JsonResource::collection($query);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $template = new TemplateProperties($data);
            $template->save();
            return new JsonResource($template);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($template_id)
    {
        $template_id = TemplateProperties::findOrFail($template_id);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$template_id)
    {
        $data = $request->json()->all;
        $template = TemplateProperties::findOrFail($template_id);
        $template->fill($data);
               
        $template->save();

        return $template;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    /**
     * Este Metodo va permitir agregar un Template a un Evento
     */
    public function addTemplateEvent($event_id,$template_id)
    {
        $template=TemplateProperties::find($template_id);
        $event=Event::find($event_id);
        foreach ($template->user_properties as $propertie)
        {                                            
            $model = new UserProperties($propertie);
            $event->user_properties()->save($model);
        }

        return $event->user_properties;
    }
}
