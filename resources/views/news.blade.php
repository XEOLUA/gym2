
@extends('layouts.app')

@section('title','Новини')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')

<div style="padding: 20px; text-align: center; line-height: normal">
    <h2>Новини гімназії №2</h2>
           <div style="display:flex;flex-wrap:wrap;
           justify-content: center;
           " id="newses-list">
            @foreach($news as $new)
               <a href="{{url('new/'.$new->id)}}">
                <div style="margin: 0px 0px 50px 0px">
                    <img
                            style="
                    display: block;
                    border-radius: 10px;
                    width: 300px;
                    height: 100%;
                    object-fit: cover;
                    "
                    src="{{url($new->image ? \App\Services\ImgResize::ImgCopy($new->image,500,285,[232,240,244]) : 'assets/images/blog-2-3.jpg')}}" alt="">
                    <object type="ha-ha">
                        <a href="{{url('newstype/'.$new->newstypes->slug)}}">
                    <div style=" text-align: left;margin: 10px 0px 10px 0px">
                       Рубрика: "<span style="text-transform: uppercase;">{{$new->newstypes->name}}</span>"
                    </div>
                        </a>
                    </object>
                    <div style="text-align: left;">{{Carbon\Carbon::parse($new->updated_at)->format('M d, Y')}}</div>
                    <p style="width: 320px;text-align: left; padding-right: 20px;">
                        {{$new->title}}
                    </p>
                </div>
               </a>
            @endforeach
            </div>
    <a class="course-one__link" id="btnShowMoreNewses" style="cursor:pointer">Переглянути більше</a>
</div>
    @include('home.search-popup')
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
