<?php
/**
 *
 */
namespace App\evaLib\Services;
use Storage;
use App\EventUser;
use App\Rol;
use App\OrganizationUser;
use App\State;


class EvaRol
{
    public function doSomethingUseful()
    {
        return 'Output from DemoOne';
    }

    /**
     * Stores a file in remote storage service returning url
     *
     * @param [type] $filePost
     * @return void
     */
    public function createAuthorAsEventAdmin($authorId, $eventId)
    {
        if (!$authorId) {
            return '';
        }
        $rol = Rol::where('level', -1)->first();
        $state = State::first();
        $userEvt = [
            'userid' => $authorId,
            'event_id' => $eventId,
            'rol_id' => $rol->_id,
            'state_id' => $state->_id            
        ];
        $userToEvt = new EventUser($userEvt);
        $userToEvt->save();
        return true;
    }
    
    public function createAuthorAsOrganizationAdmin($authorId, $organizationId)
    {
        if (!$authorId) {
            return '';
        }
        $rol = Rol::where('level', -1)->first();
        $userOrg = [
            'userid' => $authorId,
            'organization_id' => $organizationId,
            'rol_id' => $rol->_id,
        ];
        $userToOrg = new OrganizationUser($userOrg);
        $userToOrg->save();
        return true;
    }
}
