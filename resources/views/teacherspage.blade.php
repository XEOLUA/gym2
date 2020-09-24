
@extends('layouts.app')

@section('title','Вчительська сторінка')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')

<div style="padding: 20px; text-align: left; line-height: normal; border-bottom: 1px solid silver; margin: 20px;">
    @foreach($pages as $page)
        <a
        @if(($cur_page && $page->id==$cur_page) || (!$cur_page && $page->id==$pages->first()->id))
        style="font-weight: bold"
        @endif
                href="{{url('teachers/page/'.$page->teacher_id.'/'.$page->id)}}">{{$page->title}}</a> |
    @endforeach
</div>
<div style="margin: 20px">
    @if(isset($pages[$cur_page]->content))
        {!! $pages[$cur_page]->content !!}
    @else
        @if ($pages->first())
         {!! $pages->first()->content !!}
        @else
            <div style="text-align: center">Сторінка на стадії розроики</div>
        @endif
    @endif
{{-- {!! isset($pages[$cur_page]->content) ? $pages[$cur_page]->content : isset($pages->first()) ? $pages->first()->content : '' !!}--}}
</div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
