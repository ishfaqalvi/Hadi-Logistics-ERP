@extends('admin.layout.app')

@section('title')
    {{ __('Update') }} Job
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Job Documents Managment</span>
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
                <h5 class="mb-0">Documents </h5>
            </div>
            <div class="card-body">



                <div class="d-lg-flex">
                    <ul class="nav nav-tabs nav-tabs-vertical nav-tabs-vertical-start wmin-lg-200 me-lg-3 mb-3 mb-lg-0"
                        role="tablist">
                        @foreach ($documents as $document)
                            <li class="nav-item" role="presentation">
                                <a href="#tab-{{ $document->id }}" class="nav-link {{ $loop->first ? 'active ' : '' }}"
                                    data-bs-toggle="tab" aria-selected="true" role="tab">

                                    {{ $document->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content flex-lg-fill">
                        @foreach ($documents as $document)
                            <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }} "
                                id="tab-{{ $document->id }}" role="tabpanel">
                                <form action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                {{ Form::label('submitted_at', 'Submitted At') }}
                                                {{ Form::text('submitted_at', '', ['class' => 'form-control submitted_at' . ($errors->has('submitted_at') ? ' is-invalid' : ''), 'placeholder' => 'Submitted At', 'required']) }}
                                                {!! $errors->first('submitted_at', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group mb-3">
                                                {{ Form::label('submitted_remarks', 'Submitted Remarks') }}
                                                {{ Form::text('submitted_remarks', '', ['class' => 'form-control' . ($errors->has('submitted_remarks') ? ' is-invalid' : ''), 'placeholder' => 'Submitted Remarks']) }}
                                                {!! $errors->first('submitted_remarks', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group mb-3">
                                                {{ Form::label('returned_at', 'Returned At') }}
                                                {{ Form::text('returned_at', '', ['class' => 'form-control returned_at' . ($errors->has('returned_at') ? ' is-invalid' : ''), 'placeholder' => 'Returned At', 'required']) }}
                                                {!! $errors->first('returned_at', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>

                                            <div class="form-group mb-3">
                                                {{ Form::label('returned_remarks', 'Submitted Remarks') }}
                                                {{ Form::text('returned_remarks', '', ['class' => 'form-control' . ($errors->has('returned_remarks') ? ' is-invalid' : ''), 'placeholder' => 'Returned Remarks']) }}
                                                {!! $errors->first('returned_remarks', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>


                                        </div>
                                        <div class="col-md-6">
                                            {{ Form::label('attachment') }}
                                            {{ Form::file('attachment', ['class' => 'form-control dropify' . ($errors->has('attachment') ? ' is-invalid' : ''), 'data-default-file' => null, 'data-height' => '270']) }}
                                            {!! $errors->first('attachment', '<div class="invalid-feedback">:message</div>') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-end align-items-center mt-3">
                                        <button type="submit" class="btn btn-primary ms-3">
                                            Submit <i class="ph-paper-plane-tilt ms-2"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('.dropify').dropify();
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
            ['.submitted_at','.returned_at'].forEach(selector => {
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
        });
    </script>
@endsection
