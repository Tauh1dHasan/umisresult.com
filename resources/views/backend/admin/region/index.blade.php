@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | অঞ্চল লিস্ট')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">অঞ্চল লিস্ট</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">অঞ্চল লিস্ট</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">অঞ্চল লিস্ট</h4>
                        <div class="flex-shrink-0">
                            @can('add_region')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    নতুন অঞ্চল যোগ করুন
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
                                        <th>অঞ্চল নাম</th>
                                        <th class="text-center">স্ট্যাটাস</th>
                                        <th>প্রস্তুতকারি</th>
                                        <th class="text-center">অ্যাকশন </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($regions->count() > 0)
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($regions as $region)
                                            <tr>
                                                <td class="text-center">{{conver_to_bn_number($i)}}</td>
                                                <td>{{$region->name ?? '-'}}</td>
                                                <td class="text-center">
                                                    @if ($region->status == 1)
                                                        <span class="badge bg-success">সক্রিয়</span>
                                                    @else
                                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                                    @endif
                                                </td>
                                                <td>{{$region->createdBy->full_name ?? '-'}}</td>
                                                <td class="text-center">

                                                    @can('view_region')
                                                        <a href="{{route('admin.region.view',$region->id)}}" title="দেখুন " type="button" class="btn btn-success btn-sm btn-icon waves-effect waves-light">
                                                            <i class="las la-eye" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @endcan

                                                    @can('edit_region')
                                                        <button title="সম্পাদনা" type="button" class="btn btn-info btn-sm btn-icon waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#editRegion{{$region->id}}">
                                                            <i class="las la-edit" style="font-size: 1.6em;"></i>
                                                        </button>
                                                    @endcan

                                                    @can('delete_region')
                                                        <a onclick="return confirm('আপনি কি নিশ্চিত?')" href="{{route('admin.region.delete',$region->id)}}" title="মুছে ফেলুন" type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-light">
                                                            <i class="las la-trash" style="font-size: 1.6em;"></i>
                                                        </a>
                                                    @endcan

                                                </td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp



                                            <div class="modal fade" id="editRegion{{$region->id}}" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalgridLabel">সম্পাদনা অঞ্চল</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('admin.region.update', $region->id)}}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row g-3">
                                                                    <div class="col-12">
                                                                        <div>
                                                                            <label for="নাম" class="form-label">অঞ্চল নাম <span style="color:red;">*</span></label>
                                                                            <input type="text" class="form-control" name="name" placeholder=" অঞ্চল নাম" value="{{$region->name}}" required>
                                                                        </div>
                                                                    </div><!--end col-->
                                                                    {{-- <div class="col-lg-12">
                                                                        <div>
                                                                            <label for="lastName" class="form-label">Order SL</label>
                                                                            <input type="number" class="form-control" name="sl" placeholder="Order SL" value="{{$region->sl}}">
                                                                        </div>
                                                                    </div><!--end col--> --}}
                                                                    <div class="col-lg-12">
                                                                        <div class="form-check form-switch form-switch-custom form-switch-success mb-3">
                                                                            <input @if($region->status == 1) checked @endif class="form-check-input" type="checkbox" role="switch" name="status" id="SwitchCheck11" value="1">
                                                                            <label class="form-check-label" for="SwitchCheck11">স্ট্যাটাস</label>
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
                            <div class="mt-3">
                                {{$regions->appends($_GET)->links()}}
                            </div>
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
                <h5 class="modal-title" id="exampleModalgridLabel">নতুন অঞ্চল যোগ করুন</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.region.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">

                        <div class="col-12">
                            <div>
                                <label for="Name" class="form-label">অঞ্চল নাম <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder=" অঞ্চল নাম" required>
                            </div>
                        </div><!--end col-->
                        {{-- <div class="col-lg-12">
                            <div>
                                <label for="lastName" class="form-label">Order SL</label>
                                <input type="number" class="form-control" name="sl" placeholder="Order SL">
                            </div>
                        </div><!--end col--> --}}
                        <div class="col-lg-12">
                            <div class="form-check form-switch form-switch-custom form-switch-success mb-3">
                                <input class="form-check-input" type="checkbox" role="switch" name="status" id="SwitchCheck11" value="1" checked>
                                <label class="form-check-label" for="SwitchCheck11">স্ট্যাটাস</label>
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

