<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(15);
        return view('panel.content-admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Rol::all(['id','name_role']);
        return view('panel.content-admin.user.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,SessionManager $sessionManage)
    {
        $this->validate($request,[
            'name'  => 'required',
            'lastName'  => 'required',
            'email'  => 'required|email|unique:users',
            'phoneNumber'  => 'required',
            'password'  => 'required|confirmed',
            'id_rol'  => 'required',
        ]);

        User::create($request->all());

        $sessionManage->flash('message', 'Se creado la cuenta exitosamente.');
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        $roles=Rol::all();
        return view('panel.content-admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required|min:10|numeric',
            'id_rol' => 'required'
        ]);
        $user=User::find($id);
        $user->update($request->all());

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        return redirect()->route('user.index');
    }
}
