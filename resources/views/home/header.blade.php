
<header class="site-header site-header__header-one ">
    <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
        <div class="container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="logo-box clearfix">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" class="main-logo" height="58" alt="Awesome Image" />
                </a>
                <div class="header__social">
{{--                    <a href="#"><i class="fab fa-twitter"></i></a>--}}
                    <a href="#"><i class="fab fa-facebook-square"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div><!-- /.header__social -->
                <button class="menu-toggler" data-target=".main-navigation">
                    <span class="kipso-icon-menu"></span>
                </button>
            </div><!-- /.logo-box -->
            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="main-navigation">
            {!! $MyNavBar->asUl(['class' => 'navigation-box'], ['class' => 'sub-menu']) !!}
            </div>
{{--            <div class="main-navigation">--}}
{{--                <ul class=" navigation-box">--}}
{{--                    <li class="current">--}}
{{--                        <a href="index.html">Home</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="index.html">Home 01</a></li>--}}
{{--                            <li><a href="index-2.html">Home 02</a></li>--}}
{{--                            <li><a href="index-3.html">Home 03</a></li>--}}
{{--                            <li><a href="#">Header Versions</a>--}}
{{--                                <ul class="sub-menu">--}}
{{--                                    <li><a href="index.html">Header 01</a></li>--}}
{{--                                    <li><a href="index-2.html">Header 02</a></li>--}}
{{--                                    <li><a href="index-3.html">Header 03</a></li>--}}
{{--                                </ul><!-- /.sub-menu -->--}}
{{--                            </li>--}}
{{--                        </ul><!-- /.sub-menu -->--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="#">Pages</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="about.html">About Page</a></li>--}}
{{--                            <li><a href="gallery.html">Gallery</a></li>--}}
{{--                            <li><a href="pricing.html">Pricing Plans</a></li>--}}
{{--                            <li><a href="faq.html">FAQ'S</a></li>--}}
{{--                        </ul><!-- /.sub-menu -->--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="courses.html">Courses</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="courses.html">Courses</a></li>--}}
{{--                            <li><a href="course-details.html">Course Details</a></li>--}}
{{--                        </ul><!-- /.sub-menu -->--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="teachers.html">Teachers</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="teachers.html">Teachers</a></li>--}}
{{--                            <li><a href="team-details.html">Teachers Details</a></li>--}}
{{--                            <li><a href="become-teacher.html">Become Teacher</a></li>--}}
{{--                        </ul><!-- /.sub-menu -->--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="news.html">News</a>--}}
{{--                        <ul class="sub-menu">--}}
{{--                            <li><a href="news.html">News Page</a></li>--}}
{{--                            <li><a href="news-details.html">News Details</a></li>--}}
{{--                        </ul><!-- /.sub-menu -->--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="contact.html">Contact</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div><!-- /.navbar-collapse -->--}}
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
