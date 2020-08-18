<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $table = 'navigates';
    protected $fillable = ['title'];

    public function getOrderField()
    {
        return 'order';
    }
}
