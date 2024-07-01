<div class="row">
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('user_id', 'Office') }}
        {{ Form::select('user_id', offices(), $expenditure->user_id, ['class' => 'form-control select' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('type') }}
        {{ Form::select('type', ['Personal'=>'Personal', 'Customer'=>'Customer'], $expenditure->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $expenditure->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title', 'required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
@push('script')
    <script>
        $(function() {
            $('.select').select2();
        });
    </script>
@endpush
