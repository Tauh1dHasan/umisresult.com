@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | Student Results')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Student Results</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Student Results</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Student Results</h4>
                        <div class="flex-shrink-0">
                            <a class="btn btn-warning" href="{{route('admin.studentResult.create')}}">
                                Add New Result
                            </a>
                        </div>
                    </div>
                    <!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">S.N</th>
                                        <th>Student Name</th>
                                        <th>Student ID</th>
                                        <th class="text-center">View</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($studentResults->count() > 0)
                                        @php
                                            $i = ($studentResults->perPage() * ($studentResults->currentPage() - 1) +1);
                                        @endphp
                                        @foreach ($studentResults as $studentResult)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td>{{$studentResult->name ?? '-'}}</td>
                                                <td>{{$studentResult->student_id ?? '-'}}</td>
                                                <td class="text-center">
                                                    
                                                    <a href="{{route('admin.studentResult.show', $studentResult->id)}}" title="View " type="button" class="btn btn-success btn-sm btn-icon waves-effect waves-light">
                                                        <i class="las la-eye" style="font-size: 1.6em;"></i>
                                                    </a>

                                                    <a href="{{route('admin.studentResult.delete', $studentResult->id)}}" title="Delete" type="button" class="btn btn-danger btn-sm btn-icon waves-effect waves-light">
                                                        <i class="las la-trash" style="font-size: 1.6em;"></i>
                                                    </a>

                                                </td>

                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%" class="text-center"><b>No Data Fount...!</b></td>
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
                        {{$studentResults->links()}}
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

