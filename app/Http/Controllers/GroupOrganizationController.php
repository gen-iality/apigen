<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Event;
use App\GroupOrganization;
use App\OrganizationUser;
use Illuminate\Http\Request;

class GroupOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $organizationId)
    {
        // Grupos por organizacion
        $groupsByOrganization = GroupOrganization::where(
            'organization_id',
            $organizationId
        )->get();

        // Contar cuantos evento pertenecen a ese grupo
        foreach ($groupsByOrganization as $group) {
            $countEvents = Event::where(
                'group_organization_id',
                $group->_id
            )->count();

            $group['amount_events'] = $countEvents;
        }

        return $groupsByOrganization;
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
    public function store(Request $request, $organizationId)
    {
        $request->validate([
            'name' => 'required|string',
            'free_access_organization' => 'required|boolean'
        ]);

        $data = $request->json()->all();
        $data['organization_id'] = $organizationId;
        $groupOrganization = GroupOrganization::create($data);

        return response()->json(compact('groupOrganization'), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($organizationId, GroupOrganization $groupOrganization)
    {
        return compact('groupOrganization');
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
    public function update(Request $request, $organizationId, GroupOrganization $groupOrganization)
    {
        //$request->validate([
        //    'name' => 'required|string'
        //]);

        $data = $request->json()->all();
        $groupOrganization->fill($data);
        $groupOrganization->save();

        return response()->json(compact('groupOrganization'), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        $organizationId,
        GroupOrganization $groupOrganization
    ) {
        // Desasociar groupOrganization a todos los eventos
        //Event::where(
        //    'group_organization_id',
        //    $groupOrganization->_id
        //)->update(['group_organization_id' => null]);

        $groupOrganization->delete();
        return response()->json([], 204);
    }

    /**
     * Remove delete organization user from group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteOrganizationUser(
        $organizationId,
        GroupOrganization $groupOrganization,
        OrganizationUser $organizationUser
    ) {
        // Eliminar usuario de todos los eventos
        foreach ($groupOrganization->event_ids as $id) {
            Attendee::where('event_id', $id)
                // solo creado mediante free_access
                ->where('free_access', true)
                ->where('account_id', $organizationUser->account_id)
                ->delete();
        }

        // Eliminar usuario de grupo
        $userIndex = array_search(
            $organizationUser->_id,
            $groupOrganization->organization_user_ids
        );

        $organizatorIds = $groupOrganization->organization_user_ids;
        array_splice($organizatorIds, $userIndex, 1);

        $groupOrganization['organization_user_ids'] = $organizatorIds;
        $groupOrganization->save();

        return response()->json([], 204);
    }

    /**
     * Remove delete organization user from group.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent(
        $organizationId,
        GroupOrganization $groupOrganization,
        Event $event
    ) {
        // Eliminar usuarios del evento

        // Eliminar evento de grupo
        $eventIndex = array_search(
            $event->_id,
            $groupOrganization->event_ids
        );

        $eventIds = $groupOrganization->event_ids;
        array_splice($eventIds, $eventIndex, 1);

        $groupOrganization['event_ids'] = $eventIds;
        $groupOrganization->save();

        return response()->json([], 204);
    }
}
