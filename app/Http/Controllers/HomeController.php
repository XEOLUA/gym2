<?php

namespace App\Http\Controllers;

use App\Circle;
use App\Classe;
use App\Direction;
use App\Http\Sections\Circles;
use App\Http\Sections\Sliders;
use App\Manstatistic;
use App\Mansubject;
use App\Mo;
use App\News;
use App\Newstype;
use App\Olympstatistic;
use App\Page;
use App\Position;
use App\Pupil;
use App\Services\Statistics;
use App\Slider;
use App\Subject;
use App\Teacher;
use App\Teacherspage;
use OpenGraph;
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

        $mos = Mo::with(['subjects','teachers'=>function($q){
            $q->where('active',1)
            ->orderBy('snp');
        }])
            ->where('active',1)
            ->get()
            ->sortBy('name');

        $olympstat = $olymp->groupBy('level');
        $manstat = $man->groupBy('level');

        $news = News::with('newstypes')->take(10)->get();

        $circles = Circle::where('active',1)->get()->sortBy('order');
        $sliders = Slider::where('active',1)->get()->sortBy('order');

        $og = OpenGraph::title('GYM2.KM.UA | Головна')
            ->type('page')
            ->sitename('Сайт гімназії №2 м.Хмельницького')
            ->image(url('images/og_main.png'))
            ->description('Управління освіти Хмельницької міської ради. Гімназія №2 м.Хмельницького. Функціонує з 2000 року як гімназія №2, до цього – ЗОШ №11 з 1969 року.')
            ->url();

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

        $og = OpenGraph::title($news[0]->title)
            ->type('news')
            ->sitename('Сайт гімназії №2 м.Хмельницького')
            ->image(url($news[0]->image ?? 'images/og_main.png'))
            ->description($news[0]->description)
            ->url();

        return view('new',compact('news'));
    }

    public function newstypes($slug){
        $newstypes = Newstype::with('newses')->where('slug',$slug)->get();
        return view('news',compact('newstypes'));
    }

    public function page($slug){
        $pageContent = Page::where('slug',$slug)->get();

        $og = OpenGraph::title($pageContent[0]->title)
            ->type('page')
            ->sitename('Сайт гімназії №2 м.Хмельницького')
            ->image(url('images/og_main.png'))
            ->description($pageContent[0]->text)
            ->url();

        return view('page',compact('pageContent'));
    }

    public function mospage($slug){

        $teachers = Teacher::with('subjects','teacherspages')
            ->where('active',1)->get()->keyBy('id');
        $mo = Mo::with(['teachers'=>function($q){
            $q->orderBy('snp')->where('active',1);
        }])
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

        $subjects = '';
        foreach ($teacherinfo->subjects as $subject){
          $subjects.=' '.$subject->name;
        }

        $positions = Position::pluck('name','id')->toArray();

        $og = OpenGraph::title($teacherinfo->snp)
            ->type('page')
            ->sitename('Сайт гімназії №2 м.Хмельницького')
            ->image(url($teacherinfo->photo),[
                'width'     => 200,
                'height'    => 300
            ])
            ->description('Посада: '.$positions[$teacherinfo->position].', предмет: '.$subjects.', категорія: '.$teacherinfo->category.', звання: '.$teacherinfo->title)
            ->url();

        return view('teacherspage',compact('teacherinfo','pages','cur_page'));
    }

    public function statisticsolymp($level=null,$subject=null,$year=null){

        $etaps = [
            '2'=>'Міський',
            '3'=>'Обласний',
            '4'=>'Всеукраїнський',
            '5'=>'Міжнародний'
        ];

        $subjects = Subject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('olympstatistics')
            ->join('subjects', 'olympstatistics.subject_id', '=', 'subjects.id')
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        if($level) $stat = $stat->where('level',$level);
        if($subject) $stat = $stat->where('subject_id',$subject);
        if($year) $stat = $stat->where('year',$year);

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
            for($i=2;$i<=5;$i++){
                if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
            }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_olymp',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }

    public function statisticsolymppupil($pupil){

        $etaps = [
            '2'=>'Міський',
            '3'=>'Обласний',
            '4'=>'Всеукраїнський',
            '5'=>'Міжнародний'
        ];

        $subjects = Subject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('olympstatistics')
            ->join('subjects', 'olympstatistics.subject_id', '=', 'subjects.id')
            ->where('pupil',$pupil)
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
        for($i=2;$i<=5;$i++){
            if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
        }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_olymp_pupil',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }

    public function statisticsmanpupil($pupil){

        $etaps = [
            '1'=>'Міський',
            '2'=>'Обласний',
            '3'=>'Всеукраїнський',
        ];

        $subjects = Mansubject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('manstatistics')
            ->join('subjects', 'manstatistics.subject_id', '=', 'subjects.id')
            ->where('pupil',$pupil)
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
        for($i=1;$i<=3;$i++){
            if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
        }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_man_pupil',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }

    public function statisticsolympteacher($teacher){

        $etaps = [
            '2'=>'Міський',
            '3'=>'Обласний',
            '4'=>'Всеукраїнський',
            '5'=>'Міжнародний'
        ];

        $subjects = Subject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('olympstatistics')
            ->join('subjects', 'olympstatistics.subject_id', '=', 'subjects.id')
            ->where('teacher_id',$teacher)
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
        for($i=2;$i<=5;$i++){
            if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
        }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_olymp_teacher',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }

    public function statisticsmanteacher($teacher){

        $etaps = [
            '1'=>'Міський',
            '2'=>'Обласний',
            '3'=>'Всеукраїнський',
        ];

        $subjects = Mansubject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('manstatistics')
            ->join('subjects', 'manstatistics.subject_id', '=', 'subjects.id')
            ->where('teacher_id',$teacher)
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
        for($i=1;$i<=3;$i++){
            if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
        }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_man_teacher',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }

    public function statisticsman($level=null,$subject=null,$year=null){

        $etaps = [
            '1'=>'Міський',
            '2'=>'Обласний',
            '3'=>'Всеукраїнський'
        ];

        $subjects = Mansubject::all()->keyBy('id','name');
        $teachers = Teacher::all()->keyBy('id','snp');

        $stat = DB::table('manstatistics')
            ->join('subjects', 'manstatistics.subject_id', '=', 'subjects.id')
            ->orderBy('level','DESC')
            ->orderBy('year','DESC')
            ->orderBy('subjects.name')
            ->orderBy('position')
            ->get();

        if($level) $stat = $stat->where('level',$level);
        if($subject) $stat = $stat->where('subject_id',$subject);
        if($year) $stat = $stat->where('year',$year);

        $group_etap = $stat->groupBy(['level']);
        $group_etap_subject = $stat->groupBy(['level','subject_id']);
//dd($group_etap);
        $counts_etaps = [];
        for($i=1;$i<=3;$i++){
            if(isset($group_etap[$i])) $counts_etaps[$i]=$group_etap[$i]->count();
        }

        $group = $stat->groupBy(['level','subject_id','year']);
//    dd($group);
        return view('statistics_man',compact('stat','counts_etaps', 'subjects','etaps','teachers','group','group_etap_subject'));
    }


    public function classes($class_id = null){

        $classes = Classe::with(['teachers',
            'pupils' => function($q)
             {
               $q->where('pupils.archive','0');
             }])
        ->orderBy('name')
        ->get();

        $ar = $classes->map(function ($item){
           return $item->pupils->count();
        });

        $cl = [];
        foreach ($classes as $class){
            $m=0;$f=0;
            foreach($class->pupils as $item){
                ($item->sex==1) ? $m++ : $f++;
            }
            $cl[$class->id]=['m'=>$m,'f'=>$f];
        }
//dd($cl);
        $all_pupils = $ar->sum();

        return view('classes',compact('classes','all_pupils','cl'));
    }
}
