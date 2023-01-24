{{-- Header section --}}
@include('backend.layouts.head')

    <!-- Begin page -->
    <div id="layout-wrapper">

    {{-- Top bar section --}}
    @include('backend.layouts.topbar')

        <!-- ========== App Menu ========== -->
        {{-- Sidebar section --}}
        @include('backend.layouts.sidebar')

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')

        {{-- Footer section --}}
        @include('backend.layouts.footer')