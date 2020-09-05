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
}
