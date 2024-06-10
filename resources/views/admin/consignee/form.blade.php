<div class="row">

    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('name') }}
        {{ Form::text('name', $consignee->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('father_name') }}
        {{ Form::text('father_name', $consignee->father_name, ['class' => 'form-control' . ($errors->has('father_name') ? ' is-invalid' : ''), 'placeholder' => 'Father Name','required']) }}
        {!! $errors->first('father_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('email') }}
        {{ Form::text('email', $consignee->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email','required']) }}
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('phone_number') }}
        {{ Form::text('phone_number', $consignee->phone_number, ['class' => 'form-control' . ($errors->has('phone_number') ? ' is-invalid' : ''), 'placeholder' => 'Phone Number','required']) }}
        {!! $errors->first('phone_number', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('cnic') }}
        {{ Form::text('cnic', $consignee->cnic, ['class' => 'form-control' . ($errors->has('cnic') ? ' is-invalid' : ''), 'placeholder' => 'Cnic','required']) }}
        {!! $errors->first('cnic', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('passport') }}
        {{ Form::text('passport', $consignee->passport, ['class' => 'form-control' . ($errors->has('passport') ? ' is-invalid' : ''), 'placeholder' => 'Passport','required']) }}
        {!! $errors->first('passport', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('address') }}
        {{ Form::textarea('address', $consignee->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
        {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
    </div>

	<div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
		<button type="submit" class="btn btn-primary ms-3">
			Submit <i class="ph-paper-plane-tilt ms-2"></i>
		</button>
	</div>
</div>
