<?php
namespace Helpers;

use App\Models\period;
use App\Models\Language;
use App\Models\candidate;
use Illuminate\Support\Facades\DB;

class metricsHelper {
    private $id;
    private $name;
    private $lastName;
    private $request;
    private $dataResponse;


    function __construct($user, $request=null){
        $this->id = $user->id;
        $this->name = $user->name;
        $this->lastName = $user->lastName;
        $this->request = $request;
    }


    public function getAllMetrics(){
        // get preinscriptions pendings
        $preinscription=candidate::all();
        $preinscription = $preinscription->where('isCoursing','=',false);
        $dataResponse['data']['metrics']['preinscriptions']=$preinscription->count();

        // languages actives
        $language=Language::all();
        $language = $language->where('isActive','=',true);
        $dataResponse['data']['metrics']['languages']=$language->count();

        // students are coursing
        $preinscription = DB::table('table_candidats')
        ->select('*')
        ->join('users', 'table_candidats.user_id', '=', 'users.id')
        ->join('period', 'table_candidats.id_period', 'period.id')
        ->where(function ($query) {
            $query->where('isCoursing','=', true);
        })
        ->get();

        $dataResponse['data']['metrics']['studentsCoursing']=COUNT($preinscription);

        // get periods actives of current year
        if ($this->request != null) {
            // get only the metrics of the determinate date month && year
        }else{
            // get all metrics of current year
            $periods_ = period::all();
            $periodsActivesIsCurrentY = $periods_->where('year','=',date('Y'))->where('isActive','=',true);
            $periodsActivesNotCurrentY = $periods_->where('year','!=',date('Y'))->where('isActive','=',true);
            $dataResponse['data']['metrics']['periodsActivesIsCurrentY']=$periodsActivesIsCurrentY->count();
            $dataResponse['data']['metrics']['periodsActivesNotCurrentY']=$periodsActivesNotCurrentY->count();
        }



        return (object) $dataResponse;
    }
}

?>
