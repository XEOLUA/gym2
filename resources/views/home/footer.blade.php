{{--{!! $menu1->asUl() !!}--}}
<footer class="site-footer">
    <div class="site-footer__upper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-12">
                    <div class="footer-widget footer-widget__contact" style="color:#ffffff">
                        <h2 class="footer-widget__title">{{$footer_block_0->item('m6')->title}}</h2>
                        <div class="footer-widget__link-wrap">
                            <ul class="list-unstyled footer-widget__link-list">
                                @include('custom-menu-items', ['items' => Menu::get('footer_block_0')->item('m6')->children()])
                            </ul>
                        </div>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12">
                    <div class="footer-widget footer-widget__contact" style="color:#ffffff">
                        <h2 class="footer-widget__title">{{$footer_block_1->item('m33')->title}}</h2>
                        <div class="footer-widget__link-wrap">
                        <ul class="list-unstyled footer-widget__link-list">
                            @include('custom-menu-items', ['items' => Menu::get('footer_block_1')->item('m33')->children()])
                        </ul>
                        </div>
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12">
                    <div class="footer-widget footer-widget__link">
                        <h2 class="footer-widget__title">{{$footer_block_2->item('m43')->title}}</h2><!-- /.footer-widget__title -->
                        <div class="footer-widget__link-wrap">
                            <ul class="list-unstyled footer-widget__link-list">
                                @include('custom-menu-items', ['items' => Menu::get('footer_block_2')->item('m43')->children()])
                            </ul><!-- /.footer-widget__link-list -->
                        </div><!-- /.footer-widget__link-wrap -->
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
                <div class="col-xl-3 col-lg-6 col-sm-12">
                    <div class="footer-widget footer-widget__about">
                        <h2 class="footer-widget__title">Про нас</h2><!-- /.footer-widget__title -->
                        <p class="footer-widget__text">Моя гімназія - моя гордість і честь</p><!-- /.footer-widget__text -->
{{--                        <div class="footer-widget__btn-block">--}}
{{--                            <a href="#" class="thm-btn">Contact</a><!-- /.thm-btn -->--}}
{{--                            <a href="#" class="thm-btn">Purchase</a><!-- /.thm-btn -->--}}
{{--                        </div><!-- /.footer-widget__btn-block -->--}}
                    </div><!-- /.footer-widget -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__upper -->
    <div class="site-footer__bottom">
        <div class="container">
            <p class="site-footer__copy">&copy; Copyright 2020 by <a href="http://xeol.com.ua">XEOL</a></p>
            <div class="site-footer__social">
                <a href="#" data-target="html" class="scroll-to-target site-footer__scroll-top"><i class="kipso-icon-top-arrow"></i></a>
{{--                <a href="#"><i class="fab fa-twitter"></i></a>--}}
                <a href="https://tinyurl.com/y6qslvqe" target="_blank"><i class="fab fa-facebook-square"></i></a>
{{--                <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                <a href="#"><i class="fab fa-instagram"></i></a>--}}
            </div><!-- /.site-footer__social -->
            <!-- /.site-footer__copy -->
        </div><!-- /.container -->
    </div><!-- /.site-footer__bottom -->
</footer><!-- /.site-footer -->
