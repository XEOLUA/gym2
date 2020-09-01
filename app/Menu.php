<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    protected $fillable = ['title'];

    public function getOrderField()
    {
        return 'order';
    }
}
