@extends('layouts.app')

@section('title','Розклад дзвінків')

@section('content')

    <div class="page-wrapper">
        @include('home.preloader')
        @include('home.topbar-one')
        @include('home.header')

        <div style="padding: 20px; line-height: normal">
            <h1 align="center">Розклад дзвінків</h1>
            <table align="center" cellpadding="5" cellspacing="0" border="1" style="border-collapse: collapse; max-width: 300px;" width="100%">
                <tr>
                    <th>Урок</th>
                    <th>Початок</th>
                    <th>Кінець</th>
                </tr>
                @forelse($bells as $bell)
                    <tr id="lesson_{{$bell->number}}">
                        <td>{{$bell->number}}</td>
                        <td>{{\Carbon\Carbon::parse($bell->begin)->format('H:i')}}</td>
                        <td>{{\Carbon\Carbon::parse($bell->end)->format('H:i')}}</td>
                    </tr>
                    @if(\Carbon\Carbon::now()->timestamp>=\Carbon\Carbon::parse($bell->begin)->timestamp &&
\Carbon\Carbon::now()->timestamp<\Carbon\Carbon::parse($bell->end)->timestamp)
                        <script>
                            document.getElementById('lesson_{{$bell->number}}').style.backgroundColor="yellow";
                            document.getElementById('lesson_{{$bell->number}}').style.fontWeight="bold";
                            document.getElementById('lesson_{{$bell->number}}').style.color="blue";
                        </script>
                    @endif
                @empty "розклад не введено";
                @endforelse
            </table>
        </div>
        @include('home.footer')
        @include('home.search-popup')
    </div><!-- /.page-wrapper -->

@endsection
