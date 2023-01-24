@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | Create গ্রাম')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create গ্রাম</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">Create গ্রাম</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">Create গ্রাম</h4>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <form style="max-width: 500px" action="{{route('admin.village.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            <div class="col-12">
                                <div>
                                    <label for="নাম" class="form-label">গ্রাম নাম <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" name="name" placeholder=" গ্রাম নাম" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-12">
                                <div>
                                    <label for="region" class="form-label">Select ব্লক <span style="color:red;">*</span></label>
                                    <select id="my-select" class="form-control select2" name="block_id" required>
                                        <option value="">নির্বাচন করুন</option>
                                        @foreach ($blocks as $block)
                                            <option value="{{$block->id}}">{{$block->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div>
                                    <label for="lastName" class="form-label">Order SL</label>
                                    <input type="number" class="form-control" name="sl" placeholder="Order SL">
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="form-check form-switch form-switch-custom form-switch-success mb-3">
                                    <input class="form-check-input" type="checkbox" role="switch" name="status" id="SwitchCheck11" value="1" checked>
                                    <label class="form-check-label" for="SwitchCheck11">স্ট্যাটাস</label>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary">সংরক্ষণ করুন</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
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
@push('script')
    <script>
        // $('[href*="{{$menu_expand}}"]').addClass('active');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').addClass('show');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').parent().find('.nav-link').attr('aria-expanded','true');
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
