<header id="page-topbar">
    {{-- <div class="layout-width" style="background: linear-gradient(45deg, #c27e1e, #c69c60);"> --}}
    <div class="layout-width" style="background: #b56b32;">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{route('admin.index')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('backend-assets/assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('backend-assets/assets/images/logo-dark.png')}}" alt="" height="17">
                        </span>
                    </a>

                    <a href="{{route('admin.index')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('backend-assets/assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('backend-assets/assets/images/logo-light.png')}}" alt="" height="17">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span style="background: white;"></span>
                        <span style="background: white;"></span>
                        <span style="background: white;"></span>
                    </span>
                </button>

            </div>

            <div class="d-flex text-center">
                <h5 class="text-white mt-2">কাজুবাদাম ও কফি গবেষণা, উন্নয়ন ও সম্প্রসারণ প্রকল্প <br> <span style="font-size: 0.9em;">কৃষি সম্প্রসারণ অধিদপ্তর</span>  <br> <span style="font-size: 0.8em;">কৃষি মন্ত্রণালয়</span> </h5><br>
            </div>

            <div class="d-flex align-items-center">

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen" title="ফুলস্ক্রিন">
                        <i class='bx bx-fullscreen fs-22' style="color: white;"></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode" title="ডার্ক মুড">
                        <i class='bx bx-moon fs-22' style="color: white;"></i>
                    </button>
                </div>

                <x-notification/>

                <div class="dropdown ms-sm-3 header-item topbar-user" style="background: #b56b32;">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            
                            @if (auth()->user()->image)
                                <img class="rounded-circle header-profile-user"
                            src="{{url('storage/userImages').'/'.auth()->user()->image}}" alt="Header Avatar">
                            @else
                                <div class="rounded-circle header-profile-user no-user-image-found">
                                    <i class="ri-shield-user-line"></i>
                                </div>
                            @endif
                            
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium text-white user-name-text">{{auth()->user()->first_name}}</span>
                                <span class="d-none d-xl-block ms-1 fs-12 text-white user-name-sub-text">
                                    {{auth()->user()->designation->name ?? '-'}}
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">স্বাগত {{auth()->user()->first_name}}</h6>
                        <a class="dropdown-item" href="{{route('admin.edit_profile')}}">
                            <i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> 
                            <span class="align-middle">প্রোফাইল</span>
                        </a>

                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> 
                            <span class="align-middle" data-key="t-logout">লগ-আউট</span>
                        </a>

                        <div class="d-none">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
