<!-- Modal -->
<div class="modal fade" id="updateStudent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div>
            <p class="alert alert-success ds-none msg-success text-capitalize"></p>
        </div>
        {!! Form::open(['class'=>'edit-form', 'method'=>'PUT']) !!}
            <div class="modal-body">

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control name']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="name_error"></strong>
                    </span>
                </div>
                {!! Form::hidden('id',null, ['class'=>'std_id']) !!}
                <div class="form-group">
                    {!! Form::label('phone','Phone Number') !!}
                    {!! Form::text('phone', null, ['class'=>'form-control phone']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="phone_error"></strong>
                    </span>
                </div>
                <div class="form-group">
                    {!! Form::label('course','Course') !!}
                    {!! Form::text('course', null, ['class'=>'form-control course']) !!}
                    <span class="invalid-feedback" role="alert">
                        <strong class="course_error"></strong>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        {!! Form::close() !!}
    </div>
    </div>
</div>
