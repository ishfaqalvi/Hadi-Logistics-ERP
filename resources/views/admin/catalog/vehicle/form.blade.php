<div class="row">
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_company') }}
        {{ Form::select('vehicle_company_id', vehicleCompanies(), $vehicle->vehicle_company_id, ['class' => 'form-control form-select' . ($errors->has('vehicle_company_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('vehicle_company_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('title') }}
        {{ Form::text('title', $vehicle->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title', 'required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('status') }}
        {{ Form::select('status', ['1' => 'Active', '0' => 'InActive'], $vehicle->status, ['class' => 'form-control form-select' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '--Select--']) }}
        {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('description') }}
        {{ Form::textarea('description', $vehicle->description, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description','rows' => '2']) }}
        {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
