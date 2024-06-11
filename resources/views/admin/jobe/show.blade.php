@extends('admin.layout.app')

@section('title')
    {{ $jobe->name ?? "Show Jobe" }}
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Jobe Managment</span>
        </h4>
    </div>
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('jobes.index') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
            <h5 class="mb-0">{{ __('Show') }} Jobe</h5>
        </div>
        <div class="card-body">
            
                        <div class="form-group mb-3">
                            <strong>Jobe No:</strong>
                            {{ $jobe->jobe_no }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Customer Id:</strong>
                            {{ $jobe->customer_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Id:</strong>
                            {{ $jobe->vehicle_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Year:</strong>
                            {{ $jobe->vehicle_year }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vehicle Chasis:</strong>
                            {{ $jobe->vehicle_chasis }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Consignee Id:</strong>
                            {{ $jobe->consignee_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Type:</strong>
                            {{ $jobe->type }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Notify:</strong>
                            {{ $jobe->notify }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Shipping Line Name:</strong>
                            {{ $jobe->shipping_line_name }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Bl No:</strong>
                            {{ $jobe->bl_no }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Bl Date:</strong>
                            {{ $jobe->bl_date }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Last Entry:</strong>
                            {{ $jobe->last_entry }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Last Entry To Bl Days:</strong>
                            {{ $jobe->last_entry_to_bl_days }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Collectortae:</strong>
                            {{ $jobe->collectortae }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Shed Id:</strong>
                            {{ $jobe->shed_id }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Vessel:</strong>
                            {{ $jobe->vessel }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Eta:</strong>
                            {{ $jobe->eta }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Igm:</strong>
                            {{ $jobe->igm }}
                        </div>
                        <div class="form-group mb-3">
                            <strong>Index:</strong>
                            {{ $jobe->index }}
                        </div>

        </div>
    </div>
</div>
@endsection