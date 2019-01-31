<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Resources\OrganizationUserResource;
use App\OrganizationUser;
use Illuminate\Http\Request;
use Validator;
use Auth;

/** 
 * Undocumented class
*/

class OrganizationUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * muestra los usuarios de una organización
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, String $organization_id)
    {   
        $OrganizationUsers = OrganizationUserResource::collection(
            OrganizationUser::where('organization_id', $organization_id)
                ->paginate(config('app.page_size'))
        );
        return $OrganizationUsers;
    }

    /**
     * Display only organization of user.
     *
     * @return \Illuminate\Http\Response
     */
    public function currentUserindex(Request $request, String $organization_id)
    {
        $user = Auth::user();

        return OrganizationUserResource::collection(
            OrganizationUser::where('userid', $user->id)->where('organization_id',$organization_id)
                ->paginate(config('app.page_size'))
        );
    }

    /** 
     * Store a newly created resource in storage.
     * En el request llega el email del usuario
     * Buscamos la información del usuario por el correo
     * Guarda un usuario de una origanización
     * {
     * "email" : "test+11@mocionsoft.com",
     * "names": "test11",
     * "organization_id" : "5bbfce07c065863da36b821e"
     * }
     *
     * @param  \Illuminate\Http\Request  $request
     * @param String $organization_id
     * @return \Illuminate\Http\Response
     *///, 
    public function store(Request $request,String $organization_id)
    {
        $data = $request->json()->all();

        /* Se valida que venga el name y el email */

        $validator = Validator::make(
            $data, [
                'name' => 'required',
                'email' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response(
                $validator->errors(),
                422
            );
        };

        //por si envian el names en mayuscula        
        if (isset($data['name'])) {
            $data['displayName'] = $data['name'];
            unset($data['names']);
        }
        // return $data;
        $user = Account::updateOrCreate($data);

        if (isset($data['properties'])) {
            $tmp = $data['properties'];
            if (isset($data["email"])) $tmp["email"] = $data["email"];
            if (isset($data["names"])) $tmp["names"] = $data["names"];
        }       

        $UserOrganization = [
            "userid" => $user->id,
            "organization_id" => $organization_id,
            "properties" => $data
        ];

        $result = OrganizationUser::updateOrCreate($UserOrganization);
        $model = OrganizationUser::find($result->id);
        return $model;
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organization_id, $organization_user_id){
        
        $data = $request->json()->all();
        $userOrganization = OrganizationUser::where('organization_id',$organization_id)->where('userid',$organization_user_id)->first();
        $userOrganization->properties = $data;
        $userOrganization->save();
        return $userOrganization;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrganizationUser  $organizationUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $organization_id, $organization_user_id)
    {
        $userOrganization = OrganizationUser::findorfail($organization_user_id);
        return (string) $userOrganization->delete();
    }

    /**
     * Get user organizations
     *This controller get the organizations of user.

     * @param [type] $user_id
     * @return OrganizationsUser
     */
    public function userOrganizations($user_id)
    {
        $OrganizationsUser = OrganizationUserResource::collection(
            OrganizationUser::where('userid', $user_id)
                ->paginate(config('app.page_size'))
        );
        return $OrganizationsUser;
    }

}
