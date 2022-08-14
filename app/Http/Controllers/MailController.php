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

        \Mail::send('mail.contactFormAdmin', array(
            'name' => $request->get('name'),
            'email' => $request->get('from'),
            'subject' => $request->get('title'),
            'user_query' => $request->get('body'),
        ), function($message) use ($request){
            $message->from($request->get('from'));
            $message->to('celutsystem@gmail.com', 'Admin')->subject($request->get('title'));
        });

        // Mail::to('celutsystem@gmail.com')->queue(new MailForm($details));
        $sessionManager->flash('message', 'Se ha enviado el correo exitosamente');
        return back();
    }
}
