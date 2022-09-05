<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '+573143232830',
            'from' => 'Nexmo-Evius',
            'text' => 'Sms de prueba'
        ]);
    }
}
