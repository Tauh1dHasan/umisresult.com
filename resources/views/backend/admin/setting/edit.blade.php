@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | সেটিংস সম্পাদনা')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">সেটিংস সম্পাদনা</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">সেটিংস সম্পাদনা</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">সেটিংস সম্পাদনা</h4>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <form id="save_training" action="{{route('admin.setting.update',$setting->id ?? 1)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-6">
                                <div class="row g-3">

                                    <div class="col-md-6">
                                        <div>
                                            <label for="নাম" class="form-label">শিরোনাম<span
                                                    style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="title" placeholder="শিরোনাম"
                                                value="{{$setting->title ?? ''}}" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div>
                                            <label for="নাম" class="form-label">উপ-শিরোনাম<span
                                                    style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="sub_title" placeholder="উপ-শিরোনাম"
                                                value="{{$setting->sub_title ?? ''}}" required>
                                        </div>
                                    </div><!--end col-->
                                    
                                    <div class="col-md-6">
                                        <div>
                                            <label for="নাম" class="form-label">ই-মেইল<span
                                                    style="color:red;">*</span></label>
                                            <input type="email" class="form-control" name="email" placeholder="ই-মেইল"
                                                value="{{$setting->email ?? ''}}" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div>
                                            <label for="নাম" class="form-label">ফোন<span
                                                    style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="mobile" placeholder="ফোন"
                                                value="{{$setting->mobile ?? ''}}" required>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <div>
                                            <label for="নাম" class="form-label">লোগো</label>
                                            <input type="file" class="form-control" name="logo" data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-6">
                                        <img style="max-height: 60px;max-width:150px;" class="img-thumbnail" src="{{asset('storage/logo')}}/{{$setting->logo ?? ''}}" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                                        </div>
                                    </div>
                                    <!--end col-->
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
{{-- @push('css')
@endpush --}}
{{-- @push('script')

@endpush --}}
