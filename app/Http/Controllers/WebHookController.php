<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

// Models
use App\BurnedTicket;

class WebHookController extends Controller
{
    private function generateCode()
    {
        $randomCode = substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(5/strlen($x)) )),1,5);
        //verificar que el codigo no se repita
        $burnedTicket = BurnedTicket::where('code', $randomCode)->first();
        if(!empty( $burnedTicket )) {
	    $this->generateCode();
        }

	return $randomCode;
    }

    private function validateStatus($transaction)
    {
	$status = $transaction['status'];

	return $status === "APPROVED" ? true : false;
    }

    private function createBurnedTicket($transaction, $params)
    {
	$ticketData = [
	    'user_id' => $params['user_id'],
	    'code' => $this->generateCode(),
	    'state' => 'ACTIVE',
	    'event_id' => $params['event_id'],
	    'ticket_category_id' => $params['category_id'],
	    'price_usd' => intval($params['price']),
	    'amount_in_cents' => $transaction['amount_in_cents'],
	    'assigned_to' => [
		'name' => urldecode($params['assigned_to_name']),
		'email' => $params['assigned_to_email'],
		'document' => [
		    'type_doc' => $params['assigned_to_doc_type'],
		    'value' => $params['assigned_to_doc_number']
		]
	    ]
	];

	$burnedTicket = BurnedTicket::create($ticketData);

	// Enviar ticket
        Mail::to($params['assigned_to_email'])
            ->queue(
                new \App\Mail\BurnedTicketMail($burnedTicket)
            );
    }

    public function mainHandler(Request $request)
    {
	$data = $request->json()->all();
	$transactionStatus = $this->validateStatus($data['data']['transaction']);

	if(!$transactionStatus) {
	    return response()->json(['message' => 'error'], 400);
	}

        // Para boleteria quemada
        $url = $data['data']['transaction']['redirect_url'];

	// Obtener la cadena de consulta de la URL
	$queryString = parse_url($url, PHP_URL_QUERY);

	// Obtener query params
	parse_str($queryString, $params);

	$burned = !empty($params['burned']) ?
	    filter_var($params['burned'], FILTER_VALIDATE_BOOLEAN) : false;
	if($burned) {
	    $this->createBurnedTicket($data['data']['transaction'], $params);
	}

	return response()->json(['message' => 'ok']);
    }
}
