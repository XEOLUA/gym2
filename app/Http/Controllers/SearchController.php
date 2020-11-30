<?php

namespace App\Http\Controllers;

use App\Http\Sections\Pupils;
use App\Manstatistic;
use App\Mo;
use App\News;
use App\Olympstatistic;
use App\Page;
use App\Subject;
use App\Teacher;
use App\Teacherspage;
use App\Teaching;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $text = $request->all()['search'];
        $curpage = $request->all()['cur_page'] ?? 1;

        $news = News::where('active', 1)
            ->where(function ($q) use (&$text) {
                $q->where('title', "LIKE", "%" . $text . "%")
                    ->orWhere('description', "LIKE", "%" . $text . "%");
            })
            ->get();

        $news = $news->map(function ($item) {
            $item->path = 'new/' . $item->id;
            $item->title = 'Новина: ' . $item->title;
            return $item;
        });

            $pages = Page::where('slug', "<>", '')
                ->where(function ($q) use (&$text) {
                    $q->where('title', "LIKE", "%" . $text . "%")
                        ->orWhere('text', "LIKE", "%" . $text . "%");
                })
                ->get();

            $pages = $pages->map(function ($item) {
                $item->path = 'page/' . $item->slug;
                $item->title = 'Сторінка: ' . $item->title;

                return $item;
            });

            $teachers_page = Teacherspage::with('teachers')
                ->where('title', "LIKE", "%" . $text . "%")
                ->orWhere('content', "LIKE", "%" . $text . "%")
                ->get();

            $teachers_page = $teachers_page->map(function ($item) {
                $item->path = 'teachers/page/' . $item->teacher_id . '/' . $item->id;
                $item->title = $item->teachers->snp . ', ' . $item->title;

                return $item;
            });

            $teachers = Teacher::where('active',1)
                ->where(function($q)use(&$text){
                      $q->where('snp',"LIKE","%".$text."%")
                        ->orWhere('category',"LIKE","%".$text."%")
                        ->orWhere('title',"LIKE","%".$text."%");
                })
                ->get();

            $teachers = $teachers->map(function ($item){
                $item->path = 'teachers/page/' . $item->id;
                $item->title = $item->snp;
                return $item;
            });


        $subjects = Subject::with('mo')
                ->where('name',"LIKE","%".$text."%")
            ->get();

        $subjects = $subjects->map(function ($item){
            if(isset($item->mo[0])){
                $item->path = 'mos/' . $item->mo[0]->link;
                $item->title = "МО \"".$item->mo[0]->name."\"";
            }
            return $item;
        });

       $teach = Teacher::with(['subjects'=>function($q)use(&$text){
           $q->where('subjects.name',"LIKE","%".$text."%");
       }])->get();


       $t=[];
       foreach ($teach as $i){
           if($i->subjects->count())$t[]=$i;
       }
       $t=collect($t);

       $t = $t->map(function ($item){
       $item->path = 'teachers/page/' . $item->id;
        $item->title = $item->snp;
        return $item;
       });

        $position = Teacher::with(['positions'=>function($q)use(&$text){
            $q->where('positions.name',"LIKE","%".$text."%");
        }])->get();

        $p=[];
        foreach ($position as $i){
            if($i->positions!=null)$p[]=$i;
        }
        $p=collect($p);

        $p = $p->map(function ($item){
            $item->path = 'teachers/page/' . $item->id;
            $item->title = $item->snp;
            return $item;
        });

        $mos = Teacher::with('mo')
            ->where('active',1)
            ->where('snp',"LIKE","%".$text."%")
            ->get();

        $mos = $mos->map(function ($item){
            if(isset($item->mo[0])){
                $item->path = 'mos/' . $item->mo[0]->link;
                $item->title = "МО \"".$item->mo[0]->name."\"";
            }
            return $item;
        });

        $pupils_olymp = Olympstatistic::with('subjects','teachers')
            ->orderByDesc('year')
            ->orderByDESC('level')
            ->orderBy('position')
            ->where('pupil','LIKE',"%".$text."%")->get();

        $levels = ['2'=>'II','3'=>'III','4'=>'IV','5'=>'V'];

        $pupils_olymp = $pupils_olymp->map(function ($item)use(&$levels){
            $item->path = 'statistics/olymps/pupils/' . $item->pupil;
            $item->title = "Олімпіади, учасник: ".$item->pupil
                .", місце: ".$item->position
                .", етап: ".$levels[$item->level]
                .', рік: '.$item->year
                .', предмет: '.$item->subjects->name
                .', наставник: '.$item->teachers->snp
            ;
            return $item;
        });

        $pupils_man = Manstatistic::with('subjects','teachers')
            ->orderByDesc('year')
            ->orderByDESC('level')
            ->orderBy('position')
            ->where('pupil','LIKE',"%".$text."%")->get();

        $levels = ['1'=>'I','2'=>'II','3'=>'III'];

        $pupils_man = $pupils_man->map(function ($item)use(&$levels){
            $item->path = 'statistics/mans/pupils/' . $item->pupil;
            $item->title = "МАН, учасник: ".$item->pupil
                .", місце: ".$item->position
                .", етап: ".$levels[$item->level]
                .', рік: '.$item->year
                .', предмет: '.$item->subjects->name
                .', наставник: '.$item->teachers->snp
            ;
            return $item;
        });

            $results = $news
                ->concat($pages)
                ->concat($teachers_page)
                ->concat($teachers)
                ->concat($subjects)
                ->concat($mos)
                ->concat($t)
                ->concat($p)
                ->concat($pupils_olymp)
                ->concat($pupils_man)
            ;
            $total = $results->count();

            $results = $results->forPage($curpage, 10);

//           dd($results);

        return view('ressearch', compact('text','results', 'total','curpage'));
    }

}
