<?php

namespace App\Http\Controllers;

use App\Account;
use App\Attendee;
use App\Rol;
use App\Organization;
use App\Http\Resources\OrganizationUserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\OrganizationUser;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\evaLib\Services\OrganizationServices;
use App\Event;

/** 
 * @group Organization User
 * This model is the 
*/
class OrganizationUserController extends Controller
{
    /**
     * _index_: List all user of a organization  
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
     * _store_: create a new user in a organization
     * 
     * @urlParam organization required organization_id
     * 
     * @bodyParam email email required user email Example: test+11@mocionsoft.com
     * @bodyParam names string required user names Example: test
     * 
     */
    public function store(Request $request,String $organization_id)
    {
        $data = $request->json()->all();

        $validations = [
            'properties.email' => 'required|email:rfc,dns',
            'properties.names' => 'required',
            'properties.password' => 'min:6',

        ];

        $validator = Validator::make(
            $data,
            $validations
        );

        $organization = Organization::findOrFail($organization_id);
        $user_properties = $organization->user_properties;
        
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
        $email = $data['properties']['email'];
        //Se valida si ya existe el usurio
        $user = Account::where("email" , $email)->first();  
        $password = isset($data["properties"]["password"]) ? $data["properties"]["password"] : $email;
        if(empty($user))
        {
            $user = Account::create([
                "email" => $email,
                "names" => $data["properties"]["names"],
                "password" => $password
            ]);
        }

         /* ya con el usuario actualizamos o creamos el organizationUser */
        $matchAttributes = ["organization_id" => $organization_id, "account_id" => $user->_id];
        $data += $matchAttributes;
        $model = OrganizationUser::where($matchAttributes)->first();

        //Account rol assigned by default
        if (!isset($data["rol_id"])) {
            $data["rol_id"] = Rol::ID_ROL_ATTENDEE;
        }

        if ($model) {
            //Si algun campo no se envia para importar, debe mantener los datos ya guardados en la base de datos
            $data["properties"] = array_merge($model->properties, $data["properties"]);
            $model->update($data);
        } else {
            $model = OrganizationUser::create($data);
        }

        //Add the member in all Events of the orgnization
	$createIntoEvents = $request->query('createIntoEvents') === 'true' ?
	    true : false;
	if($createIntoEvents) {
	    OrganizationServices::createMembers($model);
	}

        // $response = new OrganizationUserResource($organizationUser);
        return $model;
    }

    /**
     * _update_: update a register user in organization.
     * 
     * @autenticathed
     * 
     * @urlParam organization required organization id
     * @urlParam user  required organization id
     * 
     */
    public function update(Request $request, $organization_id, $organization_user_id)
    {
        $data = $request->json()->all();
        $userOrganization = OrganizationUser::findOrFail($organization_user_id);
        $userOrganization->fill($data);
        $userOrganization->save();

        return $userOrganization;
    }

    /**
     * _destroy_: delete a sapcific user in the organization
     * @autenticathed
     * 
     * @urlParam organization required organization id
     * @urlParam organizationuser  required organization user id
     */
    public function destroy(Request $request, $organization_id, $organization_user_id)
    {
        $userOrganization = OrganizationUser::findorfail($organization_user_id);
        return (string) $userOrganization->delete();
    }

    /**
     * Get user organizations
     * This controller get the organizations of user.
     *
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
     * _meOrganizations_: list user's organizations.
     * These organizations
     * @authenticated
     * 
     */
    public function meOrganizations(Request $request)
    {   
        $user = Auth::user();
        $query =  OrganizationUser::where('account_id' , $user->_id)->paginate(config('app.page_size'));

        return OrganizationUserResource::collection($query);
    }

    /**
     * _show_: view a specific organization user
     * @authenticated
     * 
     * @urlParam organization The id of the organization
     * @urlParam organizationuser The id of the organization
     */
    public function show($organizaton_id, $orgUser)
    {   
        $query = OrganizationUser::findOrFail($orgUser);
        return $query;
    }

    /**
     * _meInOrganization_: view the information an user specific into an organization
     * @authenticated
     * 
     * @urlParam organization The id of the organization
     */
    public function meInOrganization($organizaton_id)
    {
        $user = Auth::user();
        $query =  OrganizationUser::where('account_id' , $user->_id)
                    ->where('organization_id' , $organizaton_id)
                    ->paginate(config('app.page_size'));

        return $query;
    }


    /**
     * _listEventsByOrganizationUser_: Lista de eventos que pertenescan a una
     * organizacion y que el organization user este registrado
     *
     * @urlParam organization The id of the organization
     * @urlParam organization_user_id The id of the orgnization user
     */
    public function listEventsByOrganizationUser(Request $request, Organization $organization, Account $user)
    {
	// devolver evento con event_user
	$eventUser = $request->query('event_user') === 'true' ?
	    true : false;

	$eventsByOrganization = Event::where('organizer_id', $organization->_id)->get();

	$events = [];
	// Buscar en que eventos esta registrado el orgnization user
	foreach($eventsByOrganization as $event) {
	    $eventUserExists = Attendee::where('event_id', $event->_id)
		->where('account_id', $user->_id)
		->first();

	    $eventUserExists && array_push($events, [
	        'event' => $event,
	        'event_user' => $eventUser ? $eventUserExists : null
	    ]);
	}

	return response()->json(['data' => $events], 200);
    }
}
