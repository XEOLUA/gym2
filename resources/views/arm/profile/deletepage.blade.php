<div class="modal" tabindex="-1" role="dialog" id="deleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: red; color:white">
                <h5 class="modal-title" style="font-weight: bold">Попередження</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ви дійсно бажаєте видалити сторінку "<span style="font-weight: bold" id="page_title"></span>"?</p>
            </div>
            <form
                    action="{{route('deleteteacherpage')}}"
                    method="POST" name="form_delete" id="form_delete">
                <input type="hidden" id="id_f_delete" name="id_f_delete">
                @csrf
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnSubmitDeletePage" style="background-color: red">Видалити</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>