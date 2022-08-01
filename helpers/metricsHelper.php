<?php
namespace Helpers;

use App\Models\candidate;
use App\Models\Language;
use App\Models\period;

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
        $preinscription=candidate::all();
        $preinscription = $preinscription->where('isCoursing','=',true);
        $studentsCoursing=0;
        for ($i=0; $i < $preinscription->count(); $i++) {
            if ($preinscription[$i]->period->isActive) {
                $studentsCoursing++;
            }
        }
        $dataResponse['data']['metrics']['studentsCoursing']=$studentsCoursing;

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
