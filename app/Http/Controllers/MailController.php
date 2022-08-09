<?php

namespace App\Http\Controllers;

use App\Mail\MailForm;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMailSystem(Request $request, SessionManager $sessionManager){
        $this->validate($request, [
            'from'=>'required|email',
            'name'=>'required',
            'title'=>'required',
            'body'=>'required',
        ]);
        $details = [
            'from'=>$request->get('from'),
            'name'=>$request->get('name'),
            'title'=>$request->get('title'),
            'body'=>$request->get('body'),
        ];

        Mail::to('celutsystem@gmail.com')->queue(new MailForm($details));
        $sessionManager->flash('message', 'Se ha enviado el correo exitosamente');
        return back();
    }
}
