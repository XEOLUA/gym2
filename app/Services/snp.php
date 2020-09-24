<?php

namespace App\Services;

class snp
{
  static public function snpExplode($snp=null){

     $snp = trim($snp, " ");

     $snp = preg_replace('/\s+/', ' ', $snp);

     $text=explode(" ",$snp);

     return $text[0]."&nbsp;".mb_substr($text[1],0,1).".&nbsp;".mb_substr($text[2],0,1).".";
  }
}