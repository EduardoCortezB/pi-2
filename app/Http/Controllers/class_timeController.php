<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Class_time;
use Illuminate\Http\Request;
use Helpers\DateCodification;
use Illuminate\Session\SessionManager;

class class_timeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=Class_time::paginate(10);

        // dd(DateCodification::getDaysInArray('4,5'));
        return view('panel.content-admin.class_time.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('panel.content-admin.class_time.create');
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
            'start-time'    => 'required',
            'end-time'      => 'required',
        ]);

        $cr = [
            'start_time'    => $request->get('start-time'),
            'end_time'      => $request->get('end-time'),
            'isActive'      => true,
            'daysPerWeek'   => DateCodification::getDaysFromIntToStrHuman(DateCodification::getStrIntFromRequest($request))
        ];

        Class_time::create($cr);

        $sessionManage->flash('message', 'Se creado el horario exitosamente');
        return redirect()->route('class_time.index');
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
        $class_time=Class_time::find($id);
        $class_tD = DateCodification::getDaysFromStrHumToArr($class_time->daysPerWeek);

        return view('panel.content-admin.class_time.edit', compact('class_time','class_tD'));
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
        $this->validate($request,[
            'start-time'    => 'required',
            'end-time'      => 'required',
            'isActive'      => 'required',
        ]);
        $cr = [
            'start_time'    => $request->get('start-time'),
            'end_time'      => $request->get('end-time'),
            'isActive'      => $request->get('isActive'),
            'daysPerWeek'   => DateCodification::getDaysFromIntToStrHuman(DateCodification::getStrIntFromRequest($request))
        ];

        $class_time=class_time::find($id);
        $class_time->update($cr);

        $sessionManage->flash('message', 'Se editado el horario exitosamente');
        return redirect()->route('class_time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id,SessionManager $sessionManage)
    {
        $class=Class_time::find($id);
        $data=[
            'isActive'=> ($request->get('_action')== '1') ? true : false,
        ];
        $class->update($data);
        $sessionManage->flash('message', 'Se ha realizado el cambio solicitado.');
        return redirect()->route('class_time.index');
    }
}
