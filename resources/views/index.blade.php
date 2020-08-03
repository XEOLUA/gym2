
@extends('layouts.app')

@section('title','Index')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
    @include('home.banner-wrapper')
    @include('home.about-two')
    @include('home.course-one__top-title')
    @include('home.course-one')
    @include('home.video-two')
    @include('home.countdown-one')
    @include('home.thm-gray-bg')
    @include('home.cta-three')
    @include('home.brand-two')
    @include('home.blog-two')
    @include('home.cta-four')
    @include('home.mailchimp-one')
    @include('home.search-popup')
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
