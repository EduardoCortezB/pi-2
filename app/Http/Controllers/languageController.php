<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

class languageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels=Language::paginate(5);
        return view('panel.content-admin.language.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.content-admin.language.create');
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
            'language'     => 'required'
        ]);

        $data = [
            'language'  => $request->get('language'),
            'isActive'  => true,
        ];
        Language::create($data);

        $sessionManage->flash('message', 'Se creado el elemento exitosamente.');
        return redirect()->route('language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $level=Language::find($id);
        return view('panel.content-admin.language.edit', compact('level'));
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
            'language' => 'required',
            'isActive' => 'required',
        ]);
        $level=Language::find($id);
        $level->update($request->all());

        $sessionManage->flash('message', 'Se editó el elemento exitosamente.');
        return redirect()->route('language.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id, SessionManager $sessionManage)
    {
        $level=Language::find($id);
        $data=[
            'isActive'=> ($request->get('_action')== '1') ? true : false,
        ];
        $level->update($data);

        $sessionManage->flash('message', 'Se ha realizado el cambio solicitado.');
        return redirect()->route('language.index');
    }
}
