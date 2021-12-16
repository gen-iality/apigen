<?php
/**
 *
 */
namespace App\evaLib\Services;

use App\Attendee;
use App\OrganizationUser;
use App\Account;
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
            'account_id' => $authorId,
            'event_id' => $eventId,
            'rol_id' => $rol->_id,
            'state_id' => $state->_id,
        ];
        
        //cargando los attributos del usuario dentro del Attendee
        $user = Account::find($authorId);
        $userEvt['properties'] = $user->getAttributes();

        $userToEvt = new Attendee($userEvt);
        $userToEvt->save();
        return true;
    }

    public function createAuthorAsOrganizationAdmin($authorId, $organizationId)
    {
        if (!$authorId) {
            return '';
        }
        $rol = Rol::where('level', -1)->first();
        $user = Account::find($authorId);
        $userOrg = [
            'account_id' => $authorId,
            'organization_id' => $organizationId,
            'rol_id' => '5c1a59b2f33bd40bb67f2322',
            'properties' => [
                'names' => $user->names,
                'email' => $user->email
            ]
        ];
        $userToOrg = new OrganizationUser($userOrg);
        $userToOrg->save();
        return true;
    }
}
