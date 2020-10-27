<h2 style="text-align: center"><a href="{{route('statisticsolymp')}}">Статистика олімпіад</a> <b><a href="{{url('teachers/page/'.Request::route()->parameter('teacher'))}}">{{$teachers[Request::route()->parameter('teacher')]->snp}}</a></b></h2>
{{--<h4 style="text-align: center; color: #2da397;"> за останні {{date('Y')-2003}} років</h4>--}}

<div style="max-width:800px; margin: 10px auto 0 auto; padding: 10px;">
    @foreach($group as $etap_id => $etap)
        <div style="color: #2da397; font-weight: bold; font-size: 20px; margin-top:30px; text-align: center"><a href="{{route('statisticsolymp', ['level' => $etap_id])}}">{{$etaps[$etap_id]}} етап</a><br> дипломів: {{$counts_etaps[$etap_id]}}</div>
        @foreach($group[$etap_id] as $subject_id => $val)
            <div class="stat-block;">
                <div style=" color:#2da397; font-weight: bold; margin-top: 20px;"><a href="{{route('statisticsolymp', ['level' => $etap_id,'subject'=>$subject_id])}}">{{$subjects[$subject_id]['name']}}</a>, <span style="font-weight: normal;">дипломів: <span style="color: #f16101; font-weight: bold">{{$group_etap_subject[$etap_id][$subject_id]->count()}}</span></span></div>
                @foreach($val as $key => $dt)
                    <div class="stat-block">
                        <div style="color: #7c4bc0; font-weight: bold; margin-top: 10px;"><a href="{{route('statisticsolymp', ['level' => $etap_id,'subject'=>$subject_id,'year'=>$key])}}">{{$key}}</a></div>
                        @foreach($dt as $item)
                            <div class="stat-block">
                                <span>
                                   Диплом <span style="font-weight: bold; color: #0b90c4">{{$item->position}}</span>-го
                                ступеня, учень: <a href="{{url('statistics/olymps/pupils/'.$item->pupil)}}">{{$item->pupil}}</a>, керівник: {{$teachers[$item->teacher_id]['snp']}}
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    @endforeach
</div>