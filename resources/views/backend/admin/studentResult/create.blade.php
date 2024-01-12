@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | Add New Result')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add New Result</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add New Result</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-xxl-12">

            @include('backend.admin.partials.alert')

            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Add New Result</h4>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <form id="save_training" action="{{route('admin.studentResult.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <div>
                                            <label for="student_name" class="form-label">Student Name<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Student Name" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div>
                                            <label for="student_id" class="form-label">Student ID<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Student ID" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div>
                                            <label for="result_image" class="form-label">Result Image</label>
                                            <input type="file" class="form-control" id="result_image" name="result_image" data-allow-reorder="true">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
<!-- container-fluid -->
</div>

@endsection
