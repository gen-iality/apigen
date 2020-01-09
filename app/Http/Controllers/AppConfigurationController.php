<?php

namespace App\Http\Controllers;

use App\Event;
use App\AppConfiguration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class AppConfigurationController extends Controller
{
    public function index(Request $request, $event_id)
    {
        $appconfiguration = AppConfiguration::where("event_id",$event_id)->get();
        $response = new JsonResource($appconfiguration);
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)  
    {
        $appconfiguration = AppConfiguration::where("event_id",$event_id)->get();
        $appconfiguration = json_decode(json_encode($appconfiguration),true);
        if(empty($appconfiguration)){
            $data = $request->json()->all();   
            $data["event_id"] = $event_id;
            $result = new AppConfiguration($data);
            $result->save();
            return $result;
        }else{ 
            $data = $request->json()->all();
            $appconfiguration = AppConfiguration::where("event_id",$event_id)->get();
            $idevent = $appconfiguration[0]->id;
            $appconfiguration = AppConfiguration::find($idevent);
            $appconfiguration->fill($data);
            $appconfiguration->save();            
            return $appconfiguration;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppConfiguration]  $AppConfiguration
     * @return \Illuminate\Http\Response
     */
    public function show($event_id)
    {
        $appconfiguration = AppConfiguration::where("event_id",$event_id)->get();
        $response = new JsonResource($appconfiguration);
        return $response;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id)
    {
        $appconfiguration = AppConfiguration::where("event_id",$event_id)->get();
        $idevent = $appconfiguration[0]->id;
        $appconfiguration = AppConfiguration::find($idevent);
        return (string) $appconfiguration->delete();
    }
}
