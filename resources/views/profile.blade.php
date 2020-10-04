
@extends('layouts.app')

@section('title','Профіль вчителя')

@section('content')
    @include('arm.profile.editpage')
    @include('arm.profile.deletepage')
    @include('arm.profile.teacherinfo')
    <div class="page-wrapper">
    @include('arm.profile.header')
        <div id="dataT" style="margin-top: 35px; min-height: calc(100vh - 105px); line-height: normal">
            @include('arm.profile.content')
        </div>
    @include('arm.profile.footer')
    </div>

@endsection
