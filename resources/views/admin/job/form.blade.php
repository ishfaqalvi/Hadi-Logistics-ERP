<div class="row">
    <div class="fw-bold border-bottom pb-2 mb-3">Related Persons Detail:</div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('customer') }}
        {{ Form::select('customer_id', customers(), $job->customer_id, ['class' => 'form-control select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('agent') }}
        {{ Form::select('agent_id', agents(), $job->agent_id, ['class' => 'form-control select' . ($errors->has('agent_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('agent_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('consignee') }}
        {{ Form::select('consignee_id', consignees(), $job->consignee_id, ['class' => 'form-control select' . ($errors->has('consignee_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('consignee_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('type') }}
        {{ Form::select('type', ['gifter' => 'Gifter', 'personal bage' => 'Personal Bage'], $job->type, ['class' => 'form-control select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('notify') }}
        {{ Form::text('notify', $job->notify, ['class' => 'form-control' . ($errors->has('notify') ? ' is-invalid' : ''), 'placeholder' => 'Notify', 'required']) }}
        {!! $errors->first('notify', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="fw-bold border-bottom pb-2 mb-3">Vehicle Detail:</div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_company_id', 'Company') }}
        {{ Form::select('vehicle_company_id', vehicleCompanies(), $job->vehicle_company_id, ['class' => 'form-control select' . ($errors->has('vehicle_company_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required']) }}
        {!! $errors->first('vehicle_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle') }}
        {{ Form::select('vehicle_id', [], $job->vehicle_id, ['class' => 'form-control select' . ($errors->has('vehicle_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--', 'required','disabled']) }}
        {!! $errors->first('vehicle_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_year') }}
        {{ Form::number('vehicle_year', $job->vehicle_year, ['class' => 'form-control' . ($errors->has('vehicle_year') ? ' is-invalid' : ''), 'placeholder' => 'Vehicle Year', 'required', 'min' => '1900', 'max' => date('Y')]) }}
        {!! $errors->first('vehicle_year', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_chasis') }}
        {{ Form::text('vehicle_chasis', $job->vehicle_chasis, ['class' => 'form-control' . ($errors->has('vehicle_chasis') ? ' is-invalid' : ''), 'placeholder' => 'Vehicle Chasis', 'required']) }}
        {!! $errors->first('vehicle_chasis', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="fw-bold border-bottom pb-2 mb-3">Booking Detail:</div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('shipping_line_name') }}
        {{ Form::text('shipping_line_name', $job->shipping_line_name, ['class' => 'form-control' . ($errors->has('shipping_line_name') ? ' is-invalid' : ''), 'placeholder' => 'Shipping Line Name', 'required']) }}
        {!! $errors->first('shipping_line_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('bl_no','BL #') }}
        {{ Form::text('bl_no', $job->bl_no, ['class' => 'form-control' . ($errors->has('bl_no') ? ' is-invalid' : ''), 'placeholder' => 'BL No', 'required']) }}
        {!! $errors->first('bl_no', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('bl_date','BL Date') }}
        {{ Form::text('bl_date', date('m-d-Y', $job->bl_date), ['class' => 'form-control bl_date' . ($errors->has('bl_date') ? ' is-invalid' : ''), 'placeholder' => 'BL Date', 'required']) }}
        {!! $errors->first('bl_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('last_entry','Last Entry Date') }}
        {{ Form::text('last_entry', date('m-d-Y', $job->last_entry), ['class' => 'form-control last_entry' . ($errors->has('last_entry') ? ' is-invalid' : ''), 'placeholder' => 'Last Entry Date', 'required','id' => 'last_entry']) }}
        {!! $errors->first('last_entry', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('last_entry_to_bl_days','Days from last entry date') }}
        {{ Form::number('last_entry_to_bl_days', $job->last_entry_to_bl_days, ['class' => 'form-control' . ($errors->has('last_entry_to_bl_days') ? ' is-invalid' : ''), 'placeholder' => 'Last Entry To BL Days','required','readonly']) }}
        {!! $errors->first('last_entry_to_bl_days', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('collectorate') }}
        {{ Form::text('collectortae', $job->collectortae, ['class' => 'form-control' . ($errors->has('collectortae') ? ' is-invalid' : ''), 'placeholder' => 'Collectortae','required']) }}
        {!! $errors->first('collectortae', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('shed') }}
        {{ Form::select('shed_id', sheds(), $job->shed_id, ['class' => 'form-control select' . ($errors->has('shed_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('shed_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vessel') }}
        {{ Form::text('vessel', $job->vessel, ['class' => 'form-control' . ($errors->has('vessel') ? ' is-invalid' : ''), 'placeholder' => 'Vessel','required']) }}
        {!! $errors->first('vessel', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('eta','ETA') }}
        {{ Form::text('eta', date('m-d-Y', $job->eta), ['class' => 'form-control eta' . ($errors->has('eta') ? ' is-invalid' : ''), 'placeholder' => 'Eta','required']) }}
        {!! $errors->first('eta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('igm','IGM') }}
        {{ Form::number('igm', $job->igm, ['class' => 'form-control' . ($errors->has('igm') ? ' is-invalid' : ''), 'placeholder' => 'Igm','required']) }}
        {!! $errors->first('igm', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('index','INDEX') }}
        {{ Form::text('index', $job->index, ['class' => 'form-control' . ($errors->has('index') ? ' is-invalid' : ''), 'placeholder' => 'Index','required']) }}
        {!! $errors->first('index', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
        <button type="submit" class="btn btn-primary ms-3">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>
