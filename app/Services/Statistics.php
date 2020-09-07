<?php

namespace App\Services;

use App\Teacher;

class Statistics
{
  public static function statinfo($olymp,$man){
      $bal =[
            1=>[
               1=>['o'=>0,'m'=>3],
               2=>['o'=>0,'m'=>2],
               3=>['o'=>0,'m'=>1],
               ],
            2=>[
                1=>['o'=>3,'m'=>12],
                2=>['o'=>2,'m'=>8],
                3=>['o'=>1,'m'=>5],
                ],
            3=>[
                1=>['o'=>12,'m'=>30],
                2=>['o'=>8,'m'=>20],
                3=>['o'=>5,'m'=>16],
                ],
            4=>[
                1=>['o'=>30,'m'=>60],
                2=>['o'=>20,'m'=>50],
                3=>['o'=>16,'m'=>40],
            ]
      ];

      $res = [
          'pupil'=>
              [
              'o'=>[],
              'm'=>[],
              'all'=>[]
              ],
          'teacher'=>
              [
                  'o'=>[],
                  'm'=>[],
                  'all'=>[]
              ],
      ];

      foreach($olymp as $item){
          if(!isset($res['pupil']['o'][$item->pupil])) $res['pupil']['o'][$item->pupil]=$bal[$item->level][$item->position]['o'];
           else $res['pupil']['o'][$item->pupil]+=$bal[$item->level][$item->position]['o'];
          if(!isset($res['pupil']['all'][$item->pupil])) $res['pupil']['all'][$item->pupil]=$bal[$item->level][$item->position]['o'];
            else $res['pupil']['all'][$item->pupil]+=$bal[$item->level][$item->position]['o'];
      }

      foreach($man as $item){
          if(!isset($res['pupil']['m'][$item->pupil])) $res['pupil']['m'][$item->pupil]=$bal[$item->level][$item->position]['m'];
          else $res['pupil']['m'][$item->pupil]+=$bal[$item->level][$item->position]['m'];
          if(!isset($res['pupil']['all'][$item->pupil])) $res['pupil']['all'][$item->pupil]=$bal[$item->level][$item->position]['m'];
          else $res['pupil']['all'][$item->pupil]+=$bal[$item->level][$item->position]['m'];
      }
      array_multisort($res['pupil']['all'],SORT_DESC);

      $teachers = Teacher::pluck('snp','id');

      foreach($olymp as $item){
          if(!isset($res['teacher']['o'][$teachers[$item->teacher_id]])) $res['teacher']['o'][$teachers[$item->teacher_id]]=$bal[$item->level][$item->position]['o'];
          else $res['teacher']['o'][$teachers[$item->teacher_id]]+=$bal[$item->level][$item->position]['o'];
          if(!isset($res['teacher']['all'][$teachers[$item->teacher_id]])) $res['teacher']['all'][$teachers[$item->teacher_id]]=$bal[$item->level][$item->position]['o'];
          else $res['teacher']['all'][$teachers[$item->teacher_id]]+=$bal[$item->level][$item->position]['o'];
      }

      foreach($man as $item){
          if(!isset($res['teacher']['m'][$teachers[$item->teacher_id]])) $res['teacher']['m'][$teachers[$item->teacher_id]]=$bal[$item->level][$item->position]['m'];
          else $res['teacher']['m'][$teachers[$item->teacher_id]]+=$bal[$item->level][$item->position]['m'];
          if(!isset($res['teacher']['all'][$teachers[$item->teacher_id]])) $res['teacher']['all'][$teachers[$item->teacher_id]]=$bal[$item->level][$item->position]['m'];
          else $res['teacher']['all'][$teachers[$item->teacher_id]]+=$bal[$item->level][$item->position]['m'];
      }
      array_multisort($res['teacher']['all'],SORT_DESC);

      return $res;
  }
}