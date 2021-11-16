<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\Attendee;
use App\OrganizationUser;
use App\Account;
use App\Organization;
use App\State;
use Storage;

class EventService
{   
    /**
     * _addOrganizationMenu_: add to Event the items menu of the organization. 
     */
    public static function addEventMenu($event)
    {   

        $organization = Organization::findOrFail($event->organizer_id);
         
        if(isset($organization->itemsMenu))
        {
            $event->itemsMenu = $organization->itemsMenu; 
            $event->save();
            return $event;
        }

        
        return 'No hay items en la organización';
    }

    /**
     * 
     */
    public static function AddDefaultStyles($styles, $event)
    {
        $default_event_styles = config('app.default_event_styles');

        $organization = Organization::findOrFail($event->organizer_id);
        
        if(isset($organization->styles))
        {
            $event->styles = $organization->styles; 
            $event->save();
            $stlyes_validation = array_merge($default_event_styles, $organization->styles);
            
        }else{
            $event->styles =  $default_event_styles;
            $event->save();
            $stlyes_validation = array_merge($default_event_styles,$styles);

        }
        return $stlyes_validation;
    }


    public static function AddAppConfiguration($styles)
    {
        $default_event_styles = config('app.default_event_styles');
        $stlyes_validation = array_merge($default_event_styles, $styles);
        return $stlyes_validation;
    }

   /**
    * This end point is call when add document user in the event.
    */
    public function addDocumentUserToEvent(Request $request, $event_id)
    {
        $data = $request->json()->all();
        $event = Event::findOrFail($event_id);
        $event->extra_config->document_user = $data;
        $event->save();

        return $event;
    }

    
    

}
