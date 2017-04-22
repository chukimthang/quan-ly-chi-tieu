<div class="modal fade create" tabindex="-1" role="dialog"
    id="category-create">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h3 class="modal-title title" align="center">
                    Thêm chuyên mục
                </h3>
            </div>
            
            <div class="form-error"></div>

            <div class="modal-body form">
                <div class="form-group">
                    {!! Form::label('Chuyên mục') !!}
                    {!! Form::text('name', null, [
                        'class' => 'form-control',
                        'id' => 'category-name'
                    ]) !!}
                </div>
            </div>

            <div class="modal-footer form">
                {!! Form::submit('Đóng', [
                    'class' => 'btn btn-default',
                    'data-dismiss' =>'modal'
                ]) !!}
                {!! Form::submit('Thêm', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    </div>
</div>
