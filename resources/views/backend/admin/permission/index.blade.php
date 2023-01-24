@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | পারমিশন লিস্ট')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">পারমিশন লিস্ট</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">পারমিশন লিস্ট</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">পারমিশন লিস্ট</h4>
                        <div class="flex-shrink-0">
                            @can('add_permission')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewPermission">
                                    নতুন পারমিশন যোগ করুন
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
                                        <th>পারমিশন নাম</th>
                                        <th>প্রস্তুতকারি</th>
                                        <th>প্রস্তুতির সময়   </th>
                                        <th class="text-center">অ্যাকশন </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($permissions->count() > 0)
                                        @php
                                            $i = ($permissions->perPage() * ($permissions->currentPage() - 1) +1);
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td class="text-center">{{conver_to_bn_number($i)}}</td>
                                                <td>{{$permission->name_bn ?? '-'}}</td>
                                                <td>{{$permission->createdUser ? $permission->createdUser->full_name : '-'}}</td>
                                                <td>
                                                    {{$permission->created_at ? conver_to_bn_date($permission->created_at->format('d-m-Y')) : '-'}}
                                                </td>
                                                <td class="text-center">
                                                    @can('edit_permission')
                                                        <button type="button" class="btn btn-sm btn-primary btn-icon waves-effect waves-light" title="সম্পাদনা" data-bs-toggle="modal" data-bs-target="#editPermission{{$permission->id}}">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </button>
                                                    @endcan

                                                    @can('delete_permission')
                                                        <a onclick="return confirm('আপনি কি নিশ্চিত?')" href="{{route('admin.permission.delete',$permission->id)}}" title="মুছে ফেলুন" type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-light">
                                                            <i class="las la-trash" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @endcan
                                                </td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp



                                            <div class="modal fade" id="editPermission{{$permission->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalgridLabel">পারমিশন সম্পাদনা</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('admin.permission.update', $permission->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row g-3">
                                                                    <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="lastName" class="form-label">পারমিশন নাম <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" name="name_en" value="{{$permission->name_en}}" required>
                                                                        </div>
                                                                    </div><!--end col-->
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
                    <div class="card-footer">
                        {{$permissions->links()}}
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





<!-- Grids in modals -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
    Launch Demo Modal
</button> --}}
<div class="modal fade" id="addNewPermission" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">নতুন পারমিশন যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.permission.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="lastName" class="form-label">পারমিশন নাম <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name_en" placeholder="পারমিশন নাম" required>
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
