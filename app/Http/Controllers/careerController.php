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
        $careers=Career::paginate(5);
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
        Career::create($request->all());
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
            'career_name' => 'required'
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
    public function destroy($id, SessionManager $sessionManage)
    {
        //
        Career::find($id)->delete();
        $sessionManage->flash('message', 'Se ha eliminado el registro exitosamente.');
        return redirect()->route('career.index');
    }
}
