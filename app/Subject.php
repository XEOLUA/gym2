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
}
