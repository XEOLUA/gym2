
<header class="site-header site-header__header-one ">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="logo-box clearfix">
                <a class="navbar-brand" href="\">
                    <img src="{{url('images/logo.png')}}" class="main-logo" height="58" alt="Awesome Image" />
                </a>
                <div class="header__social">
{{--                    <a href="#"><i class="fab fa-twitter"></i></a>--}}
                    <a href="https://tinyurl.com/y6qslvqe" target="_blank"><i class="fab fa-facebook-square"></i></a>
{{--                    <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                    <a href="#"><i class="fab fa-instagram"></i></a>--}}
                </div><!-- /.header__social -->
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="kipso-icon-menu"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="main-navigation">
{{--                {{dd($MyNavBar)}}--}}
            {!! $MyNavBar->asUl(['class' => 'navigation-box'], ['class' => 'sub-menu']) !!}
            </div>
            <div class="right-side-box">
                <a class="header__search-btn search-popup__toggler" href="#"><i class="kipso-icon-magnifying-glass"></i>
                    <!-- /.kipso-icon-magnifying-glass --></a>
            </div><!-- /.right-side-box -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="site-header__decor">
        <div class="site-header__decor-row">
            <div class="site-header__decor-single">
                <div class="site-header__decor-inner-1"></div><!-- /.site-header__decor-inner -->
            </div><!-- /.site-header__decor-single -->
            <div class="site-header__decor-single">
                <div class="site-header__decor-inner-2"></div><!-- /.site-header__decor-inner -->
            </div><!-- /.site-header__decor-single -->
            <div class="site-header__decor-single">
                <div class="site-header__decor-inner-3"></div><!-- /.site-header__decor-inner -->
            </div><!-- /.site-header__decor-single -->
        </div><!-- /.site-header__decor-row -->
    </div><!-- /.site-header__decor -->
</header><!-- /.site-header -->
