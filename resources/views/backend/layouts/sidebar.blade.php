<div class="app-menu navbar-menu" style="background: linear-gradient(45deg, #5f7ad0, #344681);">
{{-- <div class="app-menu navbar-menu" style="background: linear-gradient(70deg, #24bbae, #02796f);"> --}}
{{-- <div class="app-menu navbar-menu" style="background: linear-gradient(70deg, #ce9538, #a47427);"> --}}
{{-- <div class="app-menu navbar-menu"> --}}
{{-- <div class="app-menu navbar-menu" style="background: #b56b32;"> --}}
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-dark mt-2">
            <span class="logo-sm">
                <img src="{{asset('storage/logo')}}/{{$global_setting->logo ?? ''}}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{asset('storage/logo')}}/{{$global_setting->logo ?? ''}}" alt="" width="100">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('admin.index')}}" class="logo logo-light mt-2">
            <span class="logo-sm">
                <img src="{{asset('storage/logo')}}/{{$global_setting->logo ?? ''}}" alt="" height="50">
            </span>
            <span class="logo-lg">
                <img src="{{asset('storage/logo')}}/{{$global_setting->logo ?? ''}}" alt="" width="100">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav mt-4" id="navbar-nav">
                {{-- <li class="menu-title"><span data-key="t-menu">তালিকা</span></li> --}}

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('admin.index')}}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">ড্যাশবোর্ড</span>
                    </a>
                </li>

                @can('manage_role_permission')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#rolePermission" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="rolePermission">
                            <i class="ri-shield-keyhole-line"></i> <span data-key="t-dashboards">ম্যানেজ ইউজার এক্সেস</span>
                        </a>

                        <div class="collapse menu-dropdown" id="rolePermission">
                            <ul class="nav nav-sm flex-column">
                                @can('user_management')
                                    <li class="nav-item">
                                        <a href="{{route('admin.user.index')}}" class="nav-link">ইউজার লিস্ট</a>
                                    </li>
                                @endcan
                                @can('all_roles')
                                    <li class="nav-item">
                                        <a href="{{route('admin.role.index')}}" class="nav-link">রোল লিস্ট</a>
                                    </li>
                                @endcan
                                @can('all_permissions')
                                    <li class="nav-item">
                                        <a href="{{route('admin.permission.index')}}" class="nav-link">পারমিশন লিস্ট</a>
                                    </li>
                                @endcan
                                @can('assign_permission_list')
                                    <li class="nav-item">
                                        <a href="{{route('admin.rolePermission.index')}}" class="nav-link">পারমিশন প্রদান</a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('office_management')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#office" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="office">
                            <i class="ri-building-line"></i> <span data-key="t-dashboards">অফিস ম্যানেজমেন্ট</span>
                        </a>
                        <div class="collapse menu-dropdown" id="office">
                            <ul class="nav nav-sm flex-column">
                                @can('manage_fiscal_year')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{route('admin.fiscal_year.index')}}">
                                            <span data-key="t-dashboards">অর্থবছর</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('manage_office')
                                    <li class="nav-item">
                                        <a href="{{route('admin.office.index')}}" class="nav-link" data-key="t-crm">অফিসের লিস্ট</a>
                                    </li>
                                @endcan
                                @can('all_designations')
                                    <li class="nav-item">
                                        <a href="{{route('admin.designation.index')}}" class="nav-link" data-key="t-crm">পদের তালিকা</a>
                                    </li>
                                @endcan
                            
                            </ul>
                        </div>
                    </li>
                @endcan

                @can('manage_location')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#location_management" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="location_management">
                            <i class="ri-map-pin-line"></i> <span data-key="t-dashboards">ম্যানেজ লোকেশন</span>
                        </a>
                        <div class="collapse menu-dropdown" id="location_management">
                            <ul class="nav nav-sm flex-column">
                                @can('manage_region')
                                    <li class="nav-item">
                                        <a href="{{route('admin.region.index')}}" class="nav-link" data-key="t-crm">অঞ্চল লিস্ট</a>
                                    </li>
                                @endcan

                                @can('manage_district')
                                    <li class="nav-item">
                                        <a href="{{route('admin.district.index')}}" class="nav-link" data-key="t-crm">জেলা লিস্ট</a>
                                    </li>
                                @endcan

                                @can('manage_upazila')
                                    <li class="nav-item">
                                        <a href="{{route('admin.upazila.index')}}" class="nav-link" data-key="t-crm">উপজেলা লিস্ট</a>
                                    </li>
                                @endcan

                            </ul>
                        </div>
                    </li>
                @endcan

                @can('website_setting')
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#website_setting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="website_setting">
                            <i class="ri-home-line"></i> <span data-key="t-dashboards">ওয়েবসাইট সেটিংস</span>
                        </a>

                        <div class="collapse menu-dropdown" id="website_setting">
                            <ul class="nav nav-sm flex-column">
                                @can('setting_management')
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="{{route('admin.setting.index')}}">
                                            <span data-key="t-dashboards">অর্গানাইজেশন সেটিংস</span>
                                        </a>
                                    </li>
                                @endcan
                                
                            </ul>
                        </div>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
