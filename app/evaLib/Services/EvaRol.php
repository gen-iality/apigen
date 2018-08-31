<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\EventUser;
use App\OrganizationUser;
use App\User;
use App\Rol;
use App\State;
use Storage;

class EvaRol
{
    public function doSomethingUseful()
    {
        return 'Output from DemoOne';
    }

/**
 * Stores a file in remote storage service returning url
 *
 * @param int $authorId
 * @param int $eventId
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
            'state_id' => $state->_id,
        ];
        
        //cargando los attributos del usuario dentro del EventUser
        $user = User::find($authorId);
        $userEvt['properties'] = $user->getAttributes();

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
