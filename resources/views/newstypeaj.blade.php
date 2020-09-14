
            @foreach($newses[0]->newses as $news)
               <a href="{{url('new/'.$news->id)}}">
                <div style="margin: 0px 0px 50px 0px">
                    <img
                            style="
                    display: block;
                    border-radius: 10px;
                    width: 300px;
                    height: 100%;
                    object-fit: cover;
                    "
                    src="{{url($news->image ? \App\Services\ImgResize::ImgCopy($news->image,500,285,[232,240,244]) : 'assets/images/blog-2-3.jpg')}}" alt="">
                    <div style="text-align: left;margin-top: 10px">{{Carbon\Carbon::parse($news->updated_at)->format('M d, Y')}}</div>
                    <p style="width: 320px;text-align: left; padding-right: 20px;">
                        {{$news->title}}
                    </p>
                </div>
               </a>
            @endforeach