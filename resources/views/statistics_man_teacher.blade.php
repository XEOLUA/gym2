
@extends('layouts.app')

@section('title','Статистика МАН '.$teachers[Request::route()->parameter('teacher')]->snp)

@section('content')
    <div class="page-wrapper">
    @include('home.header')
        <div id="dataT" style="margin-top: 65px; min-height: calc(100vh - 180px); line-height: normal">
            @include('home.statistics-man-teacher')
        </div>
    @include('home.footer')
@endsection
