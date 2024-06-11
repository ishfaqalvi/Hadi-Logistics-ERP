@extends('admin.layout.app')

@section('title')
    Jobes Passport Check
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Jobes Managment ({{ $jobe->jobe_no }}) - Passport Checks</span>
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
                    <h4>Passport Checks</h4>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($passports as $passport)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" id="check_{{ $passport->id }}"
                                        name="value[{{ $passport->id }}][checked]">
                                    <label class="ms-2" for="check_{{ $passport->id }}">{{ $passport->title }}</label>
                                </div>
                                <textarea name="value[{{ $passport->id }}][description]" class="form-control"></textarea>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

