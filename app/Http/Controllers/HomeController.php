<?php

namespace App\Http\Controllers;

use App\Circle;
use App\Direction;
use App\Http\Sections\Circles;
use App\Http\Sections\Sliders;
use App\Manstatistic;
use App\Mo;
use App\News;
use App\Newstype;
use App\Olympstatistic;
use App\Page;
use App\Position;
use App\Services\Statistics;
use App\Slider;
use App\Teacher;
use App\Teacherspage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
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

        $teachers = Teacher::where('active',1)->get();
        $teachers_statistics = [
            'all' => $teachers->count(),
            'category' => [
                'hight' => $teachers->where('category','вища')->count(),
                'first' => $teachers->where('category','перша')->count(),
                'second' => $teachers->where('category','друга')->count(),
                'spets' => $teachers->where('category','спеціаліст')->count()
            ],
            'title' =>[
                'hight' => $teachers->where('title','старший вчитель')->count(),
                'method' => $teachers->where('title','вчитель-методист')->count(),
            ]
        ];

        $mos = Mo::with('subjects','teachers')
            ->where('active',1)
            ->get()
            ->sortBy('name');

        $olympstat = $olymp->groupBy('level');
        $manstat = $man->groupBy('level');

        $news = News::with('newstypes')->take(10)->get();

        $circles = Circle::where('active',1)->get()->sortBy('order');
        $sliders = Slider::where('active',1)->get()->sortBy('order');

        return view('index',compact('direction','olympstat',
            'manstat','stat','diplomsCnt','mos','circles','news','teachers',
        'teachers_statistics', 'sliders'
        ));
    }

    public function news(){
        $news = News::with('newstypes')->orderByDESC('updated_at')->take(6)->get();
        return view('news',compact('news'));
    }

    public function newsaj(Request $request){
        $page=(int)(request()->page);

        $news = News::with('newstypes')
            ->orderByDESC('updated_at')
            ->offset(($page - 1) * 6)->take($page*6)
            ->get();

        if(count($news)>0)
            return view('newsaj',compact('news'))->render(); else return 'empty';

//        return view('news',compact('news'));
    }

    public function newstype($slug){
//        $newstype = Newstype::with('newses')->where('slug',$slug)->take(6)->get();
        $newstype= Newstype::with(['newses'=>function($query) {
            return $query->orderByDESC('updated_at')->limit(6);
        }])->where('slug',$slug)->get();

         return view('newstype',compact('newstype'));
    }

    public function newstypeaj(Request $request,$slug){

        $page=(int)(request()->page);

        $newses = Newstype::with(['newses'=>function($query)use(&$page) {
            return $query->orderByDESC('updated_at')->offset(($page - 1) * 6)->take($page*6);
        }])->where('slug',$slug)->get();

        if(count($newses[0]->newses)>0)
            return view('newstypeaj',compact('newses'))->render(); else return 'empty';

//        return view('news',compact('news'));
    }

    public function newsone($id){
        $news = News::with('newstypes')->where('id',$id)->get();
        return view('new',compact('news'));
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

        $teachers = Teacher::with('subjects','teacherspages')
            ->where('active',1)->get()->keyBy('id');
        $mo = Mo::with('teachers')
//            ->where('active',1)
            ->where('link',$slug)
            ->get()
            ->sortBy('name');

        $positions = Position::pluck('name','id');

        return view('mospage',compact('mo','positions','teachers'));
    }

    public function statistics(){
        $olymp = Olympstatistic::get();
        $man = Manstatistic::get();

        $stat = Statistics::statinfo($olymp,$man);
        return view('statistics',compact('stat'));
    }

    public function teachers($id){
        if($id=='all')
         $teachers = Teacher::with('subjects','teacherspages')->where('active',1)->orderBy('snp')->get();

        $positions = Position::pluck('name','id');
        return view('teachers',compact('teachers','positions'));
    }

    public function teacherspages($teacher_id){

        $cur_page=(int)(request()->page);
        $teacherinfo = Teacher::with('subjects')->where('id',$teacher_id)->get()[0];

        $pages = Teacherspage::where('teacher_id',$teacher_id)->orderBy('order')->get()->keyBy('id');

        return view('teacherspage',compact('teacherinfo','pages','cur_page'));
    }
}
