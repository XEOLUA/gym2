<section class="course-one course-one__teacher-details home-one">
    <div class="container">
        <div class="course-one__carousel owl-carousel owl-theme">
            @foreach($direction as $direct)
            <div class="item">
                <div class="course-one__single color-1">
                    <div class="course-one__image">
                        <img src="{{$direct->image ? url(\App\Services\ImgResize::ImgCopy($direct->image,370,243,[255,255,255])) :url('assets/images/course-1-1.jpg')}}" alt="">
                        <i class="far fa-heart"></i><!-- /.far fa-heart -->
                    </div><!-- /.course-one__image -->
                    <div class="course-one__content">
                        <a href="{{$direct->link ?? '#'}}" target="_blank" class="course-one__category">{{$direct->title}}</a><!-- /.course-one__category -->
                        <div class="course-one__admin">
                            <img src="assets/images/team-1-1.jpg" alt="">
                            від <a target="_blank"  href="{{$direct->link ?? '#'}}">{{$direct->experts}}</a>
                        </div><!-- /.course-one__admin -->
                        <h2 class="course-one__title" style="min-height: 60px;"><a target="_blank"  href="{{$direct->link ?? '#'}}">{{$direct->description}}</a></h2>
                        <a target="_blank" target="_blank"  href="{{$direct->link ?? '#'}}" class="course-one__link">Дізнатися більше</a><!-- /.course-one__link -->
                    </div><!-- /.course-one__content -->
                </div><!-- /.course-one__single -->
            </div><!-- /.item -->
            @endforeach

        </div><!-- /.course-one__carousel -->
    </div><!-- /.container -->
</section><!-- /.course-one course-page -->
