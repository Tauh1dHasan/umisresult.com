@extends('frontend.layout.master')

@section('content')
    <div class="container">
        @include('frontend.layout.topbar')

        <div class="row mt-4">
            <div class="col-md-9"> 
                <div class="mainwrapper" id="left-content">

                    <!-- slider -->
                    <div class="row">
                        <div class="col-md-12"> 
                            <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo" data-slide-to="1"></li>
                                    <li data-target="#demo" data-slide-to="2"></li>
                                </ol>
                                
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('frontend/img/padmabanner.jpg')}} " alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('frontend/img/padmabanner.jpg')}} " alt="">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('frontend/img/padmabanner.jpg')}} " alt="">
                                    </div>
                                </div>
                                
                                <!-- Left and right controls -->
                                <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a> -->
                                
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12"> 
                            <div class="block">
                                <h5 class="bk-org title"> "মুজিববর্ষের অঙ্গীকার, নিরাপদ সবজি উপহার" </h5>
                            </div>
    
                            <div class="typewriter">
                                <h3>
                                    <h3>
                                        <a href="#">
                                            <span style="color:#0000FF">কৃষি ক্ষেত্রে গুরুত্বপূর্ণ ব্যক্তি (এআইপি)২০২১ এর নীতিমালা, মনোনয়ন ফরম ও বিজ্ঞপ্তি</span>
                                        </a>
                                    </h3> 
                                </h3>
                            </div>
                        </div>
                    </div>
                            
                    <!-- notice board section -->
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="" id="notice-board">
                                <div class="notice-board-bg">
                                    <h2>নোটিশ বোর্ড</h2>
    
                                    <div id="notice-board-ticker">
                                        <ul>
                                            <li> <a href="#">বার্ষিক কর্মসম্পাদন চুক্তি ২০২২-২৩ এর কর্মসম্পাদন সূচক ও লক্ষ্যমাত্রা সংশোধন প্রস্তাব...</a> </li>
                                            <li> <a href="#">বার্ষিক কর্মসম্পাদন চুক্তি ২০২২-২৩ এর কর্মসম্পাদন সূচক ও লক্ষ্যমাত্রা সংশোধন এর বিষয়ে...</a> </li>
                                            <li> <a href="#">কৃষি সম্প্রসারণ অধিদপ্তরের আওতাধীন আঞ্চলিক কার্যালয়ের জাতীয় শুদ্ধাচার কৌশল বাস্তবায়ন ...</a> </li>
                                            <li> <a href="#">King Bhumibol World Soil Day(WSDA) Award</a> </li>
                                            <li> <a href="#">নতুন অফিস সময় সূচী সংক্রান্ত</a> </li>
                                        </ul> 
                                        <a class="btn right" href="#">সকল</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- box content section -->
                    <div class="row">
                        <div class="col-md-6 mb-2" style="padding-right: 0;"> 
                            <div id="box-1" class="service-box box">
                                <h4>আমাদের বিষয়ে</h4> <img src="{{ asset('frontend/img/service_box/1.png') }}" alt="" width="110" height="" />
                                <ul class="caption fade-caption" style="margin:0">
                                    <li> <a href="#">অফিসার (প্রধান কার্যালয়)</a> </li>
                                    <li> <a href="#">মাঠ পর্যায়ের কার্যালয় সমূহ</a> </li>
                                    <li> <a href="#">প্রকল্প ও কর্মসূচি অফিসার</a> </li>
                                    <li> <a href="#">সাংগঠনিক কাঠামো</a> </li>
                                </ul>
                            </div>
                        </div>
                            
                        <div class="col-md-6 mb-3" style="padding-left: 0;"> 
                            <div id="box-1" class="service-box box">
                                <h4>আদেশ/বিজ্ঞপ্তি/প্রজ্ঞাপন/পরিপত্র</h4> <img src="{{ asset('frontend/img/service_box/2.png') }}" alt="" width="110" height="" />
                                <ul class="caption fade-caption" style="margin:0">
                                    <li> <a href="#">বদলী/পদায়ন/পদোন্নতি</a> </li>
                                    <li> <a href="#">পাসপোর্ট এর অনাপত্তি পত্র</a> </li>
                                    <li> <a href="#">ছুটি/আর্থিক ক্ষমতা/অফিস আদেশ</a> </li>
                                    <li> <a href="#">দরপত্র/ইওআই/নিয়োগ বিজ্ঞপ্তি</a> </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3" style="padding-right: 0;"> 
                            <div id="box-1" class="service-box box">
                                <h4>আমাদের বিষয়ে</h4> <img src="{{ asset('frontend/img/service_box/1.png') }}" alt="" width="110" height="" />
                                <ul class="caption fade-caption" style="margin:0">
                                    <li> <a href="#">অফিসার (প্রধান কার্যালয়)</a> </li>
                                    <li> <a href="#">মাঠ পর্যায়ের কার্যালয় সমূহ</a> </li>
                                    <li> <a href="#">প্রকল্প ও কর্মসূচি অফিসার</a> </li>
                                    <li> <a href="#">সাংগঠনিক কাঠামো</a> </li>
                                </ul>
                            </div>
                        </div>
                            
                        <div class="col-md-6 mb-2" style="padding-left: 0;"> 
                            <div id="box-1" class="service-box box">
                                <h4>আদেশ/বিজ্ঞপ্তি/প্রজ্ঞাপন/পরিপত্র</h4> <img src="{{ asset('frontend/img/service_box/2.png') }}" alt="" width="110" height="" />
                                <ul class="caption fade-caption" style="margin:0">
                                    <li> <a href="#">বদলী/পদায়ন/পদোন্নতি</a> </li>
                                    <li> <a href="#">পাসপোর্ট এর অনাপত্তি পত্র</a> </li>
                                    <li> <a href="#">ছুটি/আর্থিক ক্ষমতা/অফিস আদেশ</a> </li>
                                    <li> <a href="#">দরপত্র/ইওআই/নিয়োগ বিজ্ঞপ্তি</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
    
                    <!-- video section -->
                    <div class="row mt-3">
                        <div class="col-md-12"> 
                            <div class="block">
                                <h5 class="bk-org title"> আশ্রয়ণের অধিকার শেখ হাসিনার উপহার </h5>
                                <table border="0" cellpadding="1" cellspacing="1" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="width:33%">
                                                <iframe width="100%" src="https://www.youtube.com/embed/l7G3TPz6P24" title="আশ্রয়ণের অধিকার শেখ হাসিনার উপহার" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td style="width:33%">
                                                <iframe width="100%" src="https://www.youtube.com/embed/z6llDxY5JFs" title="আশ্রয়ণের  অধিকার শেখ হাসিনার উপহার" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                            <td style="width:33%">
                                                <iframe width="100%" src="https://www.youtube.com/embed/MvTLqrU9ZbQ" title="আশ্রয়ণের অধিকার শেখ হাসিনার উপহার" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- sidebar -->
            @include('frontend.layout.sidebar')
        </div>
    </div>
@endsection