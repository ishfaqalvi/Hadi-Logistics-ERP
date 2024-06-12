@extends('admin.layout.app')

@section('title')
    Job
@endsection

@section('header')
<div class="page-header-content d-lg-flex">
    <div class="d-flex">
        <h4 class="page-title mb-0">
            Home - <span class="fw-normal">Job Managment</span>
        </h4>
    </div>
    @can('jobs-create')
    <div class="d-lg-block my-lg-auto ms-lg-auto">
        <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
            <a href="{{ route('jobs.create') }}" class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
                <span class="btn-labeled-icon bg-primary text-white rounded-pill">
                    <i class="ph-plus"></i>
                </span>
                Create New
            </a>
        </div>
    </div>
    @endcan
</div>
@endsection

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Job</h5>
        </div>
        <table class="table datatable-basic">
            <thead class="thead">
                <tr>
                    <th>No</th>
                    <th>Job No</th>
                    <th>Customer</th>
                    <th>Vehicle</th>
                    <th>Vehicle Year</th>
                    <th>Vehicle Chasis</th>
                    <th>Consignee</th>
                    <th>Type</th>
                    {{-- <th>Notify</th>
                    <th>Shipping Line Name</th>
                    <th>Bl No</th>
                    <th>Bl Date</th>
                    <th>Last Entry</th>
                    <th>Last Entry To Bl Days</th>
                    <th>Collectortae</th>
                    <th>Shed Id</th>
                    <th>Vessel</th>
                    <th>Eta</th>
                    <th>Igm</th>
                    <th>Index</th> --}}
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $key => $job)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $job->job_no }}</td>
                    <td>{{ $job->customer->name }}</td>
                    <td>{{ $job->vehicle->title }}</td>
                    <td>{{ $job->vehicle_year }}</td>
                    <td>{{ $job->vehicle_chasis }}</td>
                    <td>{{ $job->consignee->name }}</td>
                    <td>{{ $job->type }}</td>
                    {{-- <td>{{ $job->notify }}</td>
                    <td>{{ $job->shipping_line_name }}</td>
                    <td>{{ $job->bl_no }}</td>
                    <td>{{ $job->bl_date }}</td>
                    <td>{{ $job->last_entry }}</td>
                    <td>{{ $job->last_entry_to_bl_days }}</td>
                    <td>{{ $job->collectortae }}</td>
                    <td>{{ $job->shed_id }}</td>
                    <td>{{ $job->vessel }}</td>
                    <td>{{ $job->eta }}</td>
                    <td>{{ $job->igm }}</td>
                    <td>{{ $job->index }}</td> --}}
                    <td class="text-center">@include('admin.job.actions')</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function () {
        const swalInit = swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-light',
                denyButton: 'btn btn-light',
                input: 'form-control'
            }
        });
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection
