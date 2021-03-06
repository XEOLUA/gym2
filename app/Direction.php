<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;

    public function getOrderField()
    {
        return 'order';
    }
    public function teachers()
    {
        return $this->belongsTo('App\Teacher','teacher_id','id');
    }
}
