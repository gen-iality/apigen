<?php

namespace App\evaLib\Services;

use Mail;
//Models
use App\Plan;
use App\Account;
// Google cloud
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

/**
 * Undocumented class
 */
class BillingService
{
    public static function generatePurchaseConsolidation($billing, $clientData)
    {
      // Generate client for Google Sheets
      $client = new Client();
      $client->setApplicationName('Facturacion Evius');
      $client->setScopes(Sheets::SPREADSHEETS);
      $client->setAuthConfig('credentials.json');
      $client->setAccessType('offline');

      // write in excel for accounting team
      $service = new Sheets($client);
      $documentId = '1W3wumByrcdyTddenaba7WfkM9un28Zook0QSrcH5Do0';
      $range = 'A:Z';

      // purchase details
      $getDetails = $billing['billing']['details'];
      if(isset( $getDetails['plan'] )) {
	$plan = Plan::findOrFail($billing['plan_id']);
	$planDetails = "Plan: $plan->name, Precio: \${$getDetails['plan']['price']} USD";
      }
      if(isset( $getDetails['users'] ) && $getDetails['users']['amount'] !=0) {
	$usersDetails = "Usuarios: {$getDetails['users']['amount']}, Precio: \${$getDetails['users']['price']} USD";
      }
      // define details
      if(isset($planDetails) && isset($usersDetails)) {
	$details = "$planDetails\n$usersDetails";
      } elseif (isset($planDetails)) { 
	$details = "$planDetails";
      } else {
	$details = "$usersDetails";
      }

      $user = Account::findOrFail($billing->user_id);

      $values = [
	[
	    $user->names, // Nombre y apellidos
	    $clientData['address']['identification']['value'], // Identificación
	    $clientData['address']['identification']['type'], // Tipo de identificación
	    $clientData['address']['phone_number'], // Teléfono
	    $user->email, // E-mail
	    $clientData['address']['city'], // Ciudad
	    $clientData['address']['address_line_1'], // Dirección
	    $billing['billing']['start_date'], // Fecha de la venta
	    $billing['billing']['total'], // Concepto 
	    $details, // Compra 
	    $billing['billing']['base_value'], // Valor base de la venta 
	    $billing['billing']['tax'], // IVA de la venta 
	    $discount = isset($billing['billing']['total_discount']) ? $billing['billing']['total_discount']: 0, // Descuentos en la venta 
	    $clientData['method_name'], // Medio de pago 
	    $billing['billing']['subscription_type'], // Tipo de suscripción 
	],
      ];

      $body = new ValueRange([
	'values' => $values
      ]);

      $params = [
	'valueInputOption' => 'RAW'
      ];

      //$doc = $service->spreadsheets_values->get($documentId,$range);
      //$doc = $service->spreadsheets_values->update($documentId,$range, $body, $params);
      $doc = $service->spreadsheets_values->append($documentId,$range, $body, $params);

      return $doc;
    }
}
