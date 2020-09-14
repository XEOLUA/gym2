
@extends('layouts.app')

@section('title','Педагогічний колектив')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
    <h3 style="text-align: center; margin-top: 30px">Педагогічний колектив</h3>
    <div style="display:flex;flex-wrap:wrap;justify-content: center;margin:20px 20px 20px 0px;">

    @foreach($teachers as $teacher)
        <div onclick="location='{{url('teachers/page/'.$teacher->id)}}'">
            <img style="margin:2px; cursor:pointer"
                 title="{{$teacher->snp}}&#013{{$positions[$teacher->position]}}{{$teacher->sex=='ж'?($positions[$teacher->position]=='вчитель' || $positions[$teacher->position]=='секретар')?'ка':'':''}}@foreach($teacher->subjects as $subject)&#013{{$subject->name}}@endforeach
                         "
                 src=@if($teacher->photo)"{{$teacher->photo}}" @else @if($teacher->sex=='ж')'http://gym2.km.ua/images/w.gif' @else 'http://gym2.km.ua/images/m.gif' @endif @endif"
                 height="90">
        </div>
    @endforeach
    </div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
