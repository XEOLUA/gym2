<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mo extends Model
{
    public function moforteacher()
    {
        return $this->hasMany('App\Teacherinmo', 'mo_id', 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','teacherinmos');
    }

    public function moforsubject()
    {
        return $this->hasMany('App\Subjectinmo', 'mo_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject','subjectinmos');
    }

}
