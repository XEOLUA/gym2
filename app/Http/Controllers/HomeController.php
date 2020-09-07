<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Manstatistic;
use App\Mo;
use App\Olympstatistic;
use App\Page;
use App\Services\Statistics;
use App\Teacher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class HomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $direction = Direction::where('active',1)->get();
        $olymp = Olympstatistic::get();
        $man = Manstatistic::get();

        $diplomsCnt = $olymp->count();
        $diplomsCnt += $man->count();

        $stat = Statistics::statinfo($olymp,$man)['pupil'];

        $mos = Mo::all()->sortBy('name');

        $olympstat = $olymp->groupBy('level');
        $manstat = $man->groupBy('level');

        return view('index',compact('direction','olympstat',
            'manstat','stat','diplomsCnt','mos'));
    }

    public function news(){
        return view('news');
    }

    public function page($slug){
        $pageContent = Page::where('slug',$slug)->get();
        return view('page',compact('pageContent'));
    }

    public function statistics(){
        $olymp = Olympstatistic::get();
        $man = Manstatistic::get();

        $stat = Statistics::statinfo($olymp,$man);
        return view('statistics',compact('stat'));
    }
}
