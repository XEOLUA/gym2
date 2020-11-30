<?php


namespace App\Services;


class GetSuffixByNumber
{
 static public function get_suffix($value, $unit1, $unit2, $unit3){
     $value = abs( (int)$value );
     if( ($value % 100 >= 11) && ($value % 100 <= 19) ){
         return $unit3;
     }else{
         switch( $value % 10 ){
             case 1:
                 return $unit1;
             case 2:case 3:case 4:
             return $unit2;
             default:
                 return $unit3;
         }
     }
 }
}
