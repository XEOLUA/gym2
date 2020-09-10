
@extends('layouts.app')

@section('title','Index')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
<div>
    @foreach($mo[0]->teachers as $teacher)
      <div>{{$teacher->snp}}</div>
    @endforeach
</div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
