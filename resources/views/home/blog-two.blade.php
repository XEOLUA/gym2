<section class="blog-two">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Наші останні новини</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="blog-two__carousel owl-carousel owl-theme">
            @foreach($news as $new)
            <div class="item">
                <div class="blog-two__single"
                     style="
                             background-repeat: no-repeat;
                             background-image: url('{{url($new->image ? \App\Services\ImgResize::ImgCopy($new->image,320,320) : 'assets/images/blog-2-3.jpg')}}');">
                    <div class="blog-two__inner" style="min-height: 400px;">
                        <a href="{{url('new/'.$new->id)}}" class="blog-two__date">
                            <span>{{Carbon\Carbon::parse($new->updated_at)->format('d')}}</span>
                            {{Carbon\Carbon::parse($new->updated_at)->format('M')}}
                        </a><!-- /.blog-two__date -->
                        <div class="blog-two__meta" style="display: block; line-height: normal">
                            <div style="color: #ebebeb">{{$new->author}}</div>
                            <a href="{{url('newstype/'.$new->newstypes->slug)}}">{{$new->newstypes->name ?? 'рубрика'}}</a>
                        </div><!-- /.blog-two__meta -->
                        <h3 class="blog-two__title">
                            <a href="{{url('new/'.$new->id)}}">{{$new->title ?? 'Заголовок новини'}}</a>
                        </h3><!-- /.blog-two__title -->
                    </div><!-- /.blog-two__inner -->
                </div><!-- /.blog-two__single -->
            </div><!-- /.item -->
            @endforeach
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-2.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Get a tips to develop a quality education</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-3.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Learn variety of programs and courses</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-1.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Summer high school journalism camp</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-2.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Get a tips to develop a quality education</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-3.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Learn variety of programs and courses</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-1.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Summer high school journalism camp</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-2.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Get a tips to develop a quality education</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
{{--            <div class="item">--}}
{{--                <div class="blog-two__single" style="background-image: url(assets/images/blog-2-3.jpg);">--}}
{{--                    <div class="blog-two__inner">--}}
{{--                        <a href="news-details.html" class="blog-two__date">--}}
{{--                            <span>25</span>--}}
{{--                            Jul--}}
{{--                        </a><!-- /.blog-two__date -->--}}
{{--                        <div class="blog-two__meta">--}}
{{--                            <a href="#">by Admin</a>--}}
{{--                            <a href="#">3 Comments</a>--}}
{{--                        </div><!-- /.blog-two__meta -->--}}
{{--                        <h3 class="blog-two__title">--}}
{{--                            <a href="news-details.html">Learn variety of programs and courses</a>--}}
{{--                        </h3><!-- /.blog-two__title -->--}}
{{--                    </div><!-- /.blog-two__inner -->--}}
{{--                </div><!-- /.blog-two__single -->--}}
{{--            </div><!-- /.item -->--}}
        </div><!-- /.blog-two__carousel owl-carousel owl-theme -->
    </div><!-- /.container -->
</section><!-- /.blog-one blog-page -->
