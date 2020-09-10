
@extends('layouts.app')

@section('title','Index')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')

{{--        {{dd($newstypes)}}--}}
        @foreach($newstypes as $newstype)
            <div>
                {{$newstype->name}}
                @foreach($newstype->newses as $news)
                    <div>
                        {{$news->title}}
                    </div>
                @endforeach
            </div>
        @endforeach
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
