<?php

namespace App\Http\Controllers;

use App;
use App\Account;
use App\MessageUser;
use \App\Message;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use App\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmed;
use QRCode;
use Sendinblue\Mailin;
use App\Jobs\SendOrderTickets;
use App\Order;
use App\evaLib\Services\Order as OrderService;

use App\Extensions\payment_placetopay\src\Gateway;
use Omnipay;

class TestingController extends Controller
{

    public function resendOrder($order_id)
    {
        $order = Order::findOrFail($order_id);

        return $this->dispatch(new SendOrderTickets($order));

        return response()->json([
            'status'      => 'success',
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

        Mail::to($email)
            ->send(
                new BookingConfirmed($eventuser)
            );
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
        $attachPath = url()->previous().'/api/generatorQr/5bd9959672b12737b359c722';
        $date = '31/10/2018';

        $pdf = PDF::loadview('pdf_bookingConfirmed', compact('event','eventuser','ticket_id','attachPath','date'));
        $pdf->setPaper('legal','portrait');
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
        $mailin = new Mailin(config('app.sendinblue_page'),config('mail.SENDINBLUE_KEY'));
        
		$data = array( "is_plat" => "" );
 
		var_dump($mailin->get_webhooks($data));
    }
    
    public function UpdateStatusMessagePOST()
    {      
        $message_id =  "<201811211540.49660781994@smtp-relay.sendinblue.com>";
        $user_reason = "Opened";
        $user_status = "Opened"; 
        // $message_id = '5bf56db9854baf00b34d45e2'; 
        
        sleep(1);
        try{
            //update the new status that is in data
            $message_user = MessageUser::where('sender_id', $message_id)
            ->orderBy('created_at','desc')->first();
            $message_user->status = $user_status;
            $message_user->status_message = $user_reason;
            
            if(is_null($message_user->history)){
                $message_user->history = array($user_status);
            }else{
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
        }catch(\Exception $e){
            var_dump($e);
        
        }
    }

    public function permissions(){
        return Permission::all();
    }

    public function Gateway(){

        $gateway = Omnipay::create('placetopay');
        return $gateway->getName();
    }



}
