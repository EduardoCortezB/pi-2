<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\SessionManager;

class RegisterAspirantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('preinscription.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManage){
        $this->validate($request, [
            'name' => 'required|min:2|max:25',
            'apellidos' => 'required|min:2|max:30',
            'email' => 'required|unique:users|email|max:60',
            'numero' => 'required|min:10|numeric',
            'password' => 'required|min:4|confirmed',
        ]);

        User::create([
            'name' => $request->get('name'),
            'lastName' => $request->get('apellidos'),
            'phoneNumber' => $request->get('numero'),
            'email' => $request->get('email'),
            'id_rol' => 2,
            'password' => Hash::make($request->get('password')),
        ]);

        $sessionManage->flash('message', 'Se ha creado tu cuenta exitosamente. Inicia sesión para proceder con la inscripción.');
        return redirect('/login');
    }
}
