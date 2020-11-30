
@extends('layouts.app')

@section('title','Результати пошуку')

@section('content')
    <div class="page-wrapper">
    @include('home.search-popup')
    @include('home.header')
        <div id="ressearch" style="margin-top: 35px; min-height: calc(100vh - 105px); line-height: normal">
            @include('search.results')
        </div>
    @include('home.footer')
    </div>

@endsection
