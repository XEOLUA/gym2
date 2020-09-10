<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    use \SleepingOwl\Admin\Traits\OrderableModel;
    public function getOrderField()
    {
        return 'order';
    }
}
