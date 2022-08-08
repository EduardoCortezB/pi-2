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

        $data=(object)[
            'paymentsPending'=>0,
            'callouts'=>false,
            'preAndInscr',
            'qtyCoursing'=>0,
            'qtyNoCoursing'=>0,
        ];

        $dbdata=DB::select("SELECT COUNT(*) as qty, created_at FROM pi.table_candidats WHERE (isCoursing = 0 AND id_period IS NULL) AND user_id=?",
            [Auth::user()->id]
        )[0];

        $data->preAndInscr=DB::select("SELECT COUNT(*) as qty FROM pi.table_candidats WHERE user_id=?",
            [Auth::user()->id]
        )[0];
        if (!$data->preAndInscr->qty!=0) {
            $data->callouts = true;
        }
        // Iterate all elements of the request sql for payments dont done
        for ($i=0; $i < $dbdata->qty; $i++) {
            // create a variable that has a integer value corresponding with all payments no done
            if(explode('-',$dbdata->created_at)[0]==date('Y')){
                $data->paymentsPending = $data->paymentsPending +1;
                $data->callouts = true;
            }
        }

        $data->qtyCoursing=DB::select("select COUNT(*) as qty from table_candidats WHERE isCoursing = true")[0];
        $data->qtyNoCoursing=DB::select("select COUNT(*) as qty from table_candidats WHERE isCoursing = false")[0];

        return view('panel.content.index', compact('data'));
    }
}
