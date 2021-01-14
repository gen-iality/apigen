<?php

namespace App\Http\Controllers;

use App\evaLib\Services\EvaRol;
use App\Http\Resources\OrganizationResource;
use App\Organization;
use App\Event;
use App\Attendee;
use App\Order;
use App\Account;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use Auth;
use Mail;
use Validator;

/**
 * @group Organization
 */
class OrganizationController extends Controller
{
    /**
     * _meOrganizations_: Listar las organizaciones del usuario logueado
     * 
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function meOrganizations(Request $request)
    {
        return OrganizationResource::collection(
            Organization::where('author', Auth::user()->id)
                ->paginate(config('app.page_size'))
        );
    }

    /**
     *  _index_:Display a listing of the organizations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return OrganizationResource::collection(
            Organization::paginate(config('app.page_size'))
        );
    }

    /**
     * _store_:Store a newly created resource in organizations.
     * 
     * @bodyParam properties[name,email] array 
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, EvaRol $RolService)
    {
        $data = $request->json()->all();

        /* Se le agregan campos obligatorios a la organizaci�n*/

            if(isset($data['properties'])){ 
                $data['properties'] += [
                    ["name" => "email", "unique" => false, "mandatory" => false,"type" => "email"],
                    ["name" => "names", "unique" => false, "mandatory" => false,"type" => "text"]
                ];
            }else{
                $data['properties'] = [
                    ["name" => "email", "unique" => false, "mandatory" => false,"type" => "email"],
                    ["name" => "names", "unique" => false, "mandatory" => false,"type" => "text"]
                ];
            } 

        $model = new Organization($data);
        // return response($model);
        $model->author = Auth::user()->id;

        $user = Auth::user();

        $RolService->createAuthorAsOrganizationAdmin(Auth::user()->id, $model->_id);
        
        $model->save();
        
        if (isset($data['category_ids'])) {
            $model->categories()->sync($data['category_ids']);
        }
        
        
        return new OrganizationResource($model);
    }


    /**
     * _show_: Display the specified organization.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return new OrganizationResource($organization);
    }

    /**
     * _update_: Update the specified resource in organization.
     *
     * @urlParam organization_id required
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $organization_id)
    {
        $organization = Organization::findOrFail($organization_id);
        $data = $request->json()->all();
       
        $organization->fill($data);

        
        $organization->save();

        if (isset($data['category_ids'])) {
            $organization->categories()->sync($data['category_ids']);
        }
        return new OrganizationResource($organization);
    }

    /**
     * _destroy_: Remove the specified organization from storage.
     *
     * @urlParam organization_id required
     * 
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $res = $organization->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }

/**
 * _contactbyemail_: send email to the admin users of an organization
 *  
 * @bodyParam message string required 
 * @bodyParam subject string required 
 * @bodyParam name string required user name
 * @bodyParam email_user string required 
 * 
 * @param Request string $request 
 * @param Sting $organization
 * @return void
 */
    public function contactbyemail(Request $request, $organization_id){

        $data = $request->json()->all();

        $organization = isset($organization_id) ? 
            Organization::find($organization_id) : 
            Organization::find("5e9caaa1d74d5c2f6a02a3c3");

            
        $author = Account::find($organization->author);
       
        // $email =$author->email;

        $rules = [
            'message' => 'required',
            'subject' => 'required',
            'name' => 'required',
            'email_user' => 'required'
 
        ];

        $validator = Validator::make($data, $rules);
        if (!$validator->passes()) {
            return response()->json(['errors' => $validator->errors()->all()], 400);
        }

        
        $emailsAdmin =  Account::where("others_properties.role" , "admin")
                                ->where("organization_ids" , $organization_id)
                                ->get();

        foreach($emailsAdmin as $emailAdmin){
            var_dump($emailAdmin->email);
            // Mail::to($emailAdmin->email)->send(
            //     new \App\Mail\genericMail($data)
            // );
        } 

        //Correos para realizar pruebas
        $emails = ['deltorosalazar@gmail.com' , 'mdts.dev@gmail.com'];

        foreach($emails as $email){
            Mail::to($email)->send(
                new \App\Mail\genericMail($data)
            );
        }       
        
        return response()->json([
            'name' => $data['name'],
            'subject' => $data['subject'],
            'email_user' => $data['email_user'],
            'message' => $data['message']

        ]);
    }


    /**
     * 
     */
    public function indexByEventUserInOrganization($organization_id)
    {
        $events = Event::where('organizer_id',$organization_id)->get();

        foreach ($events as $event) 
        {
            $eventUsers = Attendee::where('event_id' , $event->_id)->where('name' , '!=' , 'Ucronio')->get();
            $eventPrice = isset($event->extra_config['price']) ? $event->extra_config['price'] : "0";
            
            foreach ($eventUsers as  $eventUser) {

                $user = Account::find($eventUser->account_id);
                $userName = isset($user->displayName) ? $user->displayName : $user->names;

                $order = Order::where('account_id' , $eventUser->account_id)->where('items' , $event->_id)->first();
                $orderTotal = isset($order) ? $order->amount : '0';
                $oderDate = isset($order) ? $order->updated_at : '';
                echo    $userName . ',' . 
                        $user->email . ',' . 
                        $event->name . ',' .
                        $eventPrice. ',',
                        $orderTotal . ','.
                        $$oderDate ,'<br>';
                // die;
            }
        }
    }
}
