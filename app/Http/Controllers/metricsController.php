<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use App\Models\candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Session\SessionManager;

class metricsController extends Controller
{
    private $metrics=[
        'data' => [
            'metrics' => [
                'paymentsDone'=>0,
                'paymentsDontDone'=>0,
                'levels'=>[], //list
                'levelsValues'=>[], //list
                'gruposActivos'=>0,
                'gruposInactivos'=>0,
                'gruposTotales'=>0,
                'students'=>0,//list
                'noStudents'=>0,//list
                'totalStudents'=>0
            ],
            'period'=>[
                'startMonth'=>null,
                'endMonth'=>null,
                'year'=>null,
            ],
            'monetary'=>[
                'total'=>0,
                'noStudents'=>0,
                'students'=>0,
            ]
        ]
    ];

    private function callbO($p1){
        return $p1;
    }

    private function getMetrics($request){
        $startM = $request->get('startMont');
        $endM = $request->get('endMont');
        $this->metrics['data']['period']['startMonth']=$startM;
        $this->metrics['data']['period']['endMonth']=$endM;
        $this->metrics['data']['period']['year']=$request->get('year');

        $periods = DB::table('period')
        ->join('table_levels', 'period.id_level', '=', 'table_levels.id')
        ->join('table_class_times', 'period.id_class_time', '=', 'table_class_times.id')
        ->join('languages', 'period.language_id', '=', 'languages.id')
        ->where('start-date','like', "%$startM")
        ->where('end-date','like', "%$endM")
        ->where('year','=',$request->get('year'))->get();

        // grupos activos en este periodo.
        // grupos inactivos en este periodo.
        for ($pr=0; $pr < $periods->count(); $pr++) {
            if ($periods[$pr]->isActive) {
                $this->metrics['data']['metrics']['gruposActivos']=$this->metrics['data']['metrics']['gruposActivos']+1;
            }else{
                $this->metrics['data']['metrics']['gruposInactivos']=$this->metrics['data']['metrics']['gruposInactivos']+1;
            }
        }

        $this->metrics['data']['metrics']['gruposTotales']=$this->metrics['data']['metrics']['gruposActivos']+$this->metrics['data']['metrics']['gruposInactivos'];

        // Buscar todas las preinscripciones y validar cuantas han sido pagadas y cuentas no.
        $preinscriptions = DB::table('table_candidats')
        ->select('*')
        ->join('users', 'table_candidats.user_id', '=', 'users.id')
        ->leftJoin('table_levels', 'table_candidats.level_id', '=', 'table_levels.id')
        ->leftJoin('languages', 'table_candidats.language_id', '=', 'languages.id')
        ->leftJoin('table_class_times', 'table_candidats.class_time_id', '=', 'table_class_times.id')
        ->leftJoin('table_careers', 'table_candidats.career_id', '=', 'table_careers.id')
        ->join('period', 'table_candidats.id_period', 'period.id')
        ->where('year', '=', $request->get('year'))
        ->where(function ($query) use ($startM,$endM) {
            $query->where('start-date','like', "%$startM")
                  ->where('end-date','like', "%$endM");
        })
        ->get();

        // sacamos los niveles
        $this->metrics['data']['metrics']['levels']=Level::all()->pluck('name_level')->toArray();
        $this->metrics['data']['metrics']['levelsValues']=array_fill(0,count($this->metrics['data']['metrics']['levels']),0);

        // generamos el array de valores para la relacion de nivel.numero de los alumnos inscritos.
        for ($p=0; $p < $preinscriptions->count(); $p++) {
            foreach ($this->metrics['data']['metrics']['levels'] as $key => $value) {
                if ($value==$preinscriptions[$p]->name_level) {
                    $this->metrics['data']['metrics']['levelsValues'][$key] = intval($this->metrics['data']['metrics']['levelsValues'][$key])+1;
                }
            }

            // validar cuantas han sido pagadas
            if ($preinscriptions[$p]->isCoursing) {
                $this->metrics['data']['metrics']['paymentsDone']++;
            }else{
                // validar cuantas no han sido pagadas
                $this->metrics['data']['metrics']['paymentsDontDone']++;
            }

            if ($preinscriptions[$p]->career_id!=null) {
                $this->metrics['data']['metrics']['students']++;
            }else{
                $this->metrics['data']['metrics']['noStudents']++;
            }
        }
        // obtenemos los estudiantes totales
        $this->metrics['data']['metrics']['totalStudents']=$this->metrics['data']['metrics']['students']+$this->metrics['data']['metrics']['noStudents'];

        // obtener el monto del total del periodo
        $this->metrics['data']['monetary']['noStudents']=$this->metrics['data']['metrics']['noStudents']*2400;
        $this->metrics['data']['monetary']['students']=$this->metrics['data']['metrics']['students']*1800;
        $this->metrics['data']['monetary']['total']=$this->metrics['data']['monetary']['noStudents']+$this->metrics['data']['monetary']['students'];
    }


    // Get report
    public function getReportAdmin1(Request $request, SessionManager $sessionManager){

        $this->getMetrics($request);

        return view('panel.content-admin.reports.report1')->with([
            'metrics'=>$this->metrics
        ]);
    }

    public function downloadReport(Request $request){
        $pdf = App::make('dompdf.wrapper');

        $this->getMetrics($request);

        $pdf->loadView('panel.content-admin.reports.report1', ['metrics'=>$this->metrics]);

        return $pdf->download('archivo.pdf');

    }
}





