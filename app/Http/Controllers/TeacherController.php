<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Teacherspage;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index($page_id=null){
        $pages = Teacherspage::where('teacher_id',auth()->user()->teacher_id)->orderBy('order')->get()->keyBy('id');
        if($pages->count()>0 && $page_id==null) $page_id=$pages->first()->id;
        return view('profile',
            compact('pages','page_id'));
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

        $page = Teacherspage::find($data['id_f']);
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
       $teacher = Teacher::where('id',$teacher_id)->get();
        return json_encode($teacher[0]);
    }
}
