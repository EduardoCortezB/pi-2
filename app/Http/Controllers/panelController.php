<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Helpers\metricsHelper;
use Illuminate\Support\Facades\DB;

class panelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.redIfNoAuth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metrics= new metricsHelper(Auth::user());
        if(Auth::user()->id_rol=='1'){
            // métricas standares
            $data=$metrics->getAllMetrics();
            // min y max de los años registrados
            $years = DB::select('select min(year) as minY, max(year) as maxY from period');
            $years=$years[0];

            return view('panel.content-admin.index',compact('data','years'));
        }
        return view('panel.content.index');
    }
}
