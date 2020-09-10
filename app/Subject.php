<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function olympstatistic()
    {
        return $this->hasMany('App\Olympstatistic');
    }

    public function subjectinmo()
    {
        return $this->hasMany('App\Subjectinmo', 'subject_id', 'id');
    }

    public function mo()
    {
        return $this->belongsToMany('App\Mo','subjectinmos');
    }

    public function subjectforteacher()
    {
        return $this->hasMany('App\Teaching', 'teacher_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','teachings');
    }
}
