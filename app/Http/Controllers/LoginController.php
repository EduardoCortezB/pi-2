<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request, SessionManager $sessionManager){
        $this->validate($request,[
            'email'     => 'required|email|max:60',
            'password' => 'required|min:4'
        ]);

        // return true if is correct the values
        if (!auth()->attempt($request->only('email', 'password'))) {
            $sessionManager->flash('message-error', 'Credenciales Incorrectas');
            return back();
        }

        return redirect('panel-a');
    }
}
