<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newstype extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    public function getOrderField()
    {
        return 'order';
    }
    public function newses()
    {
        return $this->hasMany('App\News', 'newstype_id', 'id');
    }
}
