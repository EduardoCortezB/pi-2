<?php

namespace App\Http\Controllers;

use App\Models\candidate;
use App\Models\User;
use App\Models\Career;
use App\Models\Class_time;
use App\Models\Language;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;

class RegisterAspirantController extends Controller
{
    public function index(){
        $inscriptions = candidate::all();
        return view('panel.content-admin.inscription.index', compact('inscriptions'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUser(){
        //
        return view('preinscription.register');
    }

    // ver detalles de la preinscripcion
    public function details($id){
        dd($id);
    }

    // asignar grupo a preinscripcion
    public function assign($id){
        dd($id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUser(Request $request, SessionManager $sessionManage){
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

    public function createInscriptionFromAdmin(){
        $careers=Career::all();
        $languages=Language::all();
        $levels=Level::all();
        $class_times=DB::table('table_class_times')->where('isActive','=',1)->get();
        // dd($class_times);
        $students=DB::select('SELECT * FROM users WHERE id_rol=2');
        return view('panel.content-admin.inscription.create', compact('careers', 'languages', 'levels', 'class_times', 'students'));
    }

    public function storeInscriptionFromAdmin(Request $request, SessionManager $sessionManager){
        if ($request->get('isUttStudent') == '1') {

            // estudia en la universidad
            $this->validate($request,[
                'language_id'       => 'required',
                'level_id'       => 'required',
                'user_id'       => 'required',
                'class_time_id'       => 'required',
                'career_id'     => 'required'
            ]);
            $data=[
                'language_id'       => $request->get('language_id'),
                'level_id'       => $request->get('level_id'),
                'user_id'       => $request->get('user_id'),
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
                'user_id'       => 'required',
                'class_time_id'       => 'required'
            ]);
            $data=[
                'language_id'       => $request->get('language_id'),
                'level_id'       => $request->get('level_id'),
                'user_id'       => $request->get('user_id'),
                'class_time_id'       => $request->get('class_time_id'),
                'career_id'     =>  null,
                'isCoursing'    => false,
                'id_period'     => null,
            ];
        }

        candidate::create($data);

        $sessionManager->flash('message', 'Se ha creado exitosamente el registro.');
        return redirect()->route('inscriptions');
    }
}
