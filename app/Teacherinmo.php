<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacherinmo extends Model
{
    public function teachers()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
    public function mo()
    {
        return $this->belongsTo('App\Mo','mo_id','id');
    }
}
