@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Job
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Job Passport Check Managment</span>
            </h4>
        </div>
        <div class="d-lg-block my-lg-auto ms-lg-auto">
            <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
                <a href="{{ route('jobs.index') }}"
                    class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <a href="{{ route('jobs.edit', $job->id) }}"
                class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.edit') ? 'active' : '' }}">
                <i class="ph-note-pencil me-1"></i>
                Detail
            </a>
        </div>

        <div class="d-flex">
            <a href="{{ route('jobs.document.index', $job->id) }}"
                class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.document.index') ? 'active' : '' }}">
                <i class="ph-files me-1"></i>
                Documents
            </a>
        </div>

        <div class="d-flex">
            <a href="{{ route('jobs.verification.index', $job->id) }}"
                class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.verification.index') ? 'active' : '' }}">
                <i class="ph-checks me-1"></i>
                Verifications
            </a>
        </div>

        <div class="d-flex">
            <a href="{{ route('jobs.passport-check.index', $job->id) }}"
                class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.passport-check.index') ? 'active' : '' }}">
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
                <h5 class="mb-0">Passport Checks </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('jobs.passport-check.store') }}" class="validate" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id ?? null }}">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="form-check mb-2">
                                <input type="checkbox" class="form-check-input form-check-input-secondary select-all">
                                <span class="form-check-label">Select All</span>
                            </label>
                        </div>

                        @foreach ($passportChecks as $check)
                            <div class="col-md-6">
                                <label class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input form-check-input-secondary"
                                        name="checks[]" value="{{ $check->id }}" @checked(isset($check->jobPassportCheck->checked) && $check->jobPassportCheck->checked == 1)>
                                    <span class="form-check-label">{{ $check->title }}</span>
                                </label>
                            </div>
                        @endforeach
                        <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
                            <button type="submit" class="btn btn-primary ms-3">
                                Submit <i class="ph-paper-plane-tilt ms-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
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
                    } else if (element.parents().hasClass('form-control-feedback') || element.parents()
                        .hasClass('form-check') || element.parents().hasClass('input-group')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select-all').click(function(event) {
                if (this.checked) {
                    $('.form-check-input-secondary').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.form-check-input-secondary').each(function() {
                        this.checked = false;
                    });
                }
            });
            $('.form-check-input-secondary').on('change', function() {
                if ($('.form-check-input-secondary:checked').length === $('.form-check-input-secondary').length) {
                    $('.select-all').prop('checked', true);
                } else {
                    $('.select-all').prop('checked', false);
                }
            });
        });
    </script>
@endsection
