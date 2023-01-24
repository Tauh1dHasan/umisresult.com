@extends('backend.layouts.app')
@section('title', ''.($global_setting->title ?? "").' | অফিসের বিবরণ')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">অফিসের বিবরণ</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">ড্যাশবোর্ড</a></li>
                            <li class="breadcrumb-item active">অফিসের বিবরণ</li>
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
                    <h4 class="card-title mb-0 flex-grow-1">অফিসের বিবরণ</h4>
                    <div class="flex-shrink-0">
                        {{-- <a href="{{url()->previous()}}" class="btn btn-primary">Back</a> --}}
                    </div>
                </div>
                <!-- end card header -->

                <div class="card-body">
                    <table class="table table-bordered table-striped m-auto" style="max-width: 600px">
                        <tbody>
                            <tr>
                                <th>অফিসের নাম:</th>
                                <td>{{$office->name}}</td>
                            </tr>
                            <tr>
                                <th>অঞ্চল:</th>
                                <td>{{$office->division ? $office->division->name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>জেলা:</th>
                                <td>{{$office->district ? $office->district->name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>উপজেলা:</th>
                                <td>{{$office->upazila ? $office->upazila->name : '-'}}</td>
                            </tr>
                            @if ($office->horticulture_center_id != NULL)
                                <tr>
                                    <th>Horticulture:</th>
                                    <td>{{$office->horticulture ? $office->horticulture->name : '-'}}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>স্ট্যাটাস:</th>
                                <td>
                                    @if ($office->status == 1)
                                        Active
                                    @elseif ($office->status == 2)
                                        Inactive
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>প্রস্তুতকারি:</th>
                                <td>{{$office->createdUser ? $office->createdUser->full_name : '-'}}</td>
                            </tr>
                            <tr>
                                <th>প্রস্তুতির সময়   :</th>
                                <td>
                                    {{conver_to_bn_date($office->created_at->format('d-m-Y'))}}
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
