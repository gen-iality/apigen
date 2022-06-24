<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Payment;
use App\Plan;
use Illuminate\Http\Request;
use App\Http\Resources\BillingResource;
use DateTime;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
/**
 * @group Billing
 *
 */
class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Billings = Billing::all();
        return response()->json($Billings);
    }

    /**
     * _store_: Create new Billing.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @bodyParam user_id string required user related to Billing Example: 628fdc698b89a10b9d464793
     * @bodyParam plan_id string plan related to Billing Example: 628fdc698b89a10b9d464793
     * @bodyParam billing object with aditional properties {
     *  @bodyParam save boolean required to determinate if the user want to save the payment method
     *  @bodyParam reference_wompi string required api wompi provide
     *  @bodyParam reference_evius string required formated
     *  @bodyParam payment_method object with aditional properties{
     *      @bodyParam method_name string name of the method. Example: DEBIT CARD
     *      @bodyParam type string type of the method. Example: CARD (ONLY THIS OPTION)
     *      @bodyParam brand string brand of the method. Example: VISA
     *      @bodyParam last_four string last four numbers of credit card. Example: 1222
     *      @bodyParam card_holder string name of the owner. Example: CARLOS ZAPATA
     *      @bodyParam exp_month string expired month. Example: 06
     *      @bodyParam exp_year string expired year. Example: 2022
     *      @bodyParam id string generated by wompi. Example: 27069
     *      @bodyParam status string credt card status. Example: ACTIVE
     *      @bodyParam address object with aditional properties {
     *          @bodyParam full_name string person name. Example CARLOS FELIPE ZAPATA MURCIA         
     *          @bodyParam identification object {
     *              @bodyParam type string name of the type. Example PERSON || COMPANY
     *              @bodyParam value string value of identification. Example 1254854
     *          }
     *          @bodyParam prefix string country prefix. Example: 57
     *          @bodyParam phone_number string phone user. Example: 6584157
     *          @bodyParam email string email address. Example: user@evius.co
     *          @bodyParam country string . Example: colombia
     *          @bodyParam city string . Example: bogota
     *          @bodyParam region string . Example: cundinamarca
     *          @bodyParam address_line_1 string address user. Example: Principal
     *          @bodyParam address_line_2 string address user. Example: Trabajo
     *          @bodyParam postal_code string. Example: 18001
     *      }
     *      @bodyParam base_Value number cost without iva. Example: 18001
     *      @bodyParam tax number tax. Example: 0.19
     *      @bodyParam total number cost + iva. Example: 19540
     *      @bodyParam total_discount number if has discount. Example: 18001
     *      @bodyParam total_discount number if has discount. Example: 18001
     *      @bodyParam details array objects description of billing [{
     *      @bodyParam plan object {
     *          @bodyParam price number cost. Example 234
     *          @bodyParam amount number amount. Example 1
     *      }
     *      @bodyParam users object {
     *          @bodyParam price number cost. Example 234
     *          @bodyParam amount number amount. Example 1
     *      }
     *      }]
     *      @bodyParam cupon_id string cupon Example 12554
     *      @bodyParam suscription_type string Example MONTHLY || YEAR
     *      @bodyParam currency string Example USD
     *      @bodyParam action string Example RENEW
     *      @bodyParam status string Example PENDING
     *      
     *  }
     * } 
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string',
            'billing' => 'required',
            'billing.save' => 'required',
            'billing.reference_wompi' => 'required',
            'billing.reference_evius' => 'required',
            'billing.start_date' => 'required',
            'billing.end_date' => 'required',
            'billing.payment_method' => 'required',
            'billing.payment_method.method_name' => 'required',
            'billing.payment_method.address' => 'required',
            'billing.payment_method.address.email' => 'required|email',
            'billing.base_value' => 'required',
            'billing.tax' => 'required',
            'billing.total' => 'required',
            'billing.details' => 'required',
            'billing.subscription_type' => 'required',
            'billing.currency' => 'required',
            'action' => 'required',
            'status' => 'required',
        ]);

        $data = $request->json()->all();
        //Validacion si es la compra de un plan nuevo u actualizacion
        if (isset($data['plan_id'])) {
            app('App\Http\Controllers\UserController')
                ->updatePlan($data['plan_id'], $data['user_id']);
        }

        //Validacion si el usuario desea guardar el metodo de pago
        $save = isset($data['billing']['save']) ? $data['billing']['save'] : null;

        if ($save) {
            $payment = app('App\Http\Controllers\PaymentController')
                ->createByBilling($data['billing']['payment_method'], $data['user_id']);//Llamada al controlador para crear el metodo de pago
            unset($data['billing']['payment_method']);//Como el usuario guarda los datos, se borran en el billing
            $data['payment_id'] = json_decode(json_encode($payment))->original->_id;//se le relaciona el id del metodo recien creado

            //Se valida si la factura tiene adicionales
            //dd("save", $data['billing']['details']);
            $addons = isset($data['billing']['details']) ? $data['billing']['details'] : null;
            $this::findAndCreateAddons($addons, $data['user_id']);
            
            //save new billing
            $billing_save = new Billing($data);
            $billing_save->save();
            return response()->json($billing_save, 201);
        }
        //Si no guarda el metodo de pago se guarda tal cual llega el billing e igual se comprueba si tiene adicionales
        $addons = isset($data['billing']['details']) ? $data['billing']['details'] : null;
        $this::findAndCreateAddons($addons, $data['user_id']);
        $Billing = new Billing($data);
        $Billing->save();
        return response()->json($Billing, 201);

    }

    public function saveAutomaticPayment($billing)
    {
        if ($billing) {
            $new_billing = new Billing($billing);
            $new_billing->save();
            //validar el estatus para enviar correo
            return response()->json($new_billing, 201);
        }
        return response()>json(['message'=> 'Billing doesnt exist'], 404);
    }

    public function automaticPayment()
    {
        $users_has_payment = Payment::where('status', '=', 'ACTIVE')
        ->latest()
        ->paginate(10);
        $users_payment = $users_has_payment->unique('user_id');
        $client = new Client([
            'base_uri' => 'https://sandbox.wompi.co/v1/',
            'timeout' => 3.0,
        ]);
        $headers = [
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer prv_test_zEMOm6RL3zlnhRzDP52w9PNN0zefS65d'
        ];
        $options['headers'] = $headers;

        // $api_dolar = $client->get('https://api.fastforex.io/fetch-one?from=USD&to=COP&api_key=721145c36e-4016b1be1f-rdxv72');
        // $api_dolar =  json_decode($api_dolar->getBody()->getContents());
        // $dolar_today = $api_dolar->result->COP;
        $dolar_today = 4082.56101;

        //get the acceptance token
        $response = $client->request('GET', 'merchants/pub_test_UGgvjUcTWcZv0Q57IhQrI4XcNObpSQe4', $options);
        $token = json_decode($response->getBody()->getContents());

        foreach ($users_payment as $user) {
            $billing_renew = Billing::where('payment_id', $user->_id)
            ->where('billing.action', 'RENEWAL')
            ->first();
            $billing = $billing_renew == null ? Billing::where('payment_id', $user->_id)
                ->where('billing.action', 'SUBSCRIPTION')
                ->first() : $billing_renew;
            
            if ($billing) {
                $end_date = DateTime::createFromFormat('U', strtotime($billing->billing['end_date']));
                $today = new DateTime();
                //dd("comparacion", $end_date, $today, $end_date >= $today ? "yes":"no" );

                // $end_date >= $today || evaluacion final
                if ($end_date <= $today) {
                    $token = $token->data->presigned_acceptance->acceptance_token;
                    $reference_evius =  $billing->billing['action'] .'-'. $today->format('Y-m-d') .'-'. random_int(0001,10000);
                    $plan = Plan::find($billing->plan_id);
                    //dd("billing", $billing->plan_id, "user", $user, "plan", $plan->price);
                    //$base = $billing->billing['details'][0]['plan']['price'];*
                    //dd("billiing", $billing);
                    $base = $plan->price;
                    $total = $base + ($base * $billing->billing['tax']);
                    //build body
                    //dd("price", $base);
                    $body['acceptance_token'] = $token;
                    $body['amount_in_cents'] = round(($total * $dolar_today * 100));
                    $body['currency'] = 'COP';
                    //dd("email", $user->address['email']);
                    //$body['customer_email'] = $user->address['email'];
                    $body['customer_email'] = 'andres@gmail.co';
                    $body['payment_method']['installments'] = 1;
                    $body['reference'] = $reference_evius;
                    $body['payment_source_id'] = $user->id;
                    $body['customer_data']['phone_number'] = $user->address['phone_number'];
                    $body['customer_data']['full_name'] = $user->address['full_name'];
                    $body['shipping_address']['address_line_1'] = $user->address['address_line_1'];
                    $body['shipping_address']['address_line_2'] = $user->address['address_line_2'];
                    $body['shipping_address']['country'] = $user->address['country'];
                    $body['shipping_address']['region'] = $user->address['region'];
                    $body['shipping_address']['city'] = $user->address['city'];
                    $body['shipping_address']['name'] = $user->address['full_name'];
                    $body['shipping_address']['phone_number'] = $user->address['phone_number'];
                    $body['shipping_address']['postal_code'] = $user->address['postal_code'];
                    //dd("body", $body);
                    $body = json_encode($body);
                    $options['body'] = $body;

                    //POST CREATE TRANSACTION
                    $transaction_post = $client->post('transactions', $options);
                    $response = json_decode($transaction_post->getBody()->getContents());

                    //117027-1656024937-86912
                    $isPending = true;
                    while ($isPending) {
                        $get_transaction = $client->request('GET', 'transactions/' . $response->data->id);
                        $get_transaction = json_decode($get_transaction->getBody()->getContents());
                        $status = $get_transaction->data->status;
                        if ($status != "PENDING") {
                            $isPending = false;
                        }
                    }
                    //dd("get Trans", $response, $status, $get_transaction);

                    //CREATE NEW BILLING
                    dd("user", $user->_id, "billing", $billing, "transaction", $get_transaction);
                    $newBilling['user_id'] = $user->user_id;
                    $newBilling['plan_id'] = $billing->plan_id;
                    $newBilling['billing']['save'] = true;
                    $newBilling['billing']['reference_wompi'] = $get_transaction->data->id;
                    $newBilling['billing']['reference_evius'] = $reference_evius;
                    //new startdate
                    $start_date = date('d-m-Y');
                    $newBilling['billing']['start_date'] = $start_date;
                    //new end date
                    $end_date = date('d-m-Y', strtotime($start_date . "+ 30 days"));
                    $newBilling['billing']['end_date'] = $end_date;
                    $newBilling['billing']['base_value'] = $base;
                    $newBilling['billing']['tax'] = $billing->billing['tax'];
                    $newBilling['billing']['total'] = $total;
                    $newBilling['billing']['details']['plan']['price'] = $base;
                    $newBilling['billing']['details']['plan']['amount'] = 1;
                    $newBilling['billing']['subscription_type'] = 'MONTHLY';
                    $newBilling['billing']['currency'] = 'COP';
                    $newBilling['action'] = 'RENEWAL';
                    $newBilling['status'] = 'APPROVED';
                    $newBilling['payment_id'] = $user->_id;

                    $save_billing = app('App\Http\Controllers\BillingController')
                        ->saveAutomaticPayment($newBilling);

                    dd("new billing", $newBilling, $save_billing);
                    
                    //$transaction = $transaction->send();

                    //dd("body", $body);
                    // $promise->then(
                    //     function (ResponseInterface $res) {
                    //         echo $res->getStatusCode() . "\n";
                    //         dd("res", $res);
                    //     },
                    //     function (RequestException $e) {
                    //         echo $e->getMessage() . "\n";
                    //         echo $e->getRequest()->getMethod();
                    //         dd("e", $e->getMessage());
                    //     }
                    // );
                    //dd("res", $promise);
                    //dd("response", json_decode($response->getBody()->getContents()));
                }

            }
            
            //dd("date actual", $today, "end date", $end_date, "diff", $diff->d, $end_date >= $today);

            //dd("sd", $start_date);
            //$diffDate = strtotime($billing->billing['start_date'])->diff(strtotime($billing->billing['end_date']));

            /**
             * 
             * diferencia de fechas
             * si diff < 1
             * pago
             * else
             * return
             */


            //dd("date", $diffDate);

            //dd("acepted", $isAcepted);

            //dd("billing", $user->_id, $billing);
        }
        //$billings = Billing::where('payment_id', )
        //dd("users", $users);
    }

    /**
     * findAndCreateAddons_: search of Addons and create by user.
     * 
     * @urlParam details required  details
     * @urlParam user required  user_id
     *
     */

    public function findAndCreateAddons($details, $user_id)
    {
        if (isset($details['users'])) { //En este momento solo hay adicional de usuarios
            app('App\Http\Controllers\AddonController')->createByBilling($addon, $user_id);
        }
    }

    /**
     * BillingbyUser_: search of Billings by user.
     * 
     * @urlParam user required  user_id
     *
     */
    
    public function BillingbyUser(string $user_id)
    {
        return BillingResource::collection(
            Billing::where('user_id', $user_id)
                ->latest()
                ->paginate(config('app.page_size'))
        );
    }

    /**
     * _show_: display information about a specific Billing.
     * 
     * @authenticated
     * @urlParam Billing required id of the Billing you want to consult. Example: 6298cb08f8d427d2570e8382
     * @response{
     *   "_id": "6298cb08f8d427d2570e8382",
	 *   "message": "Test",
	 *   "status": "ACTIVE",
	 *   "user_id": "628fdc698b89a10b9d464793",
	 *   "updated_at": "2022-06-02 14:39:27",
	 *   "created_at": "2022-06-02 14:36:56"
     * }
     */
    public function show($Billing)
    {
        $Billing = Billing::findOrFail($Billing);

        return $Billing;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Billing  $Billing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Billing)
    {
        $data = $request->json()->all();
        $Billing  = Billing::findOrFail($Billing);
        $Billing->fill($data);
        $Billing->save();

        return response()->json($Billing);
    }

    /**
     * _destroy_: delete Billing and related data.
     * @authenticated
     * @urlParam Billing required id of the Billing to be eliminated
     * 
     */
    public function destroy($Billing)
    {
        $Billing = Billing::findOrFail($Billing);
        $Billing->delete();

        return response()->json([], 204);
    }
}
