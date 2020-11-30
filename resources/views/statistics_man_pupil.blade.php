
@extends('layouts.app')

@section('title','Статистика МАН '.Request::route()->parameter('pupil'))

@section('content')
    <div class="page-wrapper">
    @include('home.header')
        @include('home.search-popup')
        <div id="dataT" style="margin-top: 65px; min-height: calc(100vh - 180px); line-height: normal">
            @include('home.statistics-man-pupil')
        </div>
    @include('home.footer')
@endsection
