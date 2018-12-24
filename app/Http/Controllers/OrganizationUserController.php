<?php

namespace App\Http\Controllers;

use App\OrganizationUser;
use App\Account;
use App\Http\Resources\OrganizationUserResource;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class OrganizationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * muestra los usuarios de una organización
     * @return \Illuminate\Http\Response
     */
    public function index($organization_id)
    {
        $OrganizationUsers = OrganizationUserResource::collection(
            OrganizationUser::where('organization_id', $organization_id)
            ->paginate(config('app.page_size'))
        );
        return $OrganizationUsers;
    }

    /**
     * Store a newly created resource in storage.
     * En el request llega el email del usuario
     * Buscamos la información del usuario por el correo
     * Gurada un usuario de una origanización
     * {
	 * "email" : "test+11@mocionsoft.com",
	 * "names": "test11",
	 * "organization_id" : "5bbfce07c065863da36b821e"
     * }
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

        $user = Account::updateOrCreate($data);
        
        $UserOrganization = [
            "userid" => $user->id,
            "organization_id" => $data['organization_id'],
        ];
        $result = OrganizationUser::updateOrCreate($UserOrganization);
        return $result;
    }


    /**
     * Display the specified resource.
     *  Muestra los datos de un aorganización respecto a un usuario
     * http://localhost/eviusapilaravel/public/api/users/organization/5bbfce07c065863da36b821e?userid=5bbfc2f2c065863da36b8207
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
    public function destroy(Request $request, $organization_id)
    {
        $data = $request->json()->all();
        $userOrganization = OrganizationUser::where('userid', $data['userid'])->where('organization_id',$organization_id);
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
