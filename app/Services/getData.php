<?php


namespace App\Services;


use App\Navigation;

class getData
{
    public static function navigate($block_id){
        $data = Navigation::where('block_id',$block_id)->get();
        return $data;
    }
}
