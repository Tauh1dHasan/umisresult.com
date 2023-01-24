@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | অর্থবছর বিস্তারিত')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">অর্থবছর বিস্তারিত</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">অর্থবছর বিস্তারিত</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">অর্থবছর বিস্তারিত</h4>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <table class="table table-bordered table-striped m-auto" style="max-width: 600px">
                        <tbody>
                            <tr>
                                <td>অর্থবছর:</td>
                                <td>{{$fiscal_year->year}}</td>
                            </tr>
                            <tr>
                                <td>স্ট্যাটাস:</td>
                                <td>
                                    @if ($fiscal_year->status == 1)
                                        <span class="badge bg-success">সক্রিয়</span>
                                    @else
                                        <span class="badge bg-danger">নিষ্ক্রিয়</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    প্রস্তুতকারি
                                </td>
                                <td>
                                    {{$fiscal_year->createdBy->full_name ?? ''}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    আপডেট করেছেন
                                </td>
                                <td>
                                    {{$fiscal_year->updatedBy->full_name ?? ''}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        $('[href*="{{$menu_expand}}"]').addClass('active');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').addClass('show');
        $('[href*="{{$menu_expand}}"]').closest('.menu-dropdown').parent().find('.nav-link').attr('aria-expanded','true');
    </script>
@endpush
