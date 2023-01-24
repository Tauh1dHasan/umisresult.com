@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | ব্যবহারকারি বিস্তারিত')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ব্যবহারকারি বিস্তারিত</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">ব্যবহারকারি বিস্তারিত</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">ব্যবহারকারি বিস্তারিত</h4>
                    <div class="flex-shrink-0">
                        {{-- <a href="{{url()->previous()}}" class="btn btn-primary">Back</a> --}}
                    </div>
                </div>




                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                        <img src="{{url('storage/userImages').'/'.$user->image}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="User Image">
                                    </div>
                                    <p style="color:rgb(4, 199, 4);">({{$user->role ? $user->role->display_name : ''}})</p>
                                    <h5 class="fs-16 mb-1">{{$user->full_name}} </h5>
                                    <p class="text-muted mb-0">{{$user->designation ? $user->designation->name : '-'}}</p>
                                </div>
                            </div>
                        </div>
                        <!--end card-->


                    </div>
                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card mt-2">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab" aria-selected="true">
                                            <i class="fas fa-home"></i> ব্যবহারকারি বিস্তারিত
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab" aria-selected="false">
                                            <i class="far fa-user"></i> পাসওয়ার্ড পরিবর্তন করুন
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>

                            <div class="card-body p-4">
                                <div class="tab-content">

                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <form action="javascript:void(0);">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="firstnameInput" class="form-label">নামের প্রথম অংশ</label>
                                                        <input type="text" class="form-control" id="firstnameInput" value="{{$user->first_name ?? ''}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="lastnameInput" class="form-label">নামের শেষাংশ</label>
                                                        <input type="text" class="form-control" id="lastnameInput" value="{{$user->last_name ?? ''}}" readonly>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="phonenumberInput" class="form-label">মোবাইল নম্বর</label>
                                                        <input type="text" class="form-control" id="phonenumberInput" value="{{$user->mobile ?? ''}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="emailInput" class="form-label">ই-মেইল</label>
                                                        <input type="email" class="form-control" id="emailInput" value="{{$user->email ?? '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label for="JoiningdatInput" class="form-label">ঠিকানা</label>
                                                        <input type="text" class="form-control" id="JoiningdatInput" value="{{$user->address ?? '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->


                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="cityInput" class="form-label">অঞ্চল</label>
                                                        <input type="text" class="form-control" id="cityInput" value="{{$user->division ? $user->division->name : '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="countryInput" class="form-label">জেলা</label>
                                                        <input type="text" class="form-control" id="countryInput" value="{{$user->district ? $user->district->name : '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="zipcodeInput" class="form-label">উপজেলা</label>
                                                        <input type="text" class="form-control" id="zipcodeInput" value="{{$user->upazila ? $user->upazila->name: '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="Office" class="form-label">অফিস</label>
                                                        <input type="text" class="form-control" id="Office" value="{{$user->office ? $user->office->name: '-'}}" disabled>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                @if ($user->horticulture)
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="Horticulture" class="form-label">হর্টিকালচার সেন্টার</label>
                                                            <input type="text" class="form-control" id="Horticulture" value="{{$user->horticulture ? $user->horticulture->name: '-'}}" disabled>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->updated_by)
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="updated_by" class="form-label">আপডেট করেছেন</label>
                                                            <input type="text" class="form-control" id="updated_by" value="{{$user->updatedUser ? $user->updatedUser->full_name : '-'}}" disabled>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="created_by" class="form-label">প্রস্তুতকারি</label>
                                                            <input type="text" class="form-control" id="created_by" value="{{$user->createdUser ? $user->createdUser->full_name : '-'}}" disabled>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($user->updated_at)
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="updated_at" class="form-label">আপডেট করা হয়েছে</label>
                                                            <input type="text" class="form-control" id="updated_at" value="{{conver_to_bn_date(date('d-m-Y h:i:s a', strtotime($user->updated_at)))}}" disabled>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="created_at" class="form-label">প্রস্তুতির সময়   </label>
                                                            
                                                            <input type="text" class="form-control" id="created_at" value="{{conver_to_bn_date($user->created_at->format('d-m-Y'))}}" disabled>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label for="created_by" class="form-label">স্ট্যাটাস</label>
                                                        @if ($user->status == 1)
                                                            <input style="color: white;" type="text" class="form-control bg-success" id="created_by" value="Active" disabled>
                                                        @else
                                                            <input style="color: white;" type="text" class="form-control bg-danger" id="created_by" value="ব্লকড" disabled>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    <!--end tab-pane-->



                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>






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
        $("#confirmpasswordInput").change(function(){
            let newPassword = $("#newpasswordInput").val();
            let confirmPassword = $("#confirmpasswordInput").val();
            if(newPassword != confirmPassword){
                $("#confirmpasswordInput").css("border", "1px solid red");
                $("#changePassButton").attr("disabled", true);
            }else{
                $("#confirmpasswordInput").css("border", "1px solid #ced4da");
                $("#changePassButton").attr("disabled", false);
            }
        });

    </script>
    <script>
        $('[href*="{{$menu_expand}}"]').addClass('active');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').addClass('show');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').parent().find('.nav-link').attr('aria-expanded','true');
    </script>
@endpush
