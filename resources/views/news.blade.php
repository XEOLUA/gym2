
@extends('layouts.app')

@section('title','Index')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')

    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
