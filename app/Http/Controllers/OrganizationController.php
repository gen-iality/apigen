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
use App\DiscountCodeMarinela;
use App\DiscountCodeTemplate;

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
            Organization::where('author', Auth::user()->_id)
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
        $model->author = Auth::user()->_id;

        $user = Auth::user();

        $RolService->createAuthorAsOrganizationAdmin(Auth::user()->_id, $model->_id);
        
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
     * _indexByEventUserInOrganization_: list of users who have paid for events and successfully registered
     * 
     * @urlParam id id of the organization from which you want to obtain the users registered to the events Example: 5f7e33ba3abc2119442e83e8
     * @response [{
     *  "Tipo de documento": null,
     *  "Número de documento": null,
     *  "Tipo de persona": null,
     *  "Nombre del usuario ": "Juliana García",
     *  "Correo": "geraldine.garcia+1@mocionsoft.com",
     *  "Teléfono": null,
     *  "Dirección": null,
     *  "Fecha de nacimiento": null,
     *  "Curso": "¿Cómo aprovechar las oportunidades de la Industria Musical?",
     *  "Valor del curso": "58000",
     *  "Total pagado": 1308000,
     *  "Total descuento": -1250000,
     *  "Fecha y hora de la compra ": "11/01/2021 19:18:02",
     *  "Referencia de pago": "5ff8cef27ca1764a4f648984"
     *},
     *{
     *  "Tipo de documento": "Cedula",
     *  "Número de documento": "1223123",
     *  "Tipo de persona": "persona_natural",
     *  "Nombre del usuario ": "Pedro el escamoso",
     *  "Correo": "pedroescamoso@gmail.com",
     *  "Teléfono": null,
     *  "Dirección": "Diagonal 20 b 25 A 25",
     *  "Fecha de nacimiento": "2021-01-30",
     *  "Curso": "¿Cómo aprovechar las oportunidades de la Industria Musical?",
     *  "Valor del curso": "58000",
     *  "Total pagado": 58000,
     *  "Total descuento": 0,
     *  "Fecha y hora de la compra ": "15/01/2021 20:45:15",
     *  "Referencia de pago": "6001fedbd2cb5903dc60f3d8"
     *}]
     */
    public function indexByEventUserInOrganization($organization_id)
    {
        
        $events = Event::where('organizer_id' , $organization_id)->where('name', '!=' ,'Ucronio')->get();
        
        $attendees = [];

        foreach($events as $event)
        {   
            
            $querys =   $event->attendees()->get();
            
            foreach($querys as $query){
                
                $account = Account::find($query->account_id);
                $order = Order::where('account_id' , $account->_id)->where('items' , $event->_id )->first();
               
                $data = response()->json([
                    'Tipo de documento' => $account->document_type,
                    'Número de documento' => $account->document_number,
                    'Tipo de persona' => $account->person_type,
                    'Nombre del usuario ' => $account->names,
                    'Correo'=> $account->email,
                    'Teléfono' => $account->telephone,
                    'Dirección' => $account->adress,
                    'Fecha de nacimiento' => $account->date_birth,                    
                    'Curso' => $event->name,
                    'Valor del curso' => $event->extra_config['price'],
                    'Total pagado' => $order->amount,
                    'Total descuento' => $event->extra_config['price'] - $order->amount,  
                    'Fecha y hora de la compra ' => \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i:s'),        
                    'Referencia de pago' => $order->_id
                ])->getData();
                
                array_push($attendees , $data);
                
                // echo    $account->document_type .','.
                // echo    $account->document_number .','.
                //         // $account->person_type .','.
                //         // $account->names .','.
                //         // $account->email .','.
                //         // $account->telephone .','.
                //         // // $account->adress .','.
                //         // // $account->date_birth .','.
                //         // $event->name .','.
                //         // $event->extra_config['price'] .','.
                //         // $order->amount .','.
                //         // $event->extra_config['price'] - $order->amount .','.
                //         ' ' .
                //         \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i:s') .','.
                //         $order->_id .','. '<br>';
            }   

        }

        return $attendees;
    }

    /**
     *_ChangeUserPasswordOrganization_: change user password registered in a organization
     * 
     * @urlParam organization_id required string id of the organization in which the user is registered
     * 
     * @bodyParam email email required Email of the user who will change his password
     * 
     * @param Request $request
     * @param string $event_id
     * @return void
     */
    public function changeUserPasswordOrganization(Request $request, string $organization_id)
    {
        $data = $request->json()->all();
        $destination = $request->input("destination");
        $onlylink = $request->input("onlylink");

        //Validar si el usuario está registrado en el evento
        $email = (isset($data["email"]) && $data["email"]) ? $data["email"] : null;
        $organizationUser = Account::where("organization_ids", $organization_id)->where("email", $email)->first();

        $organization = Organization::findOrFail($organization_id);
        $image = null; //$organization->picture;

        //En caso de que no exita el usuario se finaliza la función
        if (empty($organizationUser)) {
            abort(401, "El correo ingresado no se encuentra registrado en la organización");
        }
        
        //Envio de correo para la contraseña
        Mail::to($email)
            ->queue(                
                new \App\Mail\ChangeUserPasswordEmail($organization, $organizationUser, true, $destination, $onlylink)
            );
        return $organizationUser;

    }

    /**
     * _ordersUsersPoints_: list all information about all orders pending with the information complete about codes and total products
     * 
     * @urlParam organization required organization_id 
     * 
     * @queryParam status this paramether has two options: pendiente or despachado. The default value is pendiente. Example: pendiente
     * @queryParam date_from Format: DD-MM-YYYY If you want to filtered for date this is the initial date.
     * @queryParam date_to Format: DD-MM-YYYY If you want to filtered for date this is the finish date.
     * @queryParam type_report This parameter allows return format json or csv, Example: csv
     * 
     */
    public function ordersUsersPoints(Request $request, $organization)
    {   
        $data = $request->json()->all();

        $filters = $request->input();
        $templates = DiscountCodeTemplate::where('organization_id', $organization)->get()->keyBy('_id')->toArray();
        
        $status = isset($filters["status"]) ? $filters["status"] : "pendiente";

        $status_id = "";
        switch ($status)
        {
            case 'pendiente':
                $status = "5c4a299c5c93dc0eb199214a";
            break;
            case 'despachado':
                $status = "5c423232c9a4c86123236dcd";
            break;
            case 'valida':
                $status = "613ff0c1f1c6df84356b30c2";
            break;
        }

        $ordersEmail = Order::where('order_status_id' , $status)->where('organization_id' , $organization)->pluck('email');
        
        $orderByUser = 

        //Usuarios por cada orden
        $usersTotal = Account::whereIn('email' , $ordersEmail);
        $users = $usersTotal->get(['_id' , 'email' , 'points', 'document_number','names'])->keyBy('email');

        
        $orders = Order::where('order_status_id' , $status)->where('organization_id' , $organization);
        $orderActual = isset($filters["date_from"]) ?
                       
                        $orders->whereBetween(
                            'created_at',
                            array(
                                \Carbon\Carbon::parse($filters['date_from']),
                                \Carbon\Carbon::parse($filters['date_to']),
                            )
                        )->orderBy('email', 'asc')->get() :

                        $orders->orderBy('email', 'asc')->get();         
        
        $userFor = "";  
        if(isset($filters['type_report']))
        {
            echo 'N° de documento, Nombres, Correo, Puntos al momento de la redención , Puntos de la prenda, Total de puntos redimidos, Total de tolas las prendas canjeadas, Estado, Fecha de redención, Prenda canjeada. </br>';     
        }               
        
        $arrayUsers = [];
        
        $dataComplete = [];        

        $ordersByUser = DiscountCodeTemplate::where('organization_id', $organization)->get()->keyBy('_id')->toArray();

        foreach ($orderActual as $order) 
        {
            $codes = DiscountCodeMarinela::where('number_uses' , 1)->where('account_id' , $order->account_id)->get(['discount_code_template_id', 'discount_code_template_id ']);
            // $totalOrders = 0;
            $fechaOrders = '';
            $productos = '';
            $totalProductos = null;

            $totalCodigosRedimidos = 0;
            $fechaOrders = $order->created_at;
            // $totalOrders = $totalOrders + $order->amount;
            $productos = $order->items[0];
            $totalProductos =  $totalProductos +1;
           
            if(isset($orderActual))
            {
                foreach($codes as $code)
                {   

                    $template_id = $code->discount_code_template_id;

                    if(!$template_id)   
                    {
                        $discount= "discount_code_template_id ";
                        $template_id = $code->$discount;
                    }
                    $template = $templates[$template_id];
                                        
                    $totalCodigosRedimidos = $totalCodigosRedimidos +  $template['discount'];                                    
                }

                $totalOrdersUser=0;

                $user = $users[$order->email];
                $ordersByUser = Order::where('email', $user->email)
                ->where('order_status_id' ,'!=', '5c4f37a17aa633237e241643')
                ->where('order_status_id' ,'!=', '5c4232c1477041612349941e')
                ->get(['amount']); 

                foreach($ordersByUser as $orderByUser)
                {
                    $totalOrdersUser = $totalOrdersUser + $orderByUser->amount;
                    // echo $orderByUser->amount. '</br>';
                }
                
                $estado = ($totalOrdersUser <= $totalCodigosRedimidos) ? "CORRECTO" : "Problema";
                if(isset($filters['type_report']))
                {
                    echo $user->document_number .','. 
                            $user->names .','. 
                            $user->email .','. 
                            $order->account_points . ',' .
                            $order->amount .','.
                            $totalCodigosRedimidos. ',' . 
                            $totalOrdersUser .','.
                            $estado. ',' .
                            $fechaOrders.','. 
                            $productos. '</br>';
                }else{
                    $dataByUserjson= response()->json([
                        "_id" => $order->_id,
                        "document_cumber" => $user->document_number,
                        "names" => $user->names,
                        'email' => $user->email,
                        "codes_before" => $order->account_points,
                        "product_points" => $order->amount,
                        "total_codes" => $totalCodigosRedimidos,
                        "total_orders" => $totalOrdersUser,
                        "status" => $estado,
                        "date_order" => $fechaOrders,
                        "product" => $productos,
                        "talla" => $order->properties['talla']
                    ])->original;
                    array_push($dataComplete , $dataByUserjson);                                        
                } 
            }else{
                echo $user->email . ', NO TIENE ORDER</br>';
            }
            
        }
        return $dataComplete;

    }
    
}
