<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class careerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $careers=Career::all();
        return view('panel.content-admin.career.index', compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.content-admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManager)
    {
        //
        $this->validate($request,[
            'career_name' => 'required'
        ]);
        $data=[
            'career_name'=>$request->get('career_name'),
            'isActive'=>true,
        ];
        Career::create($data);
        $sessionManager->flash('message', 'Se ha creado la carrera exitosamente');
        return redirect()->route('career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @re
     * turn \Illuminate\Http\Response
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
        $career=Career::find($id);
        return view('panel.content-admin.career.edit',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SessionManager $sessionManager)
    {
        //
        $this->validate($request, [
            'career_name' => 'required',
            'isActive' => 'required',
        ]);

        $career=Career::find($id);
        $career->update($request->all());

        $sessionManager->flash('message', 'Se ha editado exitosamente el elemento.');
        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id, SessionManager $sessionManage)
    {
        //
        $career=Career::find($id);
        $data=[
            'isActive'=> ($request->get('_action')== '1') ? true : false,
        ];
        // dd($data);
        $career->update($data);
        $sessionManage->flash('message', 'Se ha realizado la solicitud.');
        return redirect()->route('career.index');
    }
}
