<?php

namespace App\Http\Controllers;

use App\Mo;
use App\Position;
use App\Subject;
use App\Teacher;
use App\Teacherspage;
use App\User;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class TeacherController extends Controller
{
    public function index($page_id=null){
        $pages = Teacherspage::where('teacher_id',auth()->user()->teacher_id)->orderBy('order')->get()->keyBy('id');
        if($pages->count()>0 && $page_id==null) $page_id=$pages->first()->id;
        $positions = Position::all();
        $mos = Mo::all();
        $subjects = Subject::all();
        return view('profile',
            compact('pages','page_id','positions','mos','subjects'));
    }

    public function pageorder($page_id,$direct){

        $pages = Teacherspage::where('teacher_id',auth()->user()->teacher_id)->orderBy('order')->get()->keyBy('id');

        $order_cur = $pages[$page_id]->order;

        if($direct=='up'){
            $id_prev = $pages->where('order','<',$order_cur)->last()->id;
            Teacherspage::where('id',$id_prev)->increment('order');
            Teacherspage::where('id',$page_id)->decrement('order');
        }

        if($direct=='down'){
            $id_prev = $pages->where('order','>',$order_cur)->first()->id;
            Teacherspage::where('id',$id_prev)->decrement('order');
            Teacherspage::where('id',$page_id)->increment('order');
        }

        return redirect('arm/profile');
    }

    public function getpageinfo($id){
        $pages = Teacherspage::where('teacher_id',auth()->user()->teacher_id)
            ->where('id',$id)
            ->orderBy('order')
            ->get();
        return json_encode($pages[0]);
    }

    public function saveteacherpage(Request $request){
        $data = $request->all();

        if(isset($data['id_f']) && $data['id_f'])
         $page = Teacherspage::find($data['id_f']);
        else{
            $page = new Teacherspage();
            $last_page = Teacherspage::where('teacher_id',auth()->user()->teacher_id)->
            orderby('order', 'desc')->first();
            $page->teacher_id = auth()->user()->teacher_id;
            $page->order = $last_page->order + 1;
        }


        $page->title = $data['title_f'];
        $page->content = $data['content_f'];
        $page->save();
        return 'success';
    }

    public function deleteteacherpage(Request $request){
        $data = $request->all();
        Teacherspage::where('id', $data['id_f_delete'])->delete();
        return 'delete success';
    }

    public function getteacherinfo($teacher_id){
       $teacher = Teacher::with('teacherinmo','teachings')->where('id',$teacher_id)->get();
        return json_encode($teacher[0]);
    }

    public function saveteacherinfo(Request $request){
        $sex = [1 => 'ч', 2 => 'ж'];
        $data = $request->all();
        $teacher = Teacher::find($data['id_teacher_f']);
        $teacher->snp = $data['snp_teacher_f'];
        $teacher->position = $data['position_teacher_f'];
        $teacher->sex = $sex[$data['sex_teacher_f']];
        $teacher->date = $data['date_teacher_f'];
        $teacher->title = $data['title_teacher_f'];
        $teacher->category = $data['category_teacher_f'];
        $teacher->photo = $data['photo_teacher_f'];
        $teacher->phones = $data['phones_teacher_f'];
        $teacher->mail = $data['mail_teacher_f'];

        DB::table('teacherinmos')->where('teacher_id', '=', (int)$data['id_teacher_f'])->delete();
        if(isset($data['mos_f'])){
            foreach ($data['mos_f'] as $mo){
                DB::table('teacherinmos')->insert(
                    ['teacher_id' => (int)$data['id_teacher_f'], 'mo_id' => $mo]
                );
            }
        }

        DB::table('teachings')->where('teacher_id', '=', (int)$data['id_teacher_f'])->delete();
        if(isset($data['subjects_f'])){
            foreach ($data['subjects_f'] as $subject){
                DB::table('teachings')->insert(
                    ['teacher_id' => (int)$data['id_teacher_f'], 'subject_id' => $subject]
                );
            }
        }

        $teacher->save();
        return "teacher info save success";
    }
}
