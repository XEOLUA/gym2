
@extends('layouts.app')

@section('title','Навчальні класи')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
    @include('home.search-popup')

        <div style="max-width:90%; margin: 30px; text-align: center;">
            <h4 style="text-align: center;line-height: normal;  margin: 30px 0 0 0;">Навчальних класів: {{$classes->count()}}</h4>
            <h5 style="text-align:  center;">Учнів: {{$all_pupils}}</h5>
<div style="display: flex; flex-wrap: wrap; justify-content: center">
    @php
     $color = [
    5=>'#2da397',
    6=>'#72e55a',
    7=>'#e55ad7',
    8=>'#f16101',
    9=>'#e5d15a',
    10=>'#5aa1e5',
    11=>'#7c4bc0'
            ];
    @endphp
            @foreach($classes as $class)
                @php
                        $a = explode("(",$class->name);
                        $b = explode(")",$a[1]);
                        $teacher = explode(" ",$class->teachers->snp);
                @endphp
                <div
                        onclick="location='{{url('classes/'.$class->id)}}'"
                        style=" cursor: pointer;
                                position: relative;
                        font-weight: bold;
                        background-color: {{$color[$b[0]]}};
                width:150px;
                border-radius: 5px; margin:3px; padding:3px;
                        color:#ffffff">
                    <div style="margin: 0; padding: 0; height:43px">
                        <span style="position: absolute; left:3px; top:3px">
                           <img src="{{url($class->teachers->photo ?? 'http://gym2.km.ua/images/w.gif')}}"
                                style="height: 40px; border-radius: 3px">
                        </span>
                        <span>{{$class->name}}</span>
                        <span style="font-size:11px; margin:0; padding:2px; border-radius:3px; line-height: normal; position: absolute; left: 123px; top: 3px;"><i class="fas fa-female"></i> {{$cl[$class->id]['f']}}</span>
                        <span style="font-size:11px;margin:0; padding:2px; border-radius:3px;  line-height: normal;  position: absolute; left: 123px; top: 21px;"><i class="fas fa-male"></i> {{$cl[$class->id]['m']}}</span>
                        <span style="position: absolute; right: 5px; top: 40px;">{{$class->pupils->count()}}</span>
                    </div>

                    <div style="font-size: 12px;
                    margin: 0;
                    padding:3px;
                    height: 20px;
                    line-height: normal;
                    border-top: 1px solid silver;
                    text-align: left;
                    ">
                        {{$teacher[0].' '.mb_substr($teacher[1],0,1).'.'.mb_substr($teacher[2],0,1).'.'}}
                    </div>
                </div>
            @endforeach

        </div>
    </div>



    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
