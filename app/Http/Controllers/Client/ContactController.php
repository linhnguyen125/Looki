<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Jobs\SendContactMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMail(Request $request){
        $mailJob = new SendContactMail();
        dispatch($mailJob);
    }
}
