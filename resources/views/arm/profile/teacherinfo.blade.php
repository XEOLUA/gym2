<div class="modal fade" id="modalTeacher" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Особиста інформація вчителя</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                        action="{{route('saveteacherinfo')}}"
                        method="POST" name="f_private" id="f_private">
                    @csrf
                    <input type="hidden" name="id_teacher_f" id="id_teacher_f" value="{{auth()->user()->id}}">
                    <div style="display: flex">
                        <div>
                            <img src="" alt="Світлина вчителя" id="teacher_img" style="width: 60px; border: 1px solid silver; margin-right: 2px; border-radius: 3px">
                        </div>
                        <div>
                            <div>
                                <input placeholder="ПІБ" class="form-control" type="text"
                                       id="snp_teacher_f" name="snp_teacher_f" style="width: 402px; margin-bottom: 3px">
                            </div>
                            <div>
                                <input id="photo_teacher_f" name="photo_teacher_f" type="text"
                                       oninput="document.getElementById('teacher_img').src=this.value"
                                       placeholder="URL-адреса світлини вчителя" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div style="display: flex">
                        <select class="form-control" name="position_teacher_f" id="position_teacher_f" class="form-control"
                                style="margin: 2px;">
                            @foreach($positions as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control" name="sex_teacher_f" id="sex_teacher_f" class="form-control"
                                style="margin: 2px;">
                            <option value="1">Чоловіча</option>
                            <option value="2">Жіноча</option>
                        </select>
                        <input type="date" class="form-control" type="text"
                               style="margin: 2px;"
                               placeholder="дата народження"
                               id="date_teacher_f" name="date_teacher_f">
                    </div>
                    <div style="display: flex">

                        <select class="form-control" name="category_teacher_f" id="category_teacher_f" class="form-control"
                                style="margin: 2px;">
                                <option value="спеціаліст">Спеціаліст</option>
                                <option value="друга">Друга</option>
                                <option value="перша">Перша</option>
                                <option value="вища">Вища</option>
                        </select>
                        <select class="form-control" name="title_teacher_f" id="title_teacher_f" class="form-control"
                                style="margin: 2px;">
                            <option value="відсутнє">Відсутнє</option>
                            <option value="старший вчитель">Старший вчитель</option>
                            <option value="вчитель-методист">Вчитель-методист</option>
                        </select>
                    </div>
                    <div style="display: flex">
                        <input type="text" class="form-control" type="text"
                               style="margin: 2px;"
                               placeholder="телефон вчителя"
                               id="phones_teacher_f" name="phones_teacher_f">
                        <input type="text" class="form-control" type="text"
                               style="margin: 2px;"
                               placeholder="E-mail вчителя"
                               id="mail_teacher_f" name="mail_teacher_f">
                    </div>
                    <div>
                        <div style="font-weight: bold">Належить до МО:</div>
                        @foreach($mos as $mo)
                            <div style="line-height: 10px ">
                                <input type="checkbox" id="mo{{$mo->id}}" name="mos_f[]" value="{{$mo->id}}">
                                <label style="cursor:pointer" for="mo{{$mo->id}}">{{$mo->name}}</label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <div style="font-weight: bold">Викладає предмети:</div>
                        <div style="display: flex; width: 460px;">
                            @foreach($subjects as $subject)
                                @if($loop->index==0 || $loop->index==(int)($subjects->count()/2)+1)
                                 <div style="line-height: 10px;">
                                @endif
                                 <div style="width: 230px">
                                     <input type="checkbox" id="subject{{$subject->id}}" name="subjects_f[]" value="{{$subject->id}}">
                                     <label style="cursor:pointer" for="subject{{$subject->id}}">{{$subject->name}}</label>
                                 </div>
                                @if($loop->index==(int)($subjects->count()/2) || $loop->index==$subjects->count()-1)
                                     </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary btnSubmitPrivatTeacher">Відправити</button>
            </div>
        </div>
    </div>
</div>
