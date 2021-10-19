<?php

namespace App\Http\Controllers;

use App\Account;
use App\Rol;
use App\Organization;
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
                'names' => 'required',
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
        
        $user = Account::where('email', $data['email'])->first();        
        if (!$user){
        //Buscamos el usuario por email para saber si ya existe o crearlo
        $user = Account::updateOrCreate(['email'=>$data['email']],$data);
        }
 
        //Esto como que no se usa de afan no pudimos probar lo dejamos
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

        
        $model = OrganizationUser::where('userid', $user->id)->first();
              

        //Si algun campo no se envia para importar, debe mantener los datos ya guardados en la base de datos
        if ($model){
            //var_dump($model->properties);die;
            $UserOrganization["properties"] = array_merge($model->properties,$UserOrganization["properties"]);
        }

        
        $result = OrganizationUser::updateOrCreate(["userid"=>$user->id],$UserOrganization);
        //toca hacer esta consulta para traer los datos actualizados updateOrCreate no lo hace
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

    /**
     * 
     */
    public function createUserAndAddtoOrganization(Request $request, $organization_id)
    {
        $data = $request->json()->all();

        $validations = [
            'properties.email' => 'required|email',
        ];

        $validator = Validator::make(
            $data,
            $validations
        );

        $organization = Organization::find($organization_id);
        $user_properties = $organization->user_properties;


        if (isset($data['properties'])) {
            $userData = $data['properties'];

            if (!empty($userData["password"]) && strlen($userData["password"]) < 6) {
                return "minimun password length is 6 characters";
            }
        }
        
        //Se validan los campos que no aceptan datos, si no informativos
        foreach ($user_properties as $user_property) 
        {
            if ($user_property['mandatory'] !== true || $user_property['type'] == "tituloseccion") {
                continue;
            }
            $organization = $user_property['name'];
        }

        if ($validator->fails()) {
            return response(
                $validator->errors(),
                422
            );
        }
        $user = Account::updateOrCreate(['email'=> $data['properties']['email']], $data);
         /* ya con el usuario actualizamos o creamos el organizationUser */         
        $matchAttributes = ["organization_id" => $organization_id, "account_id" => $user->_id];
        $data += $matchAttributes;                          
        $model = OrganizationUser::where($matchAttributes)->first();

        //Account rol assigned by default
        if (!isset($data["rol_id"])) {
            $rol = Rol::where('level', 0)->first();
            if ($rol) {
                $data["rol_id"] = $rol->_id;
            } else {
                //Se supone este es un rol por defecto (asistente) si todo el resto falla
                $data["rol_id"] = "60e8a7e74f9fb74ccd00dc22";
            }

        }

        if ($model) {
            //Si algun campo no se envia para importar, debe mantener los datos ya guardados en la base de datos
            $data["properties"] = array_merge($model->properties, $data["properties"]);
            $model->update($data);        
        } else {
            $model = OrganizationUser::create($data);
        }


        //Creamos un token para que se pueda autologuear el usuario
        $auth = resolve('Kreait\Firebase\Auth');
        $signInResult = null;
        
        if (!$signInResult) 
        {
            $pass = (isset($userData["password"])) ? $userData["password"] : $userData["email"];

            //No conocemos otra forma de generar el token de login sino forzando un signin
            if (isset($organizationUser->user->uid)) 
            {

                $updatedUser = $auth->changeUserPassword($organizationUser->user->uid, $pass);
                $signInResult = $auth->signInWithEmailAndPassword($organizationUser->user->email, $pass);
                $organizationUser->user->refresh_token = $signInResult->refreshToken();
                $organizationUser->user->save();
            }
        }

        if ($signInResult && $signInResult->accessToken()) {
            $organizationUser->user->initial_token = $signInResult->accessToken();
        } else if ($signInResult && $signInResult->idToken()) {
            $organizationUser->user->initial_token = $signInResult->idToken();
        }

        // $response = new OrganizationUserResource($organizationUser);
        return $model;


    }

}
