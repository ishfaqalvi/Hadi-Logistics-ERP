@extends('admin.layout.app')

@section('title')
    Jobes Verification
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Jobes Managment ({{ $jobe->jobe_no }}) - Verifications</span>
            </h4>
        </div>
        <div class="d-lg-block my-lg-auto ms-lg-auto">
            <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
                <a href="{{ route('jobes.index') }}"
                    class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                    <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                        <i class="ph-arrow-circle-left"></i>
                    </span>
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="col-sm-12">
        <form action="">
            <div class="card ">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Verifications</h4>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($verifications as $verification)
                            <div class="col-md-4">
                                <h6 class="m-0">{{ $verification->title }}</h6>
                                <div class="mb-1">
                                    <label for="">Value</label>
                                    <input type="text" class="form-control"
                                        name="verification[{{ $verification->id }}][value]">
                                </div>
                                <div>
                                    <label for="">Description</label>
                                    <textarea name="verification[{{ $verification->id }}][description]" class="form-control"></textarea>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
