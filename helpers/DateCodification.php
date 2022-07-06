<?php
namespace Helpers;

class DateCodification{
    public static function getDaysFromIntToStrHuman($intDaysString){
        $days = [
            1       => 'Lunes',
            2       => 'Martes',
            3       => 'Miércoles',
            4       => 'Jueves',
            5       => 'Viernes',
            6       => 'Sábado',
            7       => 'Domingo'
        ];
        $outDaysString='';
        $intDaysString = explode(',',$intDaysString);

        foreach ($intDaysString as $key => $value) {
            if (count($intDaysString)-1 == $key) {
                return $outDaysString .= $days[$value];
            }
            $outDaysString .= $days[$value]. ', ';
        }
        return $outDaysString;
    }
    // Obtenemos un estring de entrada el cual tendra los dias de la semana en
    // letra
    // El método retornara un array con enteros dependiendo del dia de la semana
    // Ejemplo de entrada
    // ['Lunes','Jueves']
    // Ejemplo de salida
    // array(2) { [0]=> array(1) { ["Lunes"]=> int(1) } [1]=> array(1) { ["Jueves"]=> int(4) } }
    public static function getDaysFromStrHumToArr($inStr){

        $ouArr=[];
        $days = [
            'Lunes'     => 1,
            'Martes'    => 2,
            'Miércoles' => 3,
            'Jueves'    => 4,
            'Viernes'   => 5,
            'Sábado'    => 6,
            'Domingo'   => 7
        ];
        $inStr = str_replace(' ','',$inStr);
        $inArr = explode(',',$inStr);

        foreach($days as $key => $val){
            foreach ($inArr as $_key => $_val) {
                if ($key == $_val) {
                    // array_push($ouArr, [$key=>$val]);
                    $ouArr[$key][]= $val;
                }
            }
        }
        return $ouArr;
    }

    public static function getStrIntFromRequest($request){
        $outStr='';
        $days = [
            (!empty($request->get('mo'))) ? 1 : '',
            (!empty($request->get('tu'))) ? 2 : '',
            (!empty($request->get('we'))) ? 3 : '',
            (!empty($request->get('th'))) ? 4 : '',
            (!empty($request->get('fr'))) ? 5 : '',
            (!empty($request->get('sa'))) ? 6 : '',
            (!empty($request->get('su'))) ? 7 : '',
        ];
        foreach($days as $key => $val){
            if ($days[$key] == '') {
                unset($days[$key]);
            }else{
                $outStr .= $days[$key].',';
            }
        }
        return substr($outStr, 0, -1);
    }
}
?>
