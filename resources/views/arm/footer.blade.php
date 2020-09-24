{{--{!! $menu1->asUl() !!}--}}
<footer class="site-footer">
    <div class="site-footer__upper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-12">

                            {{--        фільтр по класах--}}
                            <select name="classeslist" id="classeslist">
                                <option value="">Клас</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->name}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                            <input id="filter" name="filter" type="text" value="">


                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12">

                        {{--        фільтр по статі--}}
                        <select name="sex" id="sex">
                            <option value="">Стать</option>
                            <option value="жіноча">Жіноча</option>
                            <option value="чоловіча">Чоловіча</option>
                        </select>
                        <input id="filter_sex" name="filter_sex" type="text" value="">

                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12">
                    <div>
                        <select name="dt" id="dt">
                            <option value="">Рік</option>
                            @foreach($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{--        фільтр по ДН--}}

                    <input id="filter_year" name="filter_year" type="text" value="">
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12"><button id="rebuild" style="height: 40px; margin: 0; border-radius: 5px">Застосувати</button>
                    <div id="countPupilsOnPage" name="countPupilsOnPage">15</div>
                    <div><input type=range value=15  min="5" max="200"
                                oninput="document.getElementById('countPupilsOnPage').innerText=this.value"></div>


                    <span id="timeLoad"></span>
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__upper -->
    <div class="site-footer__bottom">
        <div class="container">
            <p class="site-footer__copy">&copy; Copyright 2020 by <a href="http://xeol.com.ua">XEOL</a></p>
            <div class="site-footer__social">
                <a href="#" data-target="html" class="scroll-to-target site-footer__scroll-top"><i class="kipso-icon-top-arrow"></i></a>
            </div><!-- /.site-footer__social -->
            <!-- /.site-footer__copy -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
</footer><!-- /.site-footer -->
