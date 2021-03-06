
@extends('layouts.app')

@section('title','Вчительська сторінка')

@section('content')
{{--    @include('arm.editpupil')--}}
    <div class="page-wrapper">

    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
    @include('home.search-popup')
<div style="padding: 20px; text-align: left; line-height: normal; border-bottom: 1px solid silver; margin: 20px;">
    @foreach($pages as $page)
        <a
        @if(($cur_page && $page->id==$cur_page) || (!$cur_page && $page->id==$pages->first()->id))
        style="font-weight: bold"
        @endif
                href="{{url('teachers/page/'.$page->teacher_id.'/'.$page->id)}}"><i class="fas fa-caret-right"></i> {{$page->title}}</a> |
    @endforeach
        <a href="{{url('statistics/olymps/teachers/'.$teacherinfo->id)}}"><i class="fas fa-chart-line"></i> Олімпіади</a> |
        <a href="{{url('statistics/mans/teachers/'.$teacherinfo->id)}}"><i class="fas fa-chart-line"></i> МАН</a>
</div>
<div style="margin: 20px; line-height: normal">
    @if(isset($pages[$cur_page]->content))
        {!! $pages[$cur_page]->content !!}
    @else
        @if ($pages->first())
         {!! $pages->first()->content !!}
        @else
            <div style="text-align: center">Сторінка на стадії розробки</div>
        @endif
    @endif
{{-- {!! isset($pages[$cur_page]->content) ? $pages[$cur_page]->content : isset($pages->first()) ? $pages->first()->content : '' !!}--}}
</div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
