<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socialgroup extends Model
{
    public function socialgroupforpupil()
    {
        return $this->hasMany('App\Pupilinsocialgroup');
    }
    public function pupils()
    {
        return $this->belongsToMany('App\Pupil','pupilinsocialgroups');
    }
}
