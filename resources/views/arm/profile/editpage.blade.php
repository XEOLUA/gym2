<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Сторінка</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                        action="{{route('saveteacherpage')}}"
                        method="POST" name="f" id="f">
                    @csrf
                    <input type="hidden" name="id_f" id="id_f">
                    <div style="display: flex">
                        <input placeholder="Заголовок сторінки" class="form-control" type="text" style="margin: 2px"
                               id="title_f" name="title_f">
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
