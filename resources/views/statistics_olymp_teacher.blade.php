
@extends('layouts.app')

@section('title','Статистика олімпіад '.$teachers[Request::route()->parameter('teacher')]->snp)

@section('content')
    <div class="page-wrapper">
    @include('home.header')
        @include('home.search-popup')
        <div id="dataT" style="margin-top: 65px; min-height: calc(100vh - 180px); line-height: normal">
            @include('home.statistics-olymp-teacher')
        </div>
    @include('home.footer')
@endsection
