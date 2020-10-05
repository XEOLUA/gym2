<div style="display: flex">
    <div>
        <div style="padding: 5px; background: #022c46; color: #748290; border-bottom: 1px dashed silver; border-radius: 0 10px 0 0">Сторінки:</div>
        @foreach($pages as $page)
            <div style="display: flex; padding: 5px; background: #022c46; color: #748290; border-bottom: 1px dashed silver">
                <span><i class="fas fa-file-word"></i></span>
                <span style="width: 70%">
                  <a style="color: silver; padding-left:10px;  @if($page->id==$page_id) font-weight:bold; color:#ffffff; @endif" href="{{url('/arm/profile/'.$page->id)}}">{{$page->title}}</a>
                </span>
                 <span style="width:15%; text-align: center">
                   @if ($loop->last) <a title="Перемістити вище" style="color: #00ff00" href="{{url('/arm/profile/page/'.$page->id.'/up')}}"><i class="fas fa-long-arrow-alt-up"></i></a>@endif
                     @if ($loop->first) <a title="Перемістити нижчі" style="color: #ff0000" href="{{url('/arm/profile/page/'.$page->id.'/down')}}"><i class="fas fa-long-arrow-alt-down"></i></a>@endif
                    @if (!$loop->first && !$loop->last)
                           <a title="Перемістити вище" style="color: #00ff00" href="{{url('/arm/profile/page/'.$page->id.'/up')}}"><i class="fas fa-long-arrow-alt-up"></i></a>
                           <a  title="Перемістити нижчі" style="color: #ff0000" href="{{url('/arm/profile/page/'.$page->id.'/down')}}"><i class="fas fa-long-arrow-alt-down"></i></a>
                    @endif
                </span>
                <span style="padding-right: 3px">
                    <a class="btn-primary btn btn-xs"
                       style="padding: 1px; font-size: 9px; width:20px; margin: 0"
                       title="Редагування сторінки"
                       href="#"
                       onclick="getpageinfo('{{$page->id}}');"
                       data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-pencil-alt"></i></a>
                </span>
                <span>
                    <a class="btn-danger btn-delete btn btn-xs"
                       onclick="document.getElementById('page_title').innerText = '{{$page->title}}';
                               document.getElementById('id_f_delete').value={{$page->id}}"
                       data-toggle="modal" data-target="#deleteModal"
                       style="padding: 1px; font-size: 9px; width:20px; margin: 0;"
                       href=""><i class="fas fa-trash-alt"></i></a>
                </span>
            </div>
        @endforeach
        <div style="padding: 5px; background: #022c46; color: #748290; border-bottom: 1px dashed silver">&nbsp;
        </div>
        <div style=" padding: 5px; background: #022c46; color: #748290; border-bottom: 1px dashed silver">
            <i class="fas fa-cog"></i> <a href="#" style="color: silver; "
          onclick="getteacherinfo('{{auth()->user()->teacher_id}}');"
          data-toggle="modal" data-target="#modalTeacher"
            >Особиста інформація</a>
        </div>
        <div style="border-radius: 0 0 10px 0; padding: 5px; background: #022c46; color: #748290; ">&nbsp;
        </div>
    </div>
    <div style="margin: 10px; padding: 10px; border: 1px solid silver; width: 100%">
        {!! isset($pages[$page_id]) ? $pages[$page_id]->content : ''!!}
    </div>

</div>