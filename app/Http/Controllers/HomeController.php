<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $direction = Direction::where('active',1)->get();
        return view('index',compact('direction'));
    }

    public function news(){
        return view('news');
    }

    public function page($slug){
        $pageContent = Page::where('slug',$slug)->get();

//        dd($pageContent);
        return view('page',compact('pageContent'));
    }
}
