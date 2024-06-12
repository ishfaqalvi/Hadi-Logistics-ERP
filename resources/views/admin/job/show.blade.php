@extends('admin.layout.app')

@section('title')
    {{ $job->name ?? "Show Job" }}
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
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Show') }} Job</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Job No:</strong>
                            {{ $job->job_no }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Customer Id:</strong>
                            {{ $job->customer_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Id:</strong>
                            {{ $job->vehicle_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Year:</strong>
                            {{ $job->vehicle_year }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Chasis:</strong>
                            {{ $job->vehicle_chasis }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Consignee Id:</strong>
                            {{ $job->consignee_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Type:</strong>
                            {{ $job->type }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Notify:</strong>
                            {{ $job->notify }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Shipping Line Name:</strong>
                            {{ $job->shipping_line_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Bl No:</strong>
                            {{ $job->bl_no }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Bl Date:</strong>
                            {{ $job->bl_date }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Last Entry:</strong>
                            {{ $job->last_entry }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Last Entry To Bl Days:</strong>
                            {{ $job->last_entry_to_bl_days }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Collectortae:</strong>
                            {{ $job->collectortae }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Shed Id:</strong>
                            {{ $job->shed_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vessel:</strong>
                            {{ $job->vessel }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Eta:</strong>
                            {{ $job->eta }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Igm:</strong>
                            {{ $job->igm }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Index:</strong>
                            {{ $job->index }}
                        </div>

        </div>
    </div>
</div>
@endsection