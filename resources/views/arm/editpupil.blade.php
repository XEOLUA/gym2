<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Особова справа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('savepupil')}}" method="POST" name="f" id="f">
                @csrf
                 <input type="hidden" name="id_f" id="id_f">
                    <div class="form-group" style="display: flex">
                        <input type="text" class="form-control" style="margin:2px; width: 60px; padding: 2px;"
                               id="alpha_f" name="alpha_f" placeholder="Альфа">
                        <input type="text" class="form-control" style="margin:2px; padding: 2px;"
                               id="snp_f" name="snp_f" placeholder="ПІБ">
                        <select class="form-control" style="width:90px;margin:2px;  padding: 2px"
                                name="classes_f" id="classes_f">
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="display: flex">
                        <input type="date" class="form-control" type="text" style="margin: 2px"
                               id="dt_f" name="dt_f">
                        <select class="form-control" name="sex_f" id="sex_f" class="form-control"
                                style="margin: 2px">
                            <option value="1">Чоловіча</option>
                            <option value="2">Жіноча</option>
                        </select>
                        <input type="text" class="form-control" style="margin:2px; padding: 2px;"
                               id="contacts_f" name="contacts_f" placeholder="Телефон">
                    </div>
                    <div>
                        <div>
                            <label for="address_f" class="col-form-label">Адреса:</label>
                            <textarea class="form-control" id="address_f" name="address_f"
                            style="margin: 2px"></textarea>
                        </div>
                        <div>
                            <label for="parents_f" class="col-form-label">Батьки:</label>
                            <textarea class="form-control" id="parents_f" name="parents_f"
                            style="margin:2px"></textarea>
                        </div>

                    </div>
                    <div>
                        <div>Соціальні групи:</div>
                        @foreach($socialgroups as $group)
                            <div style="line-height: 10px ">
                                <input type="checkbox" id="sg{{$group->id}}" name="socialgroup_f[]" value="{{$group->id}}"> <label style="cursor:pointer" for="sg{{$group->id}}">{{$group->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary btnSubmit" >Відправити</button>
            </div>
        </div>
    </div>
</div>
