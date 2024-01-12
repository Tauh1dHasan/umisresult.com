@include('frontend.layouts.head')
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <div class="loader-inner-cirle"></div>
            </div>
        </div>
        <!--loader end-->
        <!-- main start  -->
        <div id="main">
            <!-- header -->
            @include('frontend.layouts.topbar')
            <!-- header end-->

            <!-- wrapper-->
            <div id="wrapper">
                <!-- content-->
                <div class="content">
                    <!--section  -->

                    @yield('content')
                    
                </div>
                <!--content end-->
            </div>
            <!-- wrapper end-->
            <!--footer -->
            @include('frontend.layouts.footer')