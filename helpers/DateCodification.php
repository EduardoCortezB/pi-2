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
