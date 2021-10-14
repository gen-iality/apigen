<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\TemplateProperties;
use App\Organization;
use App\Event;
use App\UserProperties;
use App\TamplateProeprties;
/**
 * @group Template Properties Organization
 */
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
     $query = Organization::findOrFail($organization)->template_properties()->get(); 
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
     * @bodyParam name strign required name temlate. Example: Template 1
     * @bodyParam user_properties array, if you want to make this structure, see User Properties and User Properties Organization    
     * 
     */
    public function store(Request $request, $organization_id)
    {   
        
        $dataUserProperties = $request->only('template_properties');

        $organization = Organization::findOrFail($organization_id);
        
        for ($i = 0; $i < count($dataUserProperties['template_properties']); $i++) {

            $model = new TemplateProperties($dataUserProperties['template_properties'][$i]);
            
            $organization->template_properties()->save($model);
        }
        
        
        return new JsonResource($organization);        
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
     * _update_: update the specified template propertie.
     * 
     * @authenticated
     * @urlParam organization required organization_id
     * @urlParam templatepropertie required template id     
     * 
     */
    public function update(Request $request,$organization_id,$template_id)
    {
        $data = $request->json()->all();
        $template= Organization::findOrFail($organization_id)->template_properties()->find($template_id);          
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
     * _addtemplateevent_: this metho allow add template to an event.
     * 
     * @authenticated
     * @urlParam event required event_id
     * @urlParan templatepropertie required template_id
     */
    public function addtemplateevent(Request $request, $event_id,$template_id)
    {   
        $data = $request->json()->all();

        $event=Event::findOrFail($event_id);

        $template= Organization::findOrFail($event->organizer_id)->template_properties()->find($template_id);  

        foreach ($template->user_properties as $propertie)
        {                                            
            $model = new UserProperties($propertie);
            $event->user_properties()->save($model);
        }

        return $event->user_properties;
    }
}
