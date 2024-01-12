@extends('frontend.layouts.app')

@section('content')

<section class="hero-section"   data-scrollax-parent="true">

    <div class="bg-tabs-wrap">
        <div class="bg-parallax-wrap" data-scrollax="properties: { translateY: '200px' }">
            <div class="bg bg_tabs"  data-bg="{{asset('frontend/images/bg/hero/1.jpg')}}"></div>
            <div class="overlay op7"></div>
        </div>
    </div>

    <div class="container small-container" style="height: 100vh;">
        <div class="intro-item fl-wrap">
            <span class="section-separator"></span>
            <div class="bubbles">
                <h1>Search Your Result Here</h1>
            </div>
        </div>
        <!-- main-search-input-tabs-->
        <div class="main-search-input-tabs  tabs-act fl-wrap">
            <ul class="tabs-menu change_bg no-list-style">
                <li class="current"><a href="#tab-inpt1" data-bgtab="{{asset('frontend/images/bg/hero/1.jpg')}}"> Result</a></li>
            </ul>
            <!--tabs -->                       
            <div class="tabs-container fl-wrap  ">
                <!--tab -->
                <div class="tab">
                    <div id="tab-inpt1" class="tab-content first-tab">
                        <div class="main-search-input-wrap fl-wrap">
                            <div class="main-search-input">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="main-search-input-item">
                                        <label><i class="fal fa-keyboard"></i></label>
                                        <input type="text" placeholder="Type Your ID Here" required/>
                                    </div>
                                    
                                    <button type="submit" class="main-search-button color2-bg" >Search <i class="far fa-search"></i></button>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--tab end-->
                <!--tab -->                              
            </div>
            <!--tabs end-->
        </div>
        <!-- main-search-input-tabs end-->
        
    </div>

</section>
<!--section end-->
<!--section  -->

@endsection
