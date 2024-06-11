<div class="row">

    <div class="col-lg-12 fs-4 fw-semibold">
        Customer Details
    </div>
    <div class="form-group col-lg-12 mb-3">
        {{ Form::label('customer') }}
        {{ Form::select('customer_id', $customers, $jobe->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Customer', 'required']) }}
        {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle') }}
        {{ Form::select('vehicle_id', $vehicles, $jobe->vehicle_id, ['class' => 'form-control' . ($errors->has('vehicle_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Vehicle', 'required']) }}
        {!! $errors->first('vehicle_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_year') }}
        {{ Form::number('vehicle_year', $jobe->vehicle_year, ['class' => 'form-control' . ($errors->has('vehicle_year') ? ' is-invalid' : ''), 'placeholder' => 'Vehicle Year', 'required', 'min' => '1900', 'max' => date('Y')]) }}
        {!! $errors->first('vehicle_year', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-4 mb-3">
        {{ Form::label('vehicle_chasis') }}
        {{ Form::text('vehicle_chasis', $jobe->vehicle_chasis, ['class' => 'form-control' . ($errors->has('vehicle_chasis') ? ' is-invalid' : ''), 'placeholder' => 'Vehicle Chasis', 'required']) }}
        {!! $errors->first('vehicle_chasis', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('consignee') }}
        {{ Form::select('consignee_id', $consignees, $jobe->consignee_id, ['class' => 'form-control' . ($errors->has('consignee_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Consignee', 'required']) }}
        {!! $errors->first('consignee_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('type') }}
        {{ Form::select('type', ['gifter' => 'Gifter', 'personal bage' => 'Personal Bage'], $jobe->type, ['class' => 'form-control consignee_type' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Select Type', 'required']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-12 mb-3 {{ isset($jobe->notify) ? '' : 'd-none' }} notify-input">
        {{ Form::label('notify') }}
        {{ Form::text('notify', $jobe->notify, ['class' => 'form-control' . ($errors->has('notify') ? ' is-invalid' : ''), 'placeholder' => 'Notify', 'required',  isset($jobe->notify) ? '' : 'disabled']) }}
        {!! $errors->first('notify', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-lg-12 fs-4 fw-semibold">
        BL Details
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('shipping_line_name') }}
        {{ Form::text('shipping_line_name', $jobe->shipping_line_name, ['class' => 'form-control' . ($errors->has('shipping_line_name') ? ' is-invalid' : ''), 'placeholder' => 'Shipping Line Name', 'required']) }}
        {!! $errors->first('shipping_line_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('BL_no') }}
        {{ Form::text('bl_no', $jobe->bl_no, ['class' => 'form-control' . ($errors->has('bl_no') ? ' is-invalid' : ''), 'placeholder' => 'BL No', 'required']) }}
        {!! $errors->first('bl_no', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('bL_date') }}
        {{ Form::date('bl_date', $jobe->bl_date, ['class' => 'form-control' . ($errors->has('bl_date') ? ' is-invalid' : ''), 'placeholder' => 'BL Date', 'required']) }}
        {!! $errors->first('bl_date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('last_entry') }}
        {{ Form::date('last_entry', $jobe->last_entry, ['class' => 'form-control last-entry' . ($errors->has('last_entry') ? ' is-invalid' : ''), 'placeholder' => 'Last Entry', 'required']) }}
        {!! $errors->first('last_entry', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('collectortae') }}
        {{ Form::text('collectortae', $jobe->collectortae, ['class' => 'form-control' . ($errors->has('collectortae') ? ' is-invalid' : ''), 'placeholder' => 'Collectortae', 'required']) }}
        {!! $errors->first('collectortae', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('shed') }}
        {{ Form::select('shed_id', $sheds, $jobe->shed_id, ['class' => 'form-control' . ($errors->has('shed_id') ? ' is-invalid' : ''), 'placeholder' => 'Select Shed', 'required']) }}
        {!! $errors->first('shed_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('vessel') }}
        {{ Form::text('vessel', $jobe->vessel, ['class' => 'form-control' . ($errors->has('vessel') ? ' is-invalid' : ''), 'placeholder' => 'Vessel', 'required']) }}
        {!! $errors->first('vessel', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('ETA') }}
        {{ Form::date('eta', $jobe->eta, ['class' => 'form-control' . ($errors->has('eta') ? ' is-invalid' : ''), 'placeholder' => 'ETA', 'required']) }}
        {!! $errors->first('eta', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('IGM') }}
        {{ Form::text('igm', $jobe->igm, ['class' => 'form-control' . ($errors->has('igm') ? ' is-invalid' : ''), 'placeholder' => 'IGM', 'required']) }}
        {!! $errors->first('igm', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-lg-6 mb-3">
        {{ Form::label('index') }}
        {{ Form::number('index', $jobe->index, ['class' => 'form-control' . ($errors->has('index') ? ' is-invalid' : ''), 'placeholder' => 'Index', 'required', 'min' => 0]) }}
        {!! $errors->first('index', '<div class="invalid-feedback">:message</div>') !!}
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
            $('.consignee_type').on('change', function() {
                $('.notify-input').toggleClass('d-none', $(this).val() != 'gifter');
                $('.notify-input>input').attr('disabled', $(this).val() != 'gifter');
            });

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = yyyy + '-' + mm + '-' + dd;
            $('.last-entry').attr('max', today)
        });
    </script>
@endpush
