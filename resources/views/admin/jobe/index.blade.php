@extends('admin.layout.app')

@section('title')
    Jobe
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Jobe Managment</span>
            </h4>
        </div>
        @can('jobes-create')
            <div class="d-lg-block my-lg-auto ms-lg-auto">
                <div class="d-sm-flex align-items-center mb-3 mb-lg-0 ms-lg-3">
                    <a href="{{ route('jobes.create') }}"
                        class="btn btn-outline-primary btn-labeled btn-labeled-start rounded-pill">
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
                <h5 class="mb-0">Jobe</h5>
            </div>
            <table class="table datatable-basic">
                <thead class="thead">
                    <tr>
                        <th>No</th>

                        <th>Jobe</th>
                        <th>Customer</th>
                        <th>Vehicle Company</th>
                        <th>Vehicle</th>
                        <th>Vehicle Year</th>
                        <th>Vehicle Chasis</th>
                        <th>Consignee</th>
                        <th>Type</th>
                        <th>Notify</th>
                        {{-- <th>Shipping Line Name</th>
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
                    @foreach ($jobes as $key => $jobe)
                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{{ $jobe->jobe_no }}</td>
                            <td>{{ $jobe->customer->name }}</td>
                            <td>{{ $jobe->vehicle->vehicleCompany->title }}</td>
                            <td>{{ $jobe->vehicle->title }}</td>
                            <td>{{ $jobe->vehicle_year }}</td>
                            <td>{{ $jobe->vehicle_chasis }}</td>
                            <td>{{ $jobe->consignee->name }}</td>
                            <td>{{ $jobe->type }}</td>
                            <td>{{ $jobe->notify }}</td>
                            {{-- <td>{{ $jobe->shipping_line_name }}</td>
                            <td>{{ $jobe->bl_no }}</td>
                            <td>{{ $jobe->bl_date }}</td>
                            <td>{{ $jobe->last_entry }}</td>
                            <td>{{ $jobe->last_entry_to_bl_days }}</td>
                            <td>{{ $jobe->collectortae }}</td>
                            <td>{{ $jobe->shed_id }}</td>
                            <td>{{ $jobe->vessel }}</td>
                            <td>{{ $jobe->eta }}</td>
                            <td>{{ $jobe->igm }}</td>
                            <td>{{ $jobe->index }}</td> --}}

                            <td class="text-center">@include('admin.jobe.actions')</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            const swalInit = swal.mixin({
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                    denyButton: 'btn btn-light',
                    input: 'form-control'
                }
            });
            $(".sa-confirm").click(function(event) {
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
                    if (result.value === true) $(this).closest("form").submit();
                });
            });
        });
    </script>
@endsection
