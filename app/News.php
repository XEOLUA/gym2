<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $table = 'newses';
    public function getOrderField()
    {
        return 'order';
    }
    public function newstypes()
    {
        return $this->belongsTo('App\Newstype', 'newstype_id', 'id');
    }
}
