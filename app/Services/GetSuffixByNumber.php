<?php


namespace App\Services;


class GetSuffixByNumber
{
 static public function get_suffix($number){
  $suf = ["","и","ів"];
  $des=0;$od=0;
    if ($number>=1 && $number<=9) $od=$number; else
        if($number>=10 && $number<=99)  {$od=$number%10; $des=(int)($number/10);}
            else {$od=$number%10; $des=$number%100/10;};

            if($od==1 && $des!=1) return $suf[0];
             else if($od>=2 && $od<=4 && $des!=1) return $suf[1];
              else return $suf[2];
//    return ($od==1 && $des!=1) ? $suf[0] :
//        ($od>=2 && $od<=4 && $des!=1) ? $suf[1] : $suf[2];
 }
}
