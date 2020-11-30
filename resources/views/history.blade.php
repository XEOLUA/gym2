@extends('layouts.app')

@section('title','Історія гімназії №2')

@section('content')

    <div class="page-wrapper">
        @include('home.preloader')
        @include('home.topbar-one')
        @include('home.header')

   <div style="max-width:600px; margin:0 auto 0 auto">
       <div style="line-height: normal; margin-top: 30px; text-align: center;">
           <h1>Історія школи</h1>

           Управління освіти Хмельницької міської ради <br>
           Гімназія №2 м.Хмельницького <br>
           Функціонує з 2000 року як гімназія №2, <br>
           до цього – ЗОШ №11 з 1969 року  <br>
       </div>

<div style="max-width:600px; margin:0 auto 0 auto">
    @forelse($stories as $story)

        <table style="margin: 20px;">
            <tr>
                <th colspan="2" style="text-align: center; font-weight: bold; border: 1px solid silver; background: linear-gradient(#ebebeb, #fafafa); margin-top: 20px;">
                    {{$story->year}}
                </th>
            </tr>

            <tr style="border: 1px solid silver">
                @if($loop->index % 2==0)
                <td style="width: 40%; padding: 10px; background-color: #fcfcfc" valign="top">
                    @if($story->image)
                        <img src="{{url($story->image)}}" style="width: 100%">
                    @endif
                </td>
                <td style="width: 60%; padding: 5px;">
                    {!! $story->description !!}
                </td>
                @else
                <td style="width: 60%; padding: 5px;">
                    {!! $story->description !!}
                </td>
                <td style="width: 40%; padding: 10px; background-color: #fcfcfc" valign="top">
                    @if($story->image)
                        <img src="{{url($story->image)}}" style="width: 100%">
                    @endif
                </td>
                @endif
            </tr>
        </table>

    @empty 'No stories'
    @endforelse
</div>

   </div>
        @include('home.footer')
        @include('home.search-popup')
    </div><!-- /.page-wrapper -->

@endsection
