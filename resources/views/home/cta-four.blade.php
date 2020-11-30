<section class="cta-four">
    <img src="assets/images/circle-stripe-1.png" class="cta-four__stripe" alt="">
    <img src="assets/images/line-stripe-1.png" class="cta-four__line" alt="">
    <div class="container text-center" style="text-align: center">
        <div class="block-title">
            <h2 class="block-title__title">В нас працюють<br>
                найкраші вчителі</h2><!-- /.block-title__title -->
        </div><!-- /.block-title -->

        <div class="cta-four__text" style="line-height: normal;display:inline-block; width: 300px;text-align: left">
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['all']}}</span> - {{\App\Services\GetSuffixByNumber::get_suffix($teachers_statistics['all'],'вчитель','вчителя','вчителів')}} працює у гімназії<br>

            <div style="padding-top: 10px; font-weight: bold">Зі званням:</div>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['title']['method']}}</span> - {{\App\Services\GetSuffixByNumber::get_suffix($teachers_statistics['title']['method'],'вчитель','вчителя','вчителів')}}-{{\App\Services\GetSuffixByNumber::get_suffix($teachers_statistics['title']['method'],'методист','методисти','методистів')}}<br>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['title']['hight']}}</span> - {{\App\Services\GetSuffixByNumber::get_suffix($teachers_statistics['title']['hight'],'старший','старших','старших')}} {{\App\Services\GetSuffixByNumber::get_suffix($teachers_statistics['title']['hight'],'вчитель','вчителя','вчителів')}}<br>

            <div style="padding-top: 10px; font-weight: bold">З категорією:</div>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['category']['hight']}}</span> - вищої категорії<br>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['category']['first']}}</span> - першої категорії<br>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['category']['second']}}</span> - другої категорії<br>
            <span style="color: orange; font-weight: bold">{{$teachers_statistics['category']['spets']}}</span> - спеціалісти<br>
        </div><!-- /.cta-four__text -->
    </div><!-- /.container text-center -->
</section><!-- /.cta-four -->
