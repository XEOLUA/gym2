
@extends('layouts.app')

@section('title','Новина')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')


        <div style="max-width: 800px; text-align: left; margin-left: auto;
                    margin-right: auto;width: 100%;">
            <h2 style="padding: 20px 0 0">Новини гімназії №2</h2>
            <div
                style="
                    height: 230px;
                    overflow: hidden;
                    display: block;
                    padding-bottom: 30px;
                       ">
                <img
                style="
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    align-content: center;
                    border-radius: 10px;
                    width: 100%;
                    max-width: 800px;
                    height: 100%;
                    object-fit: cover;
                    "
                    src="{{url($news[0]->image ? \App\Services\ImgResize::ImgCopy($news[0]->image,800,404,[232,240,244]) : 'assets/images/blog-2-3.jpg')}}">
            </div>

        <div>
            {{Carbon\Carbon::parse($news[0]->updated_at)->format('M d, Y')}}<br>
            <h2>{{$news[0]->title}}</h2>
            <div style="padding: 20px 0 0">
                {!! $news[0]->description !!}
            </div>
        </div>
        </div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
