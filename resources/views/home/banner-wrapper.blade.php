<div class="banner-wrapper">
    <section class="banner-one banner-carousel__one no-dots owl-theme owl-carousel">

       @foreach($sliders as $slider)
            <div class="banner-one__slide banner-one__slide-one">
                <div class="container">
                    <div class="banner-one__bubble-1"></div><!-- /.banner-one__bubble- -->
                    <div class="banner-one__bubble-2"></div><!-- /.banner-one__bubble- -->
                    <div class="banner-one__bubble-3"></div><!-- /.banner-one__bubble- -->
                    <img src="assets/images/slider-1-scratch.png" alt="" class="banner-one__scratch">
                    <img src="{{url($slider->image)}}" class="banner-one__person" alt="">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <h3 class="banner-one__title banner-one__light-color">
                                {!! $slider->title ?? 'У нас<br>вчаться' !!}
                                </h3><!-- /.banner-one__title -->
                            <p class="banner-one__tag-line">а ви готові?</p><!-- /.banner-one__tag-line -->
                            <a href="{{url('page/important_news')}}" class="thm-btn banner-one__btn">Дізнатися більше</a>
                        </div><!-- /.col-xl-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.banner-one__slide -->
        @endforeach

    </section><!-- /.banner-one -->
    <div class="banner-carousel-btn">
        <a href="#" class="banner-carousel-btn__left-btn"><i class="kipso-icon-left-arrow"></i></a>
        <a href="#" class="banner-carousel-btn__right-btn"><i class="kipso-icon-right-arrow"></i></a>
    </div><!-- /.banner-carousel-btn -->
    <div class="banner-one__cta">
        <div class="banner-one__cta-icon">
            <i class="kipso-icon-black-graduation-cap-tool-of-university-student-for-head"></i>
            <!-- /.kipso-icon-knowledge -->
        </div><!-- /.banner-one__cta-icon -->
        <div class="banner-one__cta-title">
            <h3 class="banner-one__cta-text"><a href="{{url('page/olymp-stars')}}">Взнайте як ми стимулюємо наших учнів</a></h3><!-- /.banner-one__cta-text -->
        </div><!-- /.banner-one__cta-title -->
        <div class="banner-one__cta-link">
            <a href="{{url('page/olymp-stars')}}"><i class="kipso-icon-right-arrow"></i><!-- /.kipso-icon-right-arrow --></a>
        </div><!-- /.banner-one__cta-link -->
    </div><!-- /.banner-one__cta -->
</div><!-- /.banner-wrapper -->

