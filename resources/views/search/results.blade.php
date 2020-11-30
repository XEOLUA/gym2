<div style="text-align: center">
    <h2>Результат пошуку: <span style="color:#f16101">{{$total}}</span></h2>
     <h3 style="color: #7c4bc0">"{{$text}}"</h3>
</div>
@forelse($results as $res)
 <div style="margin: 20px">
     <div style="color:#555555; font-size: 12px">{{$res->path}}</div>
     <a href="{{url($res->path)}}">{{$res->title}}</a>
 </div>
@empty
    <div style="text-align: center">Нічого не знайдено</div>
@endforelse

@if($total>0)
<div style="display: flex; flex-wrap: wrap; margin: 30px;"><span style="padding: 5px">Стр.: </span>
    @for($i=1;$i<=ceil($total/10.0);$i++)
        @if($i==$curpage) <span style="padding: 5px; font-weight: bold; color: #f16101">{{$i}}</span>
        @else <span style="padding: 5px; cursor: pointer" onclick="
                document.getElementById('form_search').cur_page.value={{$i}};
                document.getElementById('form_search').search.value='{{$text}}';
                document.getElementById('form_search').submit();
                ">{{$i}}</span>
        @endif

    @endfor
</div>
@endif
