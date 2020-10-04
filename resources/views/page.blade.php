
@extends('layouts.app')

@section('title','Сторінка')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
        <div style="padding: 20px; line-height: normal">
            {!! $pageContent[0]->text ?? 'Content is empty =(' !!}
        </div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
