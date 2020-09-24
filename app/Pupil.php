<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    public function classes()
    {
        return $this->belongsTo('App\Classe', 'class_id', 'id');
    }

    public function pupilinsocialgroup()
    {
        return $this->hasMany('App\Pupilinsocialgroup');
    }

    public function socialgroups()
    {
        return $this->belongsToMany('App\Socialgroup','pupilinsocialgroups');
    }
}
