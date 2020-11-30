
@extends('layouts.app')

@section('title','Рейтинг олімпіад та МАН')

@section('content')

    <div class="page-wrapper">
    @include('home.preloader')
    @include('home.topbar-one')
    @include('home.header')
        @include('home.search-popup')

        <div style="max-width: 300px; margin: 20px auto 0 auto;">
            <table style="width: 100%; text-align: center" cellspacing="0" cellpadding="0">
                <tr>
                    <th rowspan="3" style="border:1px solid silver;" valign="bottom">етап</th>
                    <th colspan="3" style="border:1px solid silver;">місце</th>
                </tr>
                <tr>
                    <th style="border:1px solid silver;background-color: gold;color:#ffffff;">1</th>
                    <th style="border:1px solid silver;background-color: silver;color:#ffffff;">2</th>
                    <th style="border:1px solid silver;background-color: #cd7f32;color:#ffffff;">3</th>
                </tr>
                <tr>
                    <th colspan="3" style="border:1px solid silver;">бали</th>
                </tr>
                <tr>
                    <th style="border:1px solid silver;background-color: #4dc0b5;color:#ffffff;">Міський</th>
                    <th style="border:1px solid silver;background-color:#3cb9a4; color:#ffffff;">3</th>
                    <th style="border:1px solid silver;background-color:#4daab5; color:#ffffff;">2</th>
                    <th style="border:1px solid silver;background-color:#4d99b5;color:#ffffff;">1</th>
                </tr>
                <tr>
                    <th style="border:1px solid silver;background-color: #2a9055;color:#ffffff;">Обласний</th>
                    <th style="border:1px solid silver;background-color: #3bA166;color:#ffffff;">12</th>
                    <th style="border:1px solid silver;background-color: #198044;color:#ffffff;">8</th>
                    <th style="border:1px solid silver;background-color: #087033;color:#ffffff;">5</th>
                </tr>
                <tr>
                    <th style="border:1px solid silver;background-color: #8a6d3b;color:#ffffff;">Всеукраїнський</th>
                    <th style="border:1px solid silver;background-color: #9b7e4c;color:#ffffff;">30</th>
                    <th style="border:1px solid silver;background-color: #795c2a;color:#ffffff;">20</th>
                    <th style="border:1px solid silver;background-color: #684b19;color:#ffffff;">16</th>
                </tr>
                <tr>
                    <th style="border:1px solid silver;background-color: #904201;color:#ffffff;">Міжнародиний</th>
                    <th style="border:1px solid silver;background-color: #b26423;color:#ffffff;">60</th>
                    <th style="border:1px solid silver;background-color: #a15312;color:#ffffff;">50</th>
                    <th style="border:1px solid silver;background-color: #803100;color:#ffffff;">40</th>

                </tr>
            </table>
        </div>



        <div style="display:flex;flex-wrap:wrap;">
        <table style="
        -webkit-flex: 1 1 15em;
        -moz-flex: 1 1 15em;
        flex: 1 1 15em;
        margin: 0 -1px; line-height: 25px;border:1px solid silver;
        width:48%; margin-left: 10px; margin-right: 10px; margin-top: 20px; margin-bottom: 10px;">
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
                    if($val!=$prev) {$s="color:#2da397;font-weight: bold"; $i++;}
                    else $s="color:silver;font-weight: normal;";
                @endphp
                <tr style="border-top:1px solid silver">
                    <td><span style="{{$s}}">{{$i}}.</span></td>
                    <td>{{$pupil}}</td>
                    <td style="font-style: italic"><a href="{{url('statistics/olymps/pupils/'.$pupil)}}">{{$stat['pupil']['o'][$pupil] ?? '-'}}</a></td>
                    <td style="font-style: italic"><a href="{{url('statistics/mans/pupils/'.$pupil)}}">{{$stat['pupil']['m'][$pupil] ?? '-'}}</a></td>
                    <td style="font-weight: bold">{{$val}}</td>
                </tr>
                @php $prev=$val; @endphp
            @endforeach
        </table>
            <table style="
            -webkit-flex: 1 1 15em;
            -moz-flex: 1 1 15em;
            flex: 1 1 15em;
            margin: 0 -1px; line-height: 25px;border:1px solid silver;width:48%;
            margin-right: 10px; margin-left: 10px; margin-top: 20px;">
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
                        if($val!=$prev) {$s="color:#2da397;font-weight: bold"; $i++;}
                        else $s="color:silver;font-weight: normal;";
                    @endphp
                    <tr style="border-top:1px solid silver">
                        <td><span style="{{$s}}">{{$i}}.</span></td>
                        <td>{{$teacher}}</td>
                        <td style="font-style: italic">
                            @if(isset($stat['teacher']['o'][$teacher]))<a href="{{url('statistics/olymps/teachers/'.($stat['teacher']['id'][$teacher] ?? ''))}}">{{$stat['teacher']['o'][$teacher] ?? '0'}}</a>
                            @else -
                            @endif
                        </td>
                        <td style="font-style: italic">
                            @if(isset($stat['teacher']['m'][$teacher]))<a href="{{url('statistics/mans/teachers/'.($stat['teacher']['id'][$teacher] ?? ''))}}">{{$stat['teacher']['m'][$teacher] ?? '0'}}</a>
                            @else -
                            @endif</td>
                        <td style="font-weight: bold">{{$val}}</td>
                    </tr>
                    @php $prev=$val; @endphp
                @endforeach
            </table>
    </div>
    @include('home.footer')

    </div><!-- /.page-wrapper -->

@endsection
