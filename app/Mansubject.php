<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mansubject extends Model
{
    public function manstatistic()
    {
        return $this->hasMany('App\Manstatistic');
    }
}
