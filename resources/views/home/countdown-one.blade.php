<section class="countdown-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="countdown-one__content">
                    <h2 class="countdown-one__title">Краща 10</h2><!-- /.countdown-one__title -->
                    <p class="countdown-one__tag-line">учнів за останні {{date('Y')-2003}} років</p>
                    <!-- /.countdown-one__tag-line -->
                    <div style="max-width: 400px">
                    <table style="line-height: 25px;border:1px solid silver; width: 100%">
                        <tr>
                            <th style="padding-left: 5px">М</th>
                            <th style="padding-left: 5px">ПІБ</th>
                            <th style="padding-left: 5px">Олімпіади</th>
                            <th style="padding-left: 5px">МАН</th>
                            <th style="padding-left: 5px">Всього</th>
                        </tr>
                    @php
                     $i=0; $prev=-1;
                    @endphp
                        @foreach($stat['all'] as $pupil => $val)
                            @php if($val!=$prev)$i++; @endphp
                            <tr style="border-top:1px solid silver">
                                <td style="padding-left: 5px">{{$i}}.</td>
                                <td style="padding-left: 5px">{{$pupil}}</td>
                                <td style="padding-left: 5px;font-style: italic"><a href="{{url('statistics/olymps/pupils/'.$pupil)}}">{{$stat['o'][$pupil] ?? '0'}}</a></td>
                                <td style="padding-left: 5px;font-style: italic"><a href="{{url('statistics/mans/pupils/'.$pupil)}}">{{$stat['m'][$pupil] ?? '0'}}</a></td>
                                <td style="padding-left: 5px;font-weight: bold">{{$val}}</td>
                            </tr>
                            @php if($i>=10) break; @endphp
                            @php $prev=$val; @endphp
                        @endforeach
                    </table>
                        <a style="width: 100%" href="{{url('statistics')}}" class="course-one__link">Переглянути всіх</a>
                    </div>
                        <!-- /.countdown-one__text -->
{{--                    <ul class="countdown-one__list list-unstyled">--}}
{{--                    </ul><!-- /.coundown-one__list -->--}}
                </div><!-- /.countdown-one__content -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="become-teacher__form">
                    <div class="become-teacher__form-top">
                        <h2 class="become-teacher__form-title">
                            Наші досягнення за останні {{date('Y')-2003}} років
                        </h2><!-- /.become-teacher__form-title -->
                    </div><!-- /.become-teacher__top -->
                    <div class="become-teacher__form-content">
                        <div style="font-weight: bold"><a href="{{route('statisticsolymp')}}">Олімпіади</a></div>
                        <div><a href="{{route('statisticsolymp',['level'=>4])}}"><span style="font-weight: bold; color:orange">{{count($olympstat[4])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($olympstat[4]))}} на IV етапі</div>
                        <div><a href="{{route('statisticsolymp',['level'=>3])}}"><span style="font-weight: bold; color:orange">{{count($olympstat[3])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($olympstat[3]))}} на III етапі</div>
                        <div><a href="{{route('statisticsolymp',['level'=>2])}}"><span style="font-weight: bold; color:orange">{{count($olympstat[2])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($olympstat[2]))}} на II етапі</div>
{{--                        <a href="{{url('page/olymp-statistics')}}" class="course-one__link">Дізнатися більше</a>--}}

                        <div style="font-weight: bold; margin-top: 30px;"><a href="{{route('statisticsman')}}">МАН</a></div>
                        <div><a href="{{route('statisticsman',['level'=>3])}}"><span style="font-weight: bold; color:orange">{{count($manstat[3])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($manstat[2]))}} на III етапі</div>
                        <div><a href="{{route('statisticsman',['level'=>2])}}"><span style="font-weight: bold; color:orange">{{count($manstat[2])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($manstat[2]))}} на II етапі</div>
                        <div><a href="{{route('statisticsman',['level'=>1])}}"><span style="font-weight: bold; color:orange">{{count($manstat[1])}}</span></a> - призер{{\App\Services\GetSuffixByNumber::get_suffix(count($manstat[1]))}} на I етапі</div>

                        {{--                        <input type="text" placeholder="Your Name" name="name">--}}
{{--                        <input type="text" placeholder="Email Address" name="email">--}}
{{--                        <input type="text" placeholder="Phone Number" name="phone">--}}
{{--                        <input type="text" placeholder="Comment" name="message">--}}
                        <a href="{{url('statistics/olymp')}}" class="course-one__link">Дізнатися більше</a>
                    </div><!-- /.become-teacher__form-content -->
                </div><!-- /.become-teacher__form -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.countdown-one -->
