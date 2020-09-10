<?php

namespace App\Http\Controllers;

use App\Circle;
use App\Direction;
use App\Http\Sections\Circles;
use App\Manstatistic;
use App\Mo;
use App\News;
use App\Newstype;
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

        $mos = Mo::with('subjects','teachers')
            ->where('active',1)
            ->get()
            ->sortBy('name');

        $olympstat = $olymp->groupBy('level');
        $manstat = $man->groupBy('level');

        $news = News::with('newstypes')->get();

        $circles = Circle::where('active',1)->get()->sortBy('order');

        return view('index',compact('direction','olympstat',
            'manstat','stat','diplomsCnt','mos','circles','news'));
    }

    public function news(){
        $newstypes = Newstype::with('newses')->get();
        return view('news',compact('newstypes'));
    }

    public function newstypes($slug){
        $newstypes = Newstype::with('newses')->where('slug',$slug)->get();
        return view('news',compact('newstypes'));
    }

    public function page($slug){
        $pageContent = Page::where('slug',$slug)->get();
        return view('page',compact('pageContent'));
    }

    public function mospage($slug){
//        $pageContent = Page::where('slug',$slug)->get();
        $mo = Mo::with('subjects','teachers')
            ->where('active',1)
            ->where('link',$slug)
            ->get()
            ->sortBy('name');
        return view('mospage',compact('mo'));
    }

    public function statistics(){
        $olymp = Olympstatistic::get();
        $man = Manstatistic::get();

        $stat = Statistics::statinfo($olymp,$man);
        return view('statistics',compact('stat'));
    }

    public function teachers($id){
//        dd('teachers');
        if($id=='all')
         $teachers = Teacher::with('subjects')->where('active',1)->orderBy('snp')->get();
        return view('teachers',compact('teachers'));
    }
}
