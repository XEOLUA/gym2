<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjectinmo extends Model
{
    public function subjects()
    {
        return $this->belongsTo('App\Subject','subject_id','id');
    }
    public function moforteacher()
    {
        return $this->belongsTo('App\Mo','mo_id','id');
    }
}
