<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupilinsocialgroup extends Model
{
    public function pupils()
    {
        return $this->belongsTo('App\Pupil','pupil_id','id');
    }
    public function socialgroups()
    {
        return $this->belongsTo('App\Socialgroup','socialgroup_id','id');
    }
}
