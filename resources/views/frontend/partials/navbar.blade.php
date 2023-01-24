<div class="topbar">
    <div id="div-lang">
        <div class="row">
            <div class="col-6">
                <a class="np" target="__blank" href="http://www.dae.gov.bd/" style="padding-top: 5px;"> কৃষি সম্প্রসারণ অধিদপ্তর </a>
            </div>

            <div class="col-6">
                <div id="div-lang-sel" style="padding-right: 3%;">
                    <a class="np mr-3" target="__blank" href="{{ route('login') }}"> লগইন </a>
                </div>
            </div>
        </div>
    </div>

    <div class="header-top-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-3">
                    <div class="header-logo">
                        <div id="site-info" class="clearfix">
                            <a title="Home" href=""> <img alt="Home" src="{{ asset('frontend/img/logo/logo.png') }}"> </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-7 col-5">
                    <div class="header-top-title text-center clearfix" id="site-info">
                        <h4 class="text-white font-weight-bold mobileHeading"> কাজুবাদাম ও কফি গবেষণা, উন্নয়ন ও সম্প্রসারণ প্রকল্প <br> <span class="font-weight-normal"> কৃষি সম্প্রসারণ অধিদপ্তর <br> কৃষি মন্ত্রণালয় </span></h4>
                    </div>
                </div>

                <div class="col-md-2 col-sm-3 col-4">
                    <div class="header-logo header-logo-right text-right mr-3">
                        <div id="site-info" class="clearfix">
                            <a title="Home" href=""> <img alt="Home" src="{{ asset('frontend/img/logo/logo.jpg') }}"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mob_nav">
    <div id="newNavigation"></div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="sixteen columns" id="jmenu" style="margin-bottom: 10px;">
            <div class="sixteen columns"> 
                <a href="javascript:;" class="show-menu menu-head"> মেনু নির্বাচন করুন</a>
                <div role="navigation" id="dawgdrops">
                    <ul class="meganizr mzr-slide mzr-responsive">
                        <!-- Build The Menu -->
                        <li class="col0 ">
                            <a title="Home" href="{{route('home')}}" style="padding: 5px 15px;">
                                <img src="{{ asset('frontend/img/home_dark.png') }}" alt="Home">
                            </a>
                        </li>
                        <x-menu/>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
