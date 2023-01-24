<div class="dropdown topbar-head-dropdown ms-1 header-item">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false" title="নোটিফিকেশন">
        <i class='bx bx-bell fs-22' style="color: white;"></i>
        <span
            class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">{{$notifications->total()}}<span
                class="visually-hidden">unread messages</span></span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">

        <div class="dropdown-head bg-primary bg-pattern rounded-top">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 fs-16 fw-semibold text-white">বার্তা</h6>
                    </div>
                    <div class="col-auto dropdown-tabs">
                        {{-- <span class="badge badge-soft-light fs-13"> 4 New</span> --}}
                    </div>
                </div>
            </div>

            <div class="px-2 pt-2">
                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                    id="notificationItemsTab" role="tablist">

                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#messages-tab" role="tab"
                            aria-selected="true">
                            বার্তা
                        </a>
                    </li>

                </ul>
            </div>

        </div>

        <div class="tab-content" id="notificationItemsTabContent">


            <div class="tab-pane fade show active py-2 ps-2" id="messages-tab" role="tabpanel"
                aria-labelledby="messages-tab">
                <div data-simplebar style="max-height: 300px;" class="pe-2">
                    @foreach ($notifications as $notification)
                        <div class="text-reset notification-item d-block dropdown-item">
                            <div class="d-flex">
                                <div class="flex-1">
                                    <a href="{{route('admin.notification.read_view',[$notification->model,$notification->reference_id])}}" class="stretched-link">
                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{$notification->title}}</h6>
                                    </a>
                                    <div class="fs-13 text-muted">
                                        <p class="mb-1">পাঠিয়েসেন: {{$notification->createdBy->full_name}}</p>
                                    </div>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                        <span><i class="mdi mdi-clock-outline"></i>
                                            {{conver_to_bn_date($notification->created_at->format('d-m-Y'))}}
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
