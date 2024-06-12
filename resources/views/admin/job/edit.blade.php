@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Job
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Job Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('jobs.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-arrow-circle-left"></i>
                </span>
                Back
            </a>
        </div>
    </div>
</div>
<div class="page-header-content d-lg-flex border-top">
    <div class="d-flex">
        <a href="{{ route('jobs.edit', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.edit') ? 'active' : ''}}">
            <i class="ph-note-pencil me-1"></i>
            Detail
        </a>
    </div>

    <div class="d-flex">
        <a href="{{ route('jobs.document.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.document.index') ? 'active' : ''}}">
            <i class="ph-files me-1"></i>
            Documents
        </a>
    </div>

    <div class="d-flex">
        <a href="{{ route('jobs.verification.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.verification.index') ? 'active' : ''}}">
            <i class="ph-checks me-1"></i>
            Verifications
        </a>
    </div>

    <div class="d-flex">
        <a href="{{ route('jobs.passport-check.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.passport-check.index') ? 'active' : ''}}">
            <i class="ph-identification-badge me-1"></i>
            Passport Checks
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Edit ') }} Job </h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('jobs.update', $job->id) }}" class="validate"   role="form" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                 @include('admin.job.form')
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function(){
        $('.select').select2();
        $('.validate').validate({
            errorClass: 'validation-invalid-label',
            successClass: 'validation-valid-label',
            validClass: 'validation-valid-label',
            highlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).addClass('is-invalid');
                $(element).removeClass('is-valid');
            },
            unhighlight: function(element, errorClass) {
                $(element).removeClass(errorClass);
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            success: function(label) {
                label.addClass('validation-valid-label').text('Success.');
            },
            errorPlacement: function(error, element) {
                if (element.hasClass('select2-hidden-accessible')) {
                    error.appendTo(element.parent());
                }else if (element.parents().hasClass('form-control-feedback') || element.parents().hasClass('form-check') || element.parents().hasClass('input-group')) {
                    error.appendTo(element.parent().parent());
                }else {
                    error.insertAfter(element);
                }
            }
        });
        $('select[name=type]').on('change', function(){
            var type = $(this).val();
            if(type == "personal bage"){
                $('input[name=notify]').val('Same as Consignee');
                $('input[name=notify]').attr('readonly', true);
            }else{
                $('input[name=notify]').val('');
                $('input[name=notify]').attr('readonly', false);
            }
        });
        if($('select[name=vehicle_company_id]').val()){
            fetchVehicles($('select[name=vehicle_company_id]').val())
        }
        console.log($('select[name=vehicle_company_id]').val());
        $('select[name=vehicle_company_id]').change(function () {
            let id = $(this).val();
            fetchVehicles(id);

        });
        function fetchVehicles(id){
            $('select[name=vehicle_id]').html('<option>--Select--</option>');
            $('select[name=vehicle_id]').attr('disabled',false);
            $.get('/admin/jobs/get-vehicles', {id: id}).done(function (result) {
                let data = JSON.parse(result);
                $('select[name=vehicle_id]').prop('disabled', false);
                $.each(data, function (i, val) {
                    $('select[name=vehicle_id]').append($('<option></option>').val(val.id).html(val.title));
                })
            });
        }
        ['.bl_date','.eta'].forEach(selector => {
            const element = document.querySelector(selector);
            if (element) {
                new Datepicker(element, {
                    container: '.content-inner',
                    buttonClass: 'btn',
                    prevArrow: document.dir == 'rtl' ? '&rarr;' : '&larr;',
                    nextArrow: document.dir == 'rtl' ? '&larr;' : '&rarr;',
                    autohide: true
                });
            }
        });
        const element = document.querySelector('.last_entry');
        if (element) {
            function formatDate(date) {
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();
                return `${month}/${day}/${year}`;
            }
            const today = new Date();
            const formattedToday = formatDate(today);
            new Datepicker(element, {
                container: '.content-inner',
                buttonClass: 'btn',
                maxDate: formattedToday,
                prevArrow: document.dir == 'rtl' ? '&rarr;' : '&larr;',
                nextArrow: document.dir == 'rtl' ? '&larr;' : '&rarr;',
                autohide: true
            });
            element.addEventListener('changeDate', function(event) {
                const selectedDate = formatDate(event.detail.date);
                calculateDaysDifference(selectedDate);
            });
        }
        function calculateDaysDifference(selectedDate) {
            const today = new Date();
            const selected = new Date(selectedDate);

            // Dinon ka farq calculate karna
            const differenceInMillis = today - selected;
            const daysDifference = Math.floor(differenceInMillis / (1000 * 60 * 60 * 24));

            const lastEntryInput = $("input[name=last_entry_to_bl_days]");
            lastEntryInput.val(daysDifference);

            // CSS classes ko handle karna
            const isDanger = daysDifference > 120;
            const textClass = isDanger ? 'text-danger' : 'text-success';
            const borderClass = isDanger ? 'border-danger' : 'border-success';

            lastEntryInput
                .removeClass('text-danger text-success border-danger border-success')
                .addClass(`${textClass} ${borderClass}`);
        }

    });
</script>
@endsection
