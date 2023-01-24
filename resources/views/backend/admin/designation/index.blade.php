@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | পদের তালিকা')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">পদের তালিকা</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">পদের তালিকা</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">পদের তালিকা</h4>
                        <div class="flex-shrink-0">
                            @can('add_designation')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewDesignation">
                                    নতুন পদ যোগ করুন
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
                                        <th>পদ</th>
                                        <th>প্রস্তুতকারি</th>
                                        <th>প্রস্তুতির সময়   </th>
                                        <th class="text-center">অ্যাকশন </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($designations->count() > 0)
                                        @php
                                            $i = ($designations->perPage() * ($designations->currentPage() - 1) +1);
                                        @endphp
                                        @foreach ($designations as $designation)
                                            <tr>
                                                <td class="text-center">{{conver_to_bn_number($i)}}</td>
                                                <td>{{$designation->name ?? '-'}}</td>
                                                <td>{{$designation->createdUser ? $designation->createdUser->full_name : '-'}}</td>
                                                <td>
                                                    {{conver_to_bn_date($designation->created_at->format('d-m-Y'))}}
                                                </td>
                                                <td class="text-center">
                                                    @can('edit_designation')
                                                        <button type="button" title="সম্পাদনা" class="btn btn-icon btn-sm btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editdesignation{{$designation->id}}">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </button>
                                                    @endcan
                                                </td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp



                                            <div class="modal fade" id="editdesignation{{$designation->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalgridLabel">পদ সম্পাদনা</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('admin.designation.update', $designation->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row g-3">
                                                                    <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="lastName" class="form-label">পদ <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" name="name" value="{{$designation->name}}" required>
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
                        {{$designations->links()}}
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
<div class="modal fade" id="addNewDesignation" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">নতুন পদ যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.designation.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-12">
                            <div>
                                <label for="lastName" class="form-label">পদ<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder=" new designation" required>
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
