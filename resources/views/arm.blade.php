
@extends('layouts.app')

@section('title','АРМ')

@section('content')
@include('arm.editpupil')
    <div class="page-wrapper">
    @include('arm.header')
        <div id="dataT" style="margin-top: 65px; min-height: calc(100vh - 180px); line-height: normal">
            @include('arm.list')
        </div>
    @include('arm.footer')


@endsection
