<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RSVP;

class TestingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendemail()
    {
        Mail::to('juan.lopez@mocionsoft.com')
        ->send(new RSVP());

        return "ok";
    }   //
}
