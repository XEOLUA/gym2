<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manstatistic extends Model
{
    public function teachers()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
    public function subjects()
    {
        return $this->belongsTo('App\Mansubject','subject_id','id');
    }

}
