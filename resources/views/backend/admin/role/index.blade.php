@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | রোল লিস্ট')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">রোল লিস্ট</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">রোল লিস্ট</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">রোল লিস্ট</h4>
                        <div class="flex-shrink-0">
                            @can('add_role')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    নতুন রোল তৈরি করুন
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
                                        <th>রোল নাম</th>
                                        <th class="text-center">স্ট্যাটাস</th>
                                        <th>প্রস্তুতকারি</th>
                                        <th>প্রস্তুতির সময়   </th>
                                        <th class="text-center">অ্যাকশন </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($roles->count() > 0)
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td class="text-center">{{conver_to_bn_number($i)}}</td>
                                                <td>{{$role->display_name ?? '-'}}</td>
                                                <td class="text-center">
                                                    @if ($role->status == 1)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td>{{$role->createdUser ? $role->createdUser->full_name : '-'}}</td>
                                                <td>
                                                    {{conver_to_bn_date($role->created_at->format('d-m-Y'))}}
                                                </td>
                                                <td class="text-center">
                                                    @can('edit_role')
                                                        <button type="button" class="btn btn-primary btn-sm btn-icon waves-effect waves-light" data-bs-toggle="modal" title="সম্পাদনা" data-bs-target="#editRole{{$role->id}}">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </button>
                                                    @endcan

                                                    @can('delete_role')
                                                        @if ($role->status == 1)
                                                            <a href="{{route('admin.role.disable', $role->id)}}" title="নিষ্ক্রিয় করুন" class="btn btn-sm btn-danger btn-icon waves-effect waves-light">
                                                                <i class="las la-times-circle" style="font-size: 1.6em;"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{route('admin.role.active', $role->id)}}" title="সক্রিয় করুন" class="btn btn-sm btn-success btn-icon waves-effect waves-light">
                                                                <i class="las la-check" style="font-size: 1.6em;"></i>
                                                            </a>
                                                        @endif
                                                    @endcan
                                                </td>


                                            </tr>
                                            @php
                                                $i++;
                                            @endphp



                                            <div class="modal fade" id="editRole{{$role->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalgridLabel">রোল সম্পাদনা</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('admin.role.update', $role->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row g-3">
                                                                    <div class="col-xxl-12">
                                                                        <div>
                                                                            <label for="roleName" class="form-label">রোল নাম <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" name="roleName" id="roleName" value="{{$role->display_name ?? '-'}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xxl-12">
                                                                        <div>
                                                                            <label for="roleName" class="form-label">সিরিয়াল<span style="color:red;">*</span></label>
                                                                            <input type="number" class="form-control" name="sl" id="sl" placeholder="সিরিয়াল" required value="{{$role->sl}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">বাতিল করুন</button>
                                                                            <button type="submit" class="btn btn-primary">আপডেট করুন</button>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                </div><!--end row-->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




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
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>





<!-- Grids in modals -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
    Launch Demo Modal
</button> --}}
<div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">নতুন রোল তৈরি করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.role.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <div>
                                <label for="roleName" class="form-label">রোল নাম <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="roleName" id="roleName" placeholder="রোল নাম" required>
                            </div>
                        </div>
                        <div class="col-xxl-12">
                            <div>
                                <label for="roleName" class="form-label">সিরিয়াল<span style="color:red;">*</span></label>
                                <input type="number" class="form-control" name="sl" id="sl" placeholder="সিরিয়াল" required>
                            </div>
                        </div>
                        
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
