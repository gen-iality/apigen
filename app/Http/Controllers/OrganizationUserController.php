<?php

namespace App\Http\Controllers;

use App\OrganizationUser;
use App\User;
use App\Http\Resources\OrganizationUserResource;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class OrganizationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $OrganizationUsers = OrganizationUserResource::collection(
            OrganizationUser::where('organization_id', $id)
            ->paginate(config('app.page_size'))
        );
        return $OrganizationUsers;
    }

    /**
     * Store a newly created resource in storage.
     * En el request llega el email del usuario
     * Buscamos la información del usuario por el correo
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        if($data['names']){
            $data['displayName'] = $data['names'];
            unset($data['names']);
        }

        $user = User::updateOrCreate($data);
        
        $UserOrganization = [
            "userid" => $user->id,
            "organization_id" => $data['organization_id'],
        ];
        $result = OrganizationUser::updateOrCreate($UserOrganization);
        return $result;
    }


    /**
     * Display the specified resource.
     *
     * /users/organization/{id_event}/show?userid=user_id
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $organization_id)
    {
        $OrganizationUser = OrganizationUserResource::collection(
            OrganizationUser::where('organization_id', $organization_id)->where('userid', $request->userid)
            ->paginate(config('app.page_size'))
        );
        return $OrganizationUser;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
/*     public function update(Request $request, OrganizationUser $id)
    {
        //
        $data = $request->json()->all();
        $id->fill($data);
        $id->save();
        return $id;
    }
 */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = $request->json()->all();
        $userOrganization = OrganizationUser::where('userid', $data['userid'])->where('organization_id',$data['organization_id']);
        return (string)$userOrganization->delete();
    }

    public function userOrganizations($user_id){
        $OrganizationsUser = OrganizationUserResource::collection(
            OrganizationUser::where('userid', $user_id)
            ->paginate(config('app.page_size'))
        );
        return $OrganizationsUser;
    }
}
