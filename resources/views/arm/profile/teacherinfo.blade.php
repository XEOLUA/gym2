<div class="modal fade" id="modalTeacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Особиста інформація</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                        action="{{route('saveteacherinfo')}}"
                        method="POST" name="f_private" id="f_private">
                    @csrf
                    <input type="hidden" name="teacher_id_f" id="teacher_id_f" value="{{auth()->user()->id}}">
                    <div style="display: flex">
                        <input placeholder="ПІБ" class="form-control" type="text" style="margin: 2px"
                               id="snp_teacher_f" name="snp_teacher_f">
                    </div>
                    <div>
                        <textarea style="width: 100%" name="content_f" id="content_f" rows="5"></textarea>
                        <script>
                            CKEDITOR.replace( 'content_f' );
                        </script>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                <button type="button" class="btn btn-primary btnSubmitPage">Відправити</button>
            </div>
        </div>
    </div>
</div>
