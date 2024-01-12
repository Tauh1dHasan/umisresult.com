@extends('frontend.layouts.app')

@section('content')

<section class="hero-section" data-scrollax-parent="true">

    <div class="bg-tabs-wrap">
        <div >
            @if (empty($studentResult))
                <div class="bg bg_tabs"  data-bg="{{asset('frontend/images/bg/hero/1.jpg')}}"></div>
                <div class="overlay op7"></div>
            @else
                <div>
                    <img src="{{asset('storage/studentResults')}}/{{$studentResult->result_image}}" alt="Student Result">
                </div>
            @endif
        </div>
    </div>

    <div class="container small-container" style="height: 100vh;">
        @if (empty($studentResult))
            <div class="intro-item fl-wrap">
                <span class="section-separator"></span>
                <div class="bubbles">
                    <h1>Student ID not found. Enter full Student ID and Try Again</h1>
                </div>
            </div>
        @endif
        
        <!-- main-search-input-tabs-->
        <div class="main-search-input-tabs  tabs-act fl-wrap">
            
        </div>
        <!-- main-search-input-tabs end-->
        
    </div>

</section>
<!--section end-->
<!--section  -->

@endsection
