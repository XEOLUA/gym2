<?php

namespace App\Http\Controllers;

use App\Classe;
use App\Pupil;
use App\Socialgroup;
use App\Teacher;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PupilController extends Controller
{
    public function pupilslist(){

        $pupils=[];

        if(Auth::check()){
            $pupils = Pupil::with('classes','socialgroups')
                ->where('archive',0)
                ->orderBy('snp');

            $classes = Classe::all();

            if(Auth::user()->role == 2){
                $class = $classes->where('teacher_id',Auth::user()->teacher_id);;
                $class_id = 0;
                if($class->isNotEmpty())
                 $class_id=$class->first()->id;
                $pupils = $pupils->where('class_id',$class_id);
            }
            $allRecords = $pupils->count();

            $pupils = $pupils->paginate(15);
        } else return route('login');
        $page = 1;
        $pagincnt = 15;

        $teachers = Teacher::pluck('snp','id');

        $years = Pupil::all()->map(function ($item, $key) {
            return \Carbon\Carbon::parse($item->dt)->format('Y');
        })->unique()->toArray();

        sort($years);

        $ar_col=[
            'id'=>true,
            'alpha'=>true,
            'snp'=>true,
            'class'=>true,
            'sex'=>false,
            'dt'=>false,
            'contact'=>false,
            'teacher'=>false,
            'address'=>false,
            'social_group'=>false,
        ];

        $fild_sort='snp';
        $dir_sort='ASC';
        $socialgroups = Socialgroup::all();

        return view('arm',compact('pupils','page','pagincnt','classes',
            'allRecords','teachers','ar_col','years','fild_sort','dir_sort','socialgroups'));

//        return Auth::user()->role;

    }

    public function pupillistaj(Request $request){
        if($request->ajax()){

            $page = 1;
            $pagincnt = 15;
            $allRecords = 0;

            if($request->has('page')) $page=$request->page;
            if($request->has('countpupilsonpage')) $pagincnt=1*$request->countpupilsonpage;
            if($request->has('classeslist'))
            {
                $filter=explode(",",request()->classeslist);
                $classes = Classe::whereIn('name',$filter)->get()->pluck('id','id');
            }

            $sexes=[];
            if($request->has('sex') && request()->sex)
            {
                $sexes=explode(",",request()->sex);
                foreach ($sexes as $key => $sex){
                    if($sex=='жіноча') $sexes[$key]=2;
                    if($sex=='чоловіча') $sexes[$key]=1;
                }
            }

            $years=[];
            if($request->has('dt') && request()->dt)
            {
                $years=explode(",",request()->dt);
            }


            $snp='';
            if($request->has('snp') && request()->snp)
            {
                $snp = request()->snp;
            }

            if($request->has('arcol') && request()->arcol)
            {
                $ar_col = json_decode(request()->arcol,1);
            }


            if(Auth::check()){

                $fild_sort = 'snp';
                $dir_sort='ASC';

                $pupils = Pupil::with('classes')
                    ->where('archive',0);

                if($request->has('sort') && request()->sort){
                    if($request->has('sortdir')) $dir_sort=$request->sortdir;
                    if(request()->sortdir=='ASC')
                    $pupils = $pupils->orderBy(request()->sort);
                     else $pupils = $pupils->orderByDESC(request()->sort);
                    $fild_sort = $request->sort;
                }else
                {
                    if(request()->sortdir=='ASC')
                        $pupils = $pupils->orderBy('snp');
                    else $pupils = $pupils->orderByDESC('snp');
                }

                if($classes->count()){
                    $pupils = $pupils->whereIn('class_id',$classes);
                }

                if(count($sexes)){
                    $pupils = $pupils->whereIn('sex',$sexes);
                }

                if($snp!=''){
                    $pupils = $pupils->where('snp', 'like', '%'.$snp.'%');
                }

                if(count($years)){
                    $pupils = $pupils->whereIn(DB::raw('YEAR(dt)'),$years);
                }

                if(Auth::user()->role == 2){
                    $class_id = Classe::where('teacher_id',Auth::user()->teacher_id)->get()[0]->id;
                    $pupils = $pupils->where('class_id',$class_id);
                }
                $allRecords = $pupils->count();
                $pupils = $pupils->paginate($pagincnt);
            } else return route('login');

            $teachers = Teacher::pluck('snp','id');

            return view('arm.list',
                compact('pupils','page','pagincnt','allRecords','teachers','ar_col','fild_sort','dir_sort'));
        }
    }

    public function editpupil($id){
        $pupiledit = Pupil::with('classes','pupilinsocialgroup')->where('id',$id)->get();
        return json_encode($pupiledit[0]);
    }

    public function savepupil(Request $request){
        $data = $request->all();
        $pupil = Pupil::find($data['id_f']);
        $pupil->snp = $data['snp_f'];
        $pupil->alpha = $data['alpha_f'];
        $pupil->class_id = $data['classes_f'];
        $pupil->dt = $data['dt_f'];
        $pupil->sex = $data['sex_f'];
        $pupil->contacts = $data['contacts_f'];
        $pupil->parents = $data['parents_f'];

        $soc_gr = Socialgroup::all()->pluck('name','id');

        DB::table('pupilinsocialgroups')->where('pupil_id', '=', (int)$data['id_f'])->delete();

        if(isset($data['socialgroup_f'])){
            $concat_group='';
            foreach ($data['socialgroup_f'] as $sg){
               if($concat_group=='') $concat_group=$soc_gr[$sg];
                   else $concat_group.=', '.$soc_gr[$sg];
                DB::table('pupilinsocialgroups')->insert(
                    ['pupil_id' => (int)$data['id_f'], 'socialgroup_id' => $sg]
                );
            }
            $pupil->social_group = $concat_group;
        }


        $pupil->save();
        return "success";
    }

}
