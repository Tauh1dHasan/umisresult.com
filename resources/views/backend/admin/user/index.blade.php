@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | ব্যবহারকারি লিস্ট')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ব্যবহারকারি লিস্ট</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">ব্যবহারকারি লিস্ট</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">ব্যবহারকারি লিস্ট</h4>
                        <div class="flex-shrink-0">
                            @can('add_user')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    নতুন ব্যবহারকারি যোগ করুন
                                </button>
                            @endcan
                        </div>
                    </div>
                    <!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">ক্র.নং</th>
                                        <th>নাম</th>
                                        <th>ই-মেইল</th>
                                        <th class="text-center">মোবাইল</th>
                                        <th>রোল</th>
                                        <th class="text-center">স্ট্যাটাস</th>
                                        <th>অফিস</th>
                                        <th>প্রস্তুতকারি</th>
                                        <th>প্রস্তুতির সময়   </th>
                                        <th class="text-center">অ্যাকশন </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($users->count() > 0)
                                        @php
                                            $i = ($users->perPage() * ($users->currentPage() - 1) +1);
                                        @endphp
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{conver_to_bn_number($i)}}</td>
                                                <td>{{$user->full_name ?? '-'}}</td>
                                                <td>{{$user->email ?? '-'}}</td>
                                                <td class="text-center">{{$user->mobile ?? '-'}}</td>
                                                <td>{{$user->role ? $user->role->display_name : '-'}}</td>
                                                <td class="text-center">
                                                    @if ($user->status == 1)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">ব্লকড</span>
                                                    @endif
                                                </td>
                                                <td>{{$user->office ? $user->office->name : '-'}}</td>
                                                <td>{{$user->createdUser ? $user->createdUser->full_name : '-'}}</td>
                                                <td>
                                                    {{conver_to_bn_date($user->created_at->format('d-m-Y'))}}
                                                </td>
                                                <td class="text-center">

                                                    @can('view_user')
                                                        <a href="{{route('admin.user.show', $user->id)}}" title="দেখুন" class="btn btn-sm btn-info btn-icon waves-effect waves-light">
                                                            <i class="las la-eye" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @endcan

                                                    
                                                    @can('edit_user')
                                                        <a href="{{route('admin.user.edit', $user->id)}}" title="সম্পাদনা" class="btn btn-sm btn-primary btn-icon waves-effect waves-light">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @elsecan('edit_user_minimum')
                                                        <a href="{{route('admin.user.editUserMinimum', $user->id)}}" title="সম্পাদনা" class="btn btn-sm btn-primary btn-icon waves-effect waves-light">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @endcan

                                                    @can('block_user')
                                                        @if ($user->status == 1)
                                                            <a onclick="return confirm('Are you sure, you want to block the user?')" href="{{route('admin.user.block', $user->id)}}" title="ব্লক" class="btn btn-sm btn-danger btn-icon waves-effect waves-light">
                                                                <i class="las la-times-circle" style="font-size: 1.6em;"></i>
                                                            </a>
                                                        @else
                                                            <a onclick="return confirm('Are you sure, you want to unblock the user?')" href="{{route('admin.user.active', $user->id)}}" title="Active" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
                                                                <i class="las la-check" style="font-size: 1.6em;"></i>
                                                            </a>
                                                        @endif
                                                    @endcan

                                                </td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%" class="text-center"><b>কোন তথ্য পাওয়া যায়নি</b></td>
                                        </tr>
                                    @endif

                                </tbody>
                                <!-- end tbody -->
                            </table>
                            <!-- end table -->
                        </div>
                        <!-- end table responsive -->
                    </div>
                    <!-- end card body -->
                    <div class="card-footer">
                        {{$users->links()}}
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





<!-- Add new user modal -->

<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog" style="max-width: 650px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">নতুন ব্যবহারকারী যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label for="first_name" class="form-label">নামের প্রথম অংশ<span style="color:red;">*</span></label>
                                <input id="first_name" type="text" class="form-control" name="first_name" placeholder=" নামের প্রথম অংশ" value="{{old('first_name')}}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="last_name" class="form-label">নামের শেষাংশ<span style="color:red;">*</span></label>
                                <input id="last_name" type="text" class="form-control" name="last_name" placeholder=" নামের শেষাংশ" value="{{old('last_name')}}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="email" class="form-label">ই-মেইল<span style="color:red;">*</span></label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="আপনার বৈধ ইমেল ঠিকানা" value="{{old('email')}}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="mobile" class="form-label">মোবাইল<span style="color:red;">*</span></label>
                                <input id="mobile" type="text" class="form-control" name="mobile" placeholder=" আপনার বৈধ মোবাইল নম্বর" value="{{old('mobile')}}" required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="role_id" class="form-label">--রোল নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">--রোল নির্বাচন করুন--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="designation_id" class="form-label">--পদ নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="designation_id" id="designation_id" class="form-control">
                                    <option value="">--পদ নির্বাচন করুন--</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{$designation->id}}">{{$designation->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div class="form-check form-switch form-switch-custom form-switch-success mb-3">
                                <label for="is_horticulture" class="form-label">হর্টিকালচার ব্যবহারকারী ?</label>
                                <input class="form-check-input" type="checkbox" role="switch" name="is_horticulture" id="is_horticulture">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6 horticultureCenterDiv">
                            <div>
                                <label for="horticulture_center_id" class="form-label">--হর্টিকালচার সেন্টার--<span style="color:red;">*</span></label>
                                <select name="horticulture_center_id" id="horticulture_center_id" class="form-control">
                                    <option value="">--হর্টিকালচার সেন্টার--</option>
                                    @foreach ($horticultureCenteres as $horticultureCenter)
                                        <option value="{{$horticultureCenter->id}}">{{$horticultureCenter->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="office_id" class="form-label">--অফিস নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="office_id" id="office_id" class="form-control">
                                    <option value="">--নির্বাচন করুন--</option>
                                    @foreach ($offices as $office)
                                        <option value="{{$office->id}}">{{$office->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-xxl-6">
                            <div>
                                <label for="division_id" class="form-label">--অঞ্চল নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="division_id" id="division_id" class="form-control">
                                    <option value="">--নির্বাচন করুন--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="district_id" class="form-label">--জেলা নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="district_id" id="district_id" class="form-control">
                                    <option value="">--নির্বাচন করুন--</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="upazila_id" class="form-label">--উপজেলা নির্বাচন করুন--<span style="color:red;">*</span></label>
                                <select name="upazila_id" id="upazila_id" class="form-control">
                                    <option value="">--নির্বাচন করুন--</option>
                                </select>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div>
                                <label for="address" class="form-label">ঠিকানা<span style="color:red;">*</span></label>
                                <input id="address" type="text" class="form-control" name="address" placeholder=" আপনার বর্তমান ঠিকানা" value="{{old('address')}}" required>
                            </div>
                        </div><!--end col-->
                        
                        <div class="col-xxl-6">
                            <div>
                                <label for="image" class="form-label">ব্যবহারকারি ছবি </label>
                                <input id="image" type="file" class="form-control" name="image">
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="password" class="form-label">পাসওয়ার্ড<span style="color:red;">*</span></label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="পাসওয়ার্ড লিখুন" @error('password')@enderror required>
                            </div>
                        </div><!--end col-->
                        <div class="col-xxl-6">
                            <div>
                                <label for="confirm_password" class="form-label">পাসওয়ার্ড নিশ্চিত করুন<span style="color:red;">*</span></label>
                                <input id="confirm_password" type="password" class="form-control" name="password_confirmation" placeholder=" পাসওয়ার্ড নিশ্চিৎ করুন" @error('password')@enderror required>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">বাতিল করুন</button>
                                <button type="submit" class="btn btn-primary">সংরক্ষণ করুন</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

