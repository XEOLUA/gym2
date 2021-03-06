<section class="brand-two ">
    <div class="container">
        <div class="block-title">
            <h2 class="block-title__title">Гуртки та секції у гімназії</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->
        <div class="brand-one__carousel owl-carousel owl-theme">
            @foreach($circles as $circle)
            <div class="item"
                 data-toggle="tooltip"
                 data-html="true"
                 title="{{$circle->description}}">

                <a href="{{url('page/education-sections#'.$circle->anchor)}}"><div>
                    <img style="height: 80px" src="{{$circle->images ?? '$circle->images'}}" alt="">
                </div>
                <div>{{$circle->name}}</div></a>

            </div><!-- /.item -->
            @endforeach
        </div><!-- /.brand-one__carousel owl-carousel owl-theme -->
    </div><!-- /.container -->
</section><!-- /.brand-one -->
