
@extends('layouts.app')

@section('title','Статистика олімпіад')

@section('content')
    <div class="page-wrapper">
    @include('home.header')
        <div id="dataT" style="margin-top: 65px; min-height: calc(100vh - 180px); line-height: normal">
            @include('home.statistics-olymp')
        </div>
    @include('home.footer')
@endsection
