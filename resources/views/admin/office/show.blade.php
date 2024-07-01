@extends('admin.layout.app')

@section('title')
    {{ $office->name ?? "Show Office" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Office Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('offices.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Show') }} Office</h5>
        </div>
        <div class="card-body d-flex justify-content-around">
            <div class="form-group">
                <img class="rounded-2" src="{{ asset($office->image) }}" width="200px"/>
            </div>
            <div class="form-group d-flex flex-column">
                <h5>User Information</h5>
                <strong>Name:</strong>
                {{ $office->name }}
                <strong>Email:</strong>
                {{ $office->email }}
            </div>
            <div class="form-group d-flex flex-column">
                <h5>User Roles</h5>
                @foreach($office->roles as $role)
                    <span class="badge rounded-pill bg-success mt-1">{{ $role->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection