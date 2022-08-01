<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\Level;
use App\Models\period;
use App\Models\Language;
use App\Models\Class_time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\SessionManager;

class periodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $periods=period::paginate(15);
        return view('panel.content-admin.period.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
        $levelsLang = DB::select('SELECT * FROM table_levels WHERE isActive=1');
        $class_times = DB::select('SELECT * FROM table_class_times WHERE isActive=1');
        $languages = DB::select('SELECT * FROM languages WHERE isActive=1');

        return view('panel.content-admin.period.create',compact('levelsLang','class_times','languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManager){
        // dd($request);
        $this->validate($request,[
            'groupName' => 'required',
            'start_day' => 'required',
            'start_month' => 'required',
            'end_day' => 'required',
            'end_month' => 'required',
            'id_level' => 'required',
            'id_language' => 'required',
            'id_class_time' => 'required',
        ]);

        $data=[
            'groupName'     => $request->get('groupName'),
            'year'          => date('Y'),
            'start-date'    => $request->get('start_day') .'-'. $request->get('start_month'),
            'end-date'      => $request->get('end_day') .'-'. $request->get('end_month'),
            'id_level'      => $request->get('id_level'),
            'id_class_time' => $request->get('id_class_time'),
            'language_id' => $request->get('id_language'),
            'isActive' => true,
        ];
        // dd($data);
        period::create($data);
        $sessionManager->flash('message', 'Se creado exitosamente el periodo.');
        return redirect()->route('period.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $period=period::find($id);
        $students=candidate::all();
        $students = $students->where('id_period','=',$id);
        // dd($students);
        return view('panel.content-admin.period.show',compact('period','students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
        $levelsLang = Level::all(['id','name_level']);
        $class_times = DB::select('SELECT * FROM table_class_times WHERE isActive=1');
        $period = period::find($id);
        $periodDate = [
            'date-start'     => explode('-',$period['start-date']),
            'date-end'     => explode('-',$period['end-date']),
        ];
        $languages = DB::select('SELECT * FROM languages WHERE isActive=1');

        // $periodDate['date-end'][0] # dia
        // $periodDate['date-end'][1] # mes
        return view('panel.content-admin.period.edit', compact('months','levelsLang','class_times','period','periodDate', 'languages'));
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
        $this->validate($request,[
            'groupName' => 'required',
            'year' => 'required',
            'start_day' => 'required',
            'start_month' => 'required',
            'end_day' => 'required',
            'end_month' => 'required',
            'id_level' => 'required',
            'id_class_time' => 'required',
        ]);

        $data=[
            'groupName'     => $request->get('groupName'),
            'year'          => $request->get('year'),
            'start-date'    => $request->get('start_day') .'-'. $request->get('start_month'),
            'end-date'      => $request->get('end_day') .'-'. $request->get('end_month'),
            'id_level'      => $request->get('id_level'),
            'id_class_time' => $request->get('id_class_time'),
            'isActive' => $request->get('isActive'),
        ];
        $period=period::find($id);
        $period->update($data);
        $sessionManager->flash('message', 'Se ha modificado el elemento.');
        return redirect()->route('period.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period=period::find($id);
        $period->delete();
        return redirect()->route('period.index');
    }
}
