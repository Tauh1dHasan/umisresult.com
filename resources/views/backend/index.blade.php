@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | Admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    {{-- <h4 class="mb-sm-0">{{$global_setting->title ?? ""}}</h4> --}}

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">ড্যাশবোর্ড</a></li> --}}
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">

                <div class="card crm-widget">
                    <div class="card-body p-0">
                        <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                            <div class="col" style="background: linear-gradient(45deg, #27bfa0, #5ce7cb); border-radius: 5px; box-shadow: 3px 3px 3px rgba(1, 0, 0, 0.349);">
                                <a href="#">
                                    <div class="py-4 px-3">
                                        <h5 class="text-uppercase fs-15" style="color:white">সকল ব্যবহারকারী</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-shield-user-line display-6" style="color:white"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="10" style="color:white">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- end col -->
                            <div class="col" style="background: linear-gradient(45deg, #e09f44, #f0be78); border-radius: 5px; box-shadow: 3px 3px 3px rgba(1, 0, 0, 0.349);">
                                <a href="#">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-uppercase fs-15" style="color:white">সকল ট্রেনিং</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-book-line display-6" style="color:white"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="10" style="color:white">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- end col -->
                            <div class="col" style="background: linear-gradient(45deg, #52cf3f, #85e676); border-radius: 5px; box-shadow: 3px 3px 3px rgba(1, 0, 0, 0.349);">
                                <a href="#">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-uppercase fs-15" style="color:white">সর্বশেষ আর্থিক বছরের ট্রেনিং</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-book-mark-line display-6" style="color:white"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="10" style="color:white">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- end col -->
                            <div class="col" style="background: linear-gradient(45deg, #4099ff, #73b4ff); border-radius: 5px; box-shadow: 3px 3px 3px rgba(1, 0, 0, 0.349);">
                                <a href="#">
                                    <div class="mt-3 mt-lg-0 py-4 px-3">
                                        <h5 class="text-uppercase fs-15" style="color:white">সকল প্রদর্শনী</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-plant-line display-6" style="color:white"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="10" style="color:white">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- end col -->
                            <div class="col" style="background: linear-gradient(45deg, #ff5370, #ff869a); border-radius: 5px; box-shadow: 3px 3px 3px rgba(1, 0, 0, 0.349);">
                                <a href="#">
                                    <div class="mt-3 mt-lg-0 py-4 px-3">
                                        <h5 class="text-uppercase fs-15" style="color:white">সর্বশেষ আর্থিক বছরের প্রদর্শনী</h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-plant-fill display-6"style="color:white"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0"><span class="counter-value" data-target="10"style="color:white">0</span></h2>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
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


