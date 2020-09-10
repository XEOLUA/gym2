<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Teacher extends Eloquent
{
    public function directions()
    {
        return $this->hasMany('App\Direction');
    }
    public function classes()
    {
        return $this->hasMany('App\Classe');
    }
    public function cabinets()
    {
        return $this->hasMany('App\Cabinet');
    }
    public function olympstatistic()
    {
        return $this->hasMany('App\Olympstatistic');
    }
    public function manstatistic()
    {
        return $this->hasMany('App\Manstatistic');
    }
    public function teacherinmo()
    {
        return $this->hasMany('App\Teacherinmo', 'teacher_id', 'id');
    }

    public function mo()
    {
        return $this->belongsToMany('App\Mo','teacherinmos');
    }
    public function teachings()
    {
        return $this->hasMany('App\Teaching', 'teacher_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject','teachings');
    }

//    public function teacherforsubject()
//    {
//        return $this->hasMany('App\Teacherinmo', 'mo_id', 'id');
//    }
}
