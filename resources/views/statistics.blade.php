
@extends('layouts.app')

@section('title','Статистика')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
        <div style="display:flex;flex-wrap:wrap;">
        <table style="line-height: 25px;border:1px solid silver;width:48%; margin-left: auto; margin-right: auto; margin-top: 20px;">
            <tr><th colspan="5" style="text-align: center; background: #7a8793;color: #ffffff">Учні</th></tr>
            <tr>
                <th>М</th>
                <th>ПІБ</th>
                <th>Олімпіади</th>
                <th>МАН</th>
                <th>Всього</th>
            </tr>
            @php
                $i=0; $prev=-1;
            @endphp
            @foreach($stat['pupil']['all'] as $pupil => $val)
                @php
                    if($val!=$prev) {$s="style='color:#81868a'"; $i++;}
                    else $s="style='color:silver'";
                @endphp
                <tr style="border-top:1px solid silver">
                    <td><span {{$s}}>{{$i}}.</span></td>
                    <td>{{$pupil}}</td>
                    <td style="font-style: italic">{{$stat['pupil']['o'][$pupil] ?? '0'}}</td>
                    <td style="font-style: italic">{{$stat['pupil']['m'][$pupil] ?? '0'}}</td>
                    <td style="font-weight: bold">{{$val}}</td>
                </tr>
                @php $prev=$val; @endphp
            @endforeach
        </table>
            <table style="line-height: 25px;border:1px solid silver;width:48%; margin-right: auto; margin-left: auto; margin-top: 20px;">
                <tr><th colspan="5" style="text-align: center; background: #7a8793;color: #ffffff">Вчителі</th></tr>
                <tr>
                    <th>М</th>
                    <th>ПІБ</th>
                    <th>Олімпіади</th>
                    <th>МАН</th>
                    <th>Всього</th>
                </tr>
                @php
                    $i=0; $prev=-1;
                @endphp
                @foreach($stat['teacher']['all'] as $teacher => $val)
                    @php
                        if($val!=$prev) {$s="style='color:#81868a'"; $i++;}
                        else $s="style='color:silver'";
                    @endphp
                    <tr style="border-top:1px solid silver">
                        <td><span {{$s}}>{{$i}}.</span></td>
                        <td>{{$teacher}}</td>
                        <td style="font-style: italic">{{$stat['teacher']['o'][$teacher] ?? '0'}}</td>
                        <td style="font-style: italic">{{$stat['teacher']['m'][$teacher] ?? '0'}}</td>
                        <td style="font-weight: bold">{{$val}}</td>
                    </tr>
                    @php $prev=$val; @endphp
                @endforeach
            </table>
    </div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
