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
        $default_event_styles = config('app.app_configuration');
        $stlyes_validation = array_merge($default_event_styles, $styles);
        return $stlyes_validation;
    }

    

}
