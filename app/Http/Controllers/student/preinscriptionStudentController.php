<?php

namespace App\Http\Controllers\student;

use App\Models\period;
use App\Models\Payment;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\SessionManager;

class preinscriptionStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = $this->checkStudent();
        $info=[];
        $info['isCoursing']=($request->get('act')=='pending') ? false : true;
        if ($request->get('act')=='pending') {
            $inscriptions=candidate::where('user_id','=',Auth::user()->id)
            ->where('isCoursing','=',0)->paginate(5);
            return view('panel.content.preinscriptions.index', compact('inscriptions', 'info', 'data'));
        }
        if ($request->get('act')=='cursing') {
            $inscriptions=candidate::where('user_id','=',Auth::user()->id)
            ->where('isCoursing','=',1)->paginate(5);
            return view('panel.content.preinscriptions.index', compact('inscriptions', 'info', 'data'));
        }
        if ($request->get('act')=='history') {
            $inscriptions=candidate::where('user_id','=',Auth::user()->id)
            ->where('isCoursing','=',1)->paginate(5);
            return view('panel.content.preinscriptions.index', compact('inscriptions', 'info', 'data'));
        }

        $inscriptions=candidate::where('user_id','=',Auth::user()->id)->paginate(5);
        return view('panel.content.preinscriptions.index', compact('inscriptions', 'info', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = $this->checkStudent();
        if($this->checkStudent()->paymentsPending!=0) return back();
        $careers=DB::table('table_careers')->where('isActive','=',1)->get();
        $languages=DB::table('languages')->where('isActive','=',1)->get();
        $levels=DB::table('table_levels')->where('isActive','=',1)->get();
        $class_times=DB::table('table_class_times')->where('isActive','=',1)->get();

        return view('panel.content.preinscriptions.create', compact('careers','languages','levels','class_times','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SessionManager $sessionManager){
        if($this->checkStudent()->paymentsPending!=0) return back();
        if ($request->get('isUttStudent') == '1') {

            // estudia en la universidad
            $this->validate($request,[
                'language_id'       => 'required',
                'level_id'       => 'required',
                'class_time_id'       => 'required',
                'career_id'     => 'required'
            ]);
            $data=[
                'language_id'       => $request->get('language_id'),
                'level_id'       => $request->get('level_id'),
                'user_id'       => Auth::user()->id,
                'class_time_id'       => $request->get('class_time_id'),
                'career_id'     => $request->get('career_id'),
                'isCoursing'    => false,
                'id_period'     => null,
            ];
        }else{
            $this->validate($request,[
            // no estudia en la universidad
                'language_id'       => 'required',
                'level_id'       => 'required',
                'class_time_id'       => 'required'
            ]);
            $data=[
                'language_id'       => $request->get('language_id'),
                'level_id'       => $request->get('level_id'),
                'user_id'       => Auth::user()->id,
                'class_time_id'       => $request->get('class_time_id'),
                'career_id'     =>  null,
                'isCoursing'    => false,
                'id_period'     => null,
            ];
        }
        candidate::create($data);

        $sessionManager->flash('message', 'Se ha creado la preinscripción correctamente.');
        return redirect()->route('preinscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = $this->checkStudent();
        $user = Auth::user();
        $inscription=candidate::find($id);
        $payment=Payment::all();
        for ($i=0; $i < $payment->count(); $i++) {
            if($payment[$i]->id_candidat == $id){
                $payments=$payment[$i];
            }
        }
        try {
            $payment=$payments;
        } catch (\Throwable $th) {
            $payment=(object)[
                'id_candidat'=>null,
                'is_valid'=>0,
            ];
        }
        return view('panel.content.preinscriptions.show',compact('user','inscription','payment','data'));
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
    }
    private function checkStudent(){
        $data=(object)[
            'paymentsPending'=>0,
        ];

        $dbdata=DB::select("SELECT COUNT(*) as qty, created_at FROM pi.table_candidats WHERE (isCoursing = 0 AND id_period IS NULL) AND user_id=?",
            [Auth::user()->id]
        )[0];

        // Iterate all elements of the request sql for payments dont done
        for ($i=0; $i < $dbdata->qty; $i++) {
            // create a variable that has a integer value corresponding with all payments no done
            if(explode('-',$dbdata->created_at)[0]==date('Y')){
                $data->paymentsPending = $data->paymentsPending +1;
            }
        }

        return $data;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
