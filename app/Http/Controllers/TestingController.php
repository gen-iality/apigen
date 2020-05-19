<?php

namespace App\Http\Controllers;

use App;
use App\Account;
use App\Event;
use App\Extensions\payment_placetopay\src\Gateway;
use App\Jobs\SendOrderTickets;
use App\Mail\BookingConfirmed;
use App\MessageUser;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use QRCode;
use Sendinblue\Mailin;
use Spatie\Permission\Models\Permission;
use \App\Message;
use Omnipay;
use Log;

class TestingController extends Controller
{

    public function pendingOrders(){

/*
        $orders = Order::select('order_reference')->where('event_id',"5c3fb4ddfb8a3371ef79bd62")->get();
        echo "cuantas: ". $orders->count();

        foreach($orders as $order){

            $this->dispatch(new SendOrderTickets($order));
            echo "<p>";
            echo $order->order_reference;
            echo "</p>";
            @ob_end_flush(); // to get php's internal buffers out into the operating system
            flush();           
        }
        

        die;

*/


        $pending_code = "5c4a299c5c93dc0eb199214a";
        $waiting_payment = "5c4232c1477041612349941e";
        $orders = Order::select('order_reference')->where('order_status_id',$waiting_payment)->get();
        echo "Cuantos en estado pendiente: ".($orders->count())."<br/><br/>";
        
         $count = 0;
         foreach($orders as $order){
             $EventCheckoutController = app()->make('App\Http\Controllers\EventCheckoutController');

             //No tenemos un registro para saber por que pasarela fue hecho el pago
             //nos toca probar con las dos pasarelas que usamos
             $response = app()->call([$EventCheckoutController, 'showOrderPaymentStatusPaymentGateway'], 
             ['order_reference' => $order->order_reference, 'payment_gateway' => 'payu']);
             $respuesta1 = $response;

             if ($response == "NOT FOUND")
             $response = app()->call([$EventCheckoutController, 'showOrderPaymentStatusPaymentGateway'], 
             ['order_reference' => $order->order_reference, 'payment_gateway' => 'placetopay']);      
             $respuesta2 = $response;

             echo "<p>";
             echo $order->order_reference."  payu ".$respuesta1." ptp ".$respuesta2 ;

/*              $order = app()->call([$EventCheckoutController, 'changeStatusOrder'], 
             ['order_reference' => $order->order_reference, 'status' => $response]);   */          
              
             echo " status ".$order->order_status_id;

             echo "</p>";
             @ob_end_flush(); // to get php's internal buffers out into the operating system
             flush(); // to tell the operating system to flush it's buffers to the user.
             if ($count++>6)die;
         }

    }



    public function resendOrder($order_id)
    {
        $order = Order::findOrFail($order_id);

        return $this->dispatch(new SendOrderTickets($order));

        return response()->json([
            'status' => 'success',
            'redirectUrl' => '',
        ]);
    }

    public function error()
    {
        return response(
            [
                'status' => 500,
                'message' => 'Error: Tremendo',
            ],
            500);
    }
    public function request($refresh_token)
    {
        $client = new Client();
        $url = "http://httpbin.org/post";
        $r = $client->request('POST', $url, ['form_params' => ['test' => 'test']]);
        var_dump(json_decode($r->getBody()));
        $url = "https://securetoken.googleapis.com/v1/token?key=" . "AIzaSyATmdx489awEXPhT8dhTv4eQzX3JW308vc";
        /**
         * Generamos el cuerpo indicando
         * el valor del refresh_token, e indicacndo que  el token se va a refrescar
         */
        $body = ['grant_type' => 'refresh_token', 'refresh_token' => $refresh_token];
        /**
         * Enviamos los datos a la url
         * Enviamos por metodo post el cuerpo por medio de la url asignada
         */

        $response = $client->request('POST', $url, ['form_params' => $body]);
        var_dump(json_decode($response->getBody()));
        //var_dump((string) $response->getContents());

        return [true];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function auth(\Kreait\Firebase\Auth $fireauth)
    {
        /*$o = new Account(
        [
        "name" => 'test' . time(),
        "email" => 'apps' . time() . "@mocionsoft.com",
        ]
        );
        $o->save();
        return $o;
         */
        $u = Account::find("5bc51599cb22e0643e006173");
        $u->save();
        $r = $u;
        return $r;
    }

    public function sendemail(Request $request, string $id)
    {
        $data = $request->json()->all();
        $event_id = $id;
        $event = Event::find($event_id);
        $eventuser = $event->eventUsers()->first();
        $eventuser->email = "felipe.martinez@mocionsoft.com";
        $email = "felipe.martinez@mocionsoft.com";
        $image = "https://storage.googleapis.com/herba-images/evius/events/8KOZm7ZxYVst444wIK7V9tuELDRTRwqDUUDAnWzK.png";
        $message = "mensaje";
        $subject = "[Invitación Máxim] kraken en Colombia";

        //Mail::to($email)
        //    ->send(
        //        new BookingConfirmed($eventuser)
        //    );
        return "ok";
        /*

    // var_dump($mail->build());
    Mail::to('juan.lopez@mocionsoft.com')
    ->send(new RSVP( $message, $event,$eventuser,$image,$subject ));
    var_dump(Mail::failures());
    return "ok";*/

    }
    public function sendemail2()
    {
        return "ahi";
    }

    public function pdf()
    {
        $event = 'evento de prueba generar pdf';
        $eventuser = 'cesar barriosnuevos';
        $ticket_id = 12345;
        $attachPath = url()->previous() . '/api/generatorQr/5bd9959672b12737b359c722';
        $date = '31/10/2018';

        $pdf = PDF::loadview('pdf_bookingConfirmed', compact('event', 'eventuser', 'ticket_id', 'attachPath', 'date'));
        $pdf->setPaper('legal', 'portrait');
        return $pdf->download('example.pdf');
    }

    public function qrTesting()
    {
        $file = 'qr/prueba2_qr.png';
        $image = QRCode::text("prueba2")
            ->setSize(8)
            ->setMargin(4)
            ->setOutfile($file)
            ->png();
        return $file;
    }

    public function viewWebHooks()
    {
        $mailin = new Mailin(config('app.sendinblue_page'), config('mail.SENDINBLUE_KEY'));

        $data = array("is_plat" => "");

        var_dump($mailin->get_webhooks($data));
    }

    public function UpdateStatusMessagePOST()
    {
        $message_id = "<201811211540.49660781994@smtp-relay.sendinblue.com>";
        $user_reason = "Opened";
        $user_status = "Opened";
        // $message_id = '5bf56db9854baf00b34d45e2';

        sleep(1);
        try {
            //update the new status that is in data
            $message_user = MessageUser::where('sender_id', $message_id)
                ->orderBy('created_at', 'desc')->first();
            $message_user->status = $user_status;
            $message_user->status_message = $user_reason;

            if (is_null($message_user->history)) {
                $message_user->history = array($user_status);
            } else {
                $array = $message_user->history;
                array_push($array, $user_status);
                $message_user->history = $array;
            }

            $message = Message::findOrfail($message_user->message_id);
            // var_dump($message_id);
            $add_status = $message->$user_status;
            $message->$user_status = $add_status + 1;

            $message->save();

            $message_user->save();
            // return response($message);
        } catch (\Exception $e) {
            var_dump($e);

        }
    }

    public function permissions()
    {
        return Permission::all();
    }

    public function Gateway0()
    {

        $placetopay = new \Dnetix\Redirection\PlacetoPay([
            'login' => 'f7186b9a9bd5f04ab68233cd33c31044',
            'tranKey' => '3ZNdDTNP0Uk1A28G',
            'url' => 'https://test.placetopay.com/redirection/',
            'type' => \Dnetix\Redirection\PlacetoPay::TP_REST,
        ]);

        $reference = '123456789';
        $request = [
    
            "payer" => [
                "name" => "DIANA FULTON",
                "surname" => "Yost",
                "email" => "flowe@anderson.com",
                "documentType" => "CC",
                "document" => "1848839248",
                "mobile" => "3006108300",
                "address" => [
                    "street" => "703 Dicki Island Apt. 609",
                    "city" => "North Randallstad",
                    "state" => "Antioquia",
                    "postalCode" => "46292",
                    "country" => "US",
                    "phone" => "363-547-1441 x383"
                ]
            ],
            "buyer" => [
                "name" => "DIANA FULTON",
                "surname" => "Yost",
                "email" => "flowe@anderson.com",
                "documentType" => "CC",
                "document" => "1848839248",
                "mobile" => "3006108300",
                "address" => [
                    "street" => "703 Dicki Island Apt. 609",
                    "city" => "North Randallstad",
                    "state" => "Antioquia",
                    "postalCode" => "46292",
                    "country" => "US",
                    "phone" => "363-547-1441 x383"
                ],
            ],
        'payment' => [
        'reference' => $reference,
        'description' => 'Testing payment',
        'amount' => [
            'currency' => 'COP',
            'total' => 120000,
        ],
        ],
        'expiration' => date('c', strtotime('+2 days')),
        'returnUrl' => 'http://evius.co/response?reference=' . $reference,
        'ipAddress' => '127.0.0.1',
        'userAgent' => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36',
        ];

        $response = $placetopay->request($request);
        if ($response->isSuccessful()) {
        // STORE THE $response->requestId() and $response->processUrl() on your DB associated with the payment order
        // Redirect the client to the processUrl or display it on the JS extension
        return $response->processUrl();
        // header('Location: ' . $response->processUrl());
        } else {
        // There was some error so check the message and log it
        var_dump($response->status());die;
        }
    }

    public function Gateway(){

        $gateway = Omnipay::create('placetopay');
        return $gateway->initialize();
        return $gateway->getName();

    }

    public function orderSave($order_id){
        $order = Order::find($order_id);
/*         $event = Event::find($order->event_id);
        $event_properties = $event->user_properties;
        $attendees_order = $order->attendees;
        $amount = 0;

        //Vamos a recorrer los asistentes que contiene una orden
        foreach($attendees_order as $attendee){
            //Capturarmos los campos con su valor de los asistentes que contienen una orden
            $properties = $attendee->properties;
            //Recorremos las propiedades del asistente 
            foreach($properties as $key_attendize=>$attendize){
                //Recorremos los campos definidos en el evento para encontrar cual tiene monto
                foreach($event_properties as $key_event_property => $event_property){
                    //Si el valor del campo es igual al que se configuro en el evento entramos
                    if($event_property['name'] == $key_attendize){
                        //Si dentro de campo existe las opciones significa que es un dropdown y entramos
                        if(isset($event_property['options'])){
                            //Recorremos las opciones del dropdown
                            foreach($event_property['options'] as $key_property=>$property){
                                //Si el input tiene definido un monto entramos
                                if(isset($property['amount'])){
                                    //Si el valor del attendize es igual al campo de la propiedad entra
                                    if($key_property == $attendize){
                                        $amount += $property['amount'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            
        }
        $order->amount = $amount+$order->amount;
        return $order->amount; */
        $order->save();
    }

}
