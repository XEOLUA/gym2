<section class="thm-gray-bg course-category-one">
    <div class="container-fluid text-center">
        <div class="block-title text-center">
            <h2 class="block-title__title">Методичні об'єднання<br>
                вчителів гімназії </h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="course-category-one__carousel owl-carousel owl-theme">
            @foreach($mos as $mo)
            <div class="item">
                <div class="course-category-one__single color-1">
                    <img src="{{$mo->image}}" height="120">
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-desktop"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
                    <h3 class="course-category-one__title"
                    style="min-height:50px; font-size:16px"
                    ><a href="{{url('mos/'.$mo->link)}}">{{$mo->name}}</a></h3>
                    <div>
                        <span>Предметів:</span>
                        <span style="font-weight: bold;color: orange"
                              data-toggle="tooltip"
                              data-html="true"
                              title="@foreach($mo->subjects as $subject){!! $subject->name !!}<br>@endforeach">{{$mo->subjects->count()}}</span>
                        </div>
                    <div>
                        <span>Вчителів:</span>
                        <span style="font-weight: bold;color: orange"
                              data-toggle="tooltip"
                              data-html="true"
                              title="@foreach($mo->teachers as $teacher)<nobr><img style='margin:2px' width=20 src='{{url($teacher->photo ?? 'http://gym2.km.ua/images/w.gif')}}'>{{explode(" ",$teacher->snp)[1].' '.explode(" ",$teacher->snp)[0]}}</nobr><br>@endforeach">{{$mo->teachers->count()}}</span>
                    </div>
                    <!-- /.course-category-one__title -->
                </div><!-- /.course-category-one__single -->
            </div><!-- /.item -->
            @endforeach
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-2">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-web-programming"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Development</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-3">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-music-player"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Music</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-4">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-camera"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Photography</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-5">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-targeting"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Marketing</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-6">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-health"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Health & Fitness</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-1">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-desktop"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">IT & Software</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-2">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-web-programming"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Development</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-3">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-music-player"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Music</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="course-category-one__single color-4">--}}
{{--                    <div class="course-category-one__icon">--}}
{{--                        <i class="kipso-icon-camera"></i><!-- /.kipso-icon-camera -->--}}
{{--                    </div><!-- /.course-category-one__icon -->--}}
{{--                    <h3 class="course-category-one__title"><a href="#">Photography</a></h3>--}}
{{--                    <!-- /.course-category-one__title -->--}}
{{--                </div><!-- /.course-category-one__single -->--}}
{{--            </div><!-- /.item -->--}}
        </div><!-- /.course-category-one__carousel owl-carousel owl-theme -->

        <a href="/teachers/all" class="thm-btn">Переглянути всіх</a><!-- /.thm-btn -->
    </div><!-- /.container-fluid -->
</section><!-- /.thm-gray-bg course-category-one -->
