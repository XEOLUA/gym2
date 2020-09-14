
@extends('layouts.app')

@section('title','Методичні об\'єднання вчителів')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
<div>
    <h4 style="text-align: center; padding: 20px 0 0 0; font-weight: bold">{{$mo[0]->name}}</h4>
    @foreach($mo[0]->teachers as $teacher)
      <div style="display:flex;flex-wrap:wrap;  margin:20px 20px 40px 20px; border-bottom: 1px solid silver">
          <div>
              <img
                src=@if($teacher->photo)"{{$teacher->photo}}" @else @if($teacher->sex=='ж')'http://gym2.km.ua/images/w.gif' @else 'http://gym2.km.ua/images/m.gif' @endif @endif"
                 style='width:120px; margin-right:10px'  alt="">
          </div>
          <div>
              <div style="font-weight: bold; padding-bottom: 10px">{{$teacher->snp}}</div>
              <div style="line-height: normal">Посада: <span style="color:#088379; font-style: italic">{{$positions[$teacher->position]}}</span><br>
                    Предмет{{$teachers[$teacher->id]->subjects->count()>1 ?'и':''}} викладання:
                  <span style="color: #088379; font-style: italic">
                  @foreach($teachers[$teacher->id]->subjects as $subject)
                      {{$subject->name}}@if(!$loop->last), @endif
                  @endforeach
                  </span><br>
                  Категорія: <span style="color: #088379; font-style: italic">{{$teacher->category}}</span><br>
                  Звання: <span style="color: #088379; font-style: italic">{{$teacher->title}}</span>
                  <div style="color: #088379; font-style: italic; padding: 10px; font-weight: bold;">
                      <a href="{{url('teachers/page/'.$teacher->id)}}">На сторінку вчителя</a></div>
              </div>
          </div>
      </div>
    @endforeach
</div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
