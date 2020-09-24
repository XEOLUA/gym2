<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function teachers()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
    public function cabinets()
    {
        return $this->belongsTo('App\Cabinet','cabinet_id','id');
    }
    public function pupils()
    {
        return $this->hasMany('App\Pupil', 'class_id', 'id');
    }

}
