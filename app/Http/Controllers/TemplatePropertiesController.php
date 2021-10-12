<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\TemplateProperties;
use App\Organization;
use App\UserProperties;
use App\TamplateProeprties;

class TemplatePropertiesController extends Controller
{
    /**
     * _index_:list all templates by organization
     *
     * @authenticated
     * 
     * @urlParam organization required organization_id
     * 
     */
    public function index($organization)
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
     * _store_: create a new template for organization
     *
     * @authenticated
     * @urlParam organization required organization_id
     * 
     * 
     */
    public function store(Request $request, $organization_id)
    {
        $data = $request->json()->all();

        $organization = Organization::find($organization_id)->template_properties();
        $template = new TemplateProperties($data);
        $organization->save($template);

        return new JsonResource($organization);        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showTemplateEvent($template_id)
    {
        $template_id = TemplateProperties::findOrFail($template_id->id);
        return $template_id;
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
