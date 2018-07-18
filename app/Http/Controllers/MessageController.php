<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function message($id)
    {
        //Query the message by id
        $messages =  Message::where('event_id',$id)->get(); 
        return $messages;
    }
}
