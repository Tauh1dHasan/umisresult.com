@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | Student Result')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Student Result</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Result</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Student Result</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div>
                    <!-- end card header -->

                    <div class="card-body">
                        <h3>Name: {{$studentResult->name}}</h3>
                        <h4>Student ID: {{$studentResult->student_id}}</h4>
                        <img src="{{asset('storage/studentResults')}}/{{$studentResult->result_image}}" alt="Result Image">
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

