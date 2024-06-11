@extends('admin.layout.app')

@section('title')
    Documents Jobe
@endsection

@section('header')
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                Home - <span class="fw-normal">Jobes Managment ({{ $jobe->jobe_no }}) - Documents</span>
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
                    <h4>Documents</h4>
                    <button type="submit" class="btn btn-primary">Save Data</button>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        @foreach ($documents as $document)
                            <div class="col-md-6">
                                <h6 class="m-0">{{ $document->title }} <small>({{ $document->type }})</small> </h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        
                                        <div class="mb-1">
                                            <label for="">Submitted At</label>
                                            <input type="date" class="form-control"
                                                name="document[{{ $document->id }}][subsmitted_at]">
                                        </div>
                                        <div>
                                            <label for="">Submitted Remarks</label>
                                            <textarea name="document[{{ $document->id }}][submitted_remarks]" class="form-control"></textarea>
                                        </div>
                                        <div class="mb-1">
                                            <label for="">Returned At</label>
                                            <input type="date" class="form-control"
                                                name="document[{{ $document->id }}][returned_at]">
                                        </div>
                                        <div>
                                            <label for="">Returned Remarks</label>
                                            <textarea name="document[{{ $document->id }}][returned_remarks]" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Attachment</label>
                                        <input type="file" class="form-control dropify" name=""
                                            data-default-file="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endsection
