<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class levelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $levels=Level::paginate(5);
        return view('panel.content-admin.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.content-admin.level.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManage)
    {
        $this->validate($request,[
            'name_level'     => 'required'
        ]);

        $data = [
            'name_level'  => $request->get('name_level'),
            'isActive'  => true,
        ];
        Level::create($data);

        $sessionManage->flash('message', 'Se creado el nuevo nivel exitosamente.');
        return redirect()->route('level.index');
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
        $level=Level::find($id);
        return view('panel.content-admin.level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SessionManager $sessionManage)
    {
        //
        $this->validate($request, [
            'name_level' => 'required',
            'isActive' => 'required',
        ]);
        $level=Level::find($id);
        $level->update($request->all());

        $sessionManage->flash('message', 'Se editó el nivel exitosamente.');
        return redirect()->route('level.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id, SessionManager $sessionManage)
    {
        $level=Level::find($id);
        $data=[
            'isActive'=> ($request->get('_action')== '1') ? true : false,
        ];
        $level->update($data);

        $sessionManage->flash('message', 'Se ha realizado el cambio solicitado.');
        return redirect()->route('level.index');
    }
}
