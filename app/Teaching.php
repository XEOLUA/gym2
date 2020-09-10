<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    public function subjects()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
    public function teachers()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
}
