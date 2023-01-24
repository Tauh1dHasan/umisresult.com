<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Department of Agricultural Extension (Bengali: কৃষি সম্প্রসারণ অধিদপ্তর) works to develop opportunity plan for facilitating agricultural growth and development.">

        <title>কাজুবাদাম ও কফি গবেষণা, উন্নয়ন ও সম্প্রসারণ প্রকল্প</title>

        <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.ico') }}" type="image/x-icon" />

        <!-- =============== Bootstrap CDN ================ -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- =============== Template Css Links ================ -->
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/skeleton.css') }}" />
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/style.css') }}" />
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/meganizr.css') }}" />
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/ministry.css') }}" />
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/base.css') }}" />

        <!-- =============== Responsive Css Links ================ -->
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}" />

        <!-- =============== Font Css Links ================ -->
        <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/flaticon.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
        
        <!-- Custom JS plugin -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.js"></script>

        <!-- Customm Css -->
        <style>
            body {
                background: url('{{asset("frontend/img")}}/coffee.png');
                
            }
            body::after {
                position: fixed;
                width: 100%;
                height: 100%;
                background: #b56b321c;
                content: '';
                z-index: -99;
                top: 0;
                left: 0;
            }
            .bk-org.title {
                padding: 5px;
                font-size: 1.2em;
                overflow: hidden;
            }

            div#box-1 {
                width: 100%;
                height: 175px;
            }

            div#div-lang {
                padding: 3px;
            }

            .carousel-inner .carousel-item img{
                width: 100%;
                /* border: 2px solid #ff0000; */
                /* padding: 10px; */
                height: 395px;
                border-radius: 5px;
            }

            .header-top-bottom {
                padding: 0 5px;
                border-top: 3px solid #8EBF51;
                margin: 5px 0px;
            }
            .meganizr > li > a {
                padding: 11px 15px 8px 15px;
            }
            
            .header-top-bottom img {
                max-height: 88px;
                border-radius: 50%;
            }

            div#div-lang-sel a {
                background-color: #34740e;
                padding: 0 10px;
                border-radius: 2px;
            }

            .share-buttons img {
                width: 30px;
                padding: 2px;
                border: 0;
                box-shadow: 0;
                display: inline;
            }
            
            .block h5.internal-eservice {
                background-image: url('frontend/img/internal_eservice2.png');
                background-repeat: round;
                background-color: white !important;
                font-size: 1.2em;
                height: 50px;
                line-height: 56px;
                padding: 0 0 0 10px !important;
            }
            
            .block h5.internal-eservice a {
                color: white !important;
                display: block;
                text-decoration: none;
            }
            
            @media only screen and (max-width: 979px) and (min-width: 320px) {
                .block h5.internal-eservice a {
                    margin-top: 15px;
                    font-size: 17px;
                }
            }

            #notice-board-ticker ul li {
                list-style: none;
            }
            .lineheight {
                line-height: 22px;
            }

            .typewriter h3 {
                white-space: nowrap;
                margin: 0 auto;
                font-size: 26px;
                overflow: hidden;
                border-right: .15em solid white;
                animation: typing 2.5s steps(300, end), blink-caret .10s step-end infinite;
                animation: blinker 2s linear infinite;
            }
            .containerpadma {
                border: 2px solid red;
                padding: 10px 10px 0px 10px;
                width: 96%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            
            @media only screen and (max-width: 600px) {
                .containerpadma {
                    border: 2px solid red;
                    padding: 10px 10px 0px 10px;
                    width: 93%;
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
            }

            #right-content .block {
                display: block !important
            }

            .np {
                display: block;
                float: left;
                color: #fff !important;
                padding-left: 5px;
            }
            
            #printable_area .viewer {
                display: none
            }
            
            @media only screen and (max-width: 800px) and (min-width: 640px) {
                .mainwrapper .box img {
                    width: 30%
                }
                .mzr-content {
                    position: relative;
                }
            }
            
            .service-box h4 {
                font-weight: normal !important;
                font-size: 20px;
            }
            
            #notice-board-ticker .btn,
            #news-ticker .btn {
                color: #fff;
            }
            
            @media screen and (max-width: 479px) {
                .notice-board-bg {
                    padding: 0px 0px 20px 10px;
                }
                ul li a {
                    font-size: 16px !important;
                }
            }
            
            .topbar {
                background: #b56b32;
                box-shadow: 0 1px 5px #999999;
                /* margin-bottom: 10px; */
                /* padding: 3px; */
            }
            
            #lang_form button {
                background-color: mediumpurple;
                color: #fff;
                text-shadow: none;
            }
            
            #jmenu {
                border-bottom: 1px solid darkgray;
                box-shadow: 0px 2px 1px darkgrey;
            }
            
            #contents {
                margin: 35px 0 !important;
            }
            
            .inner-page #contents {
                margin: 0 !important;
            }
            
            #site-name {
                font-size: 20px;
            }
            
            #slogan {
                display: block;
            }
            
            #sitelogo {
                width: 20%;
                float: left
            }
            
            #sitename-wrapper {
                width: 80%;
                float: right;
                line-height: 2
            }
            
            @media screen and (max-width: 479px) {
                #notice-board-ticker li {
                    background: url("themes/responsive_npf/images/bullet_tick.png") no-repeat 0px 5px transparent;
                    font-size: 11px;
                }
                .dynamic_serivce_box .box {
                    padding: 0 !important;
                }
                .notice-board-bg {
                    background-size: 55px;
                }
                #notice-board {
                    height: 186px;
                }
                #news {
                    height: 35px;
                }
                #news-ticker {
                    height: 37px !important;
                }
                #news .btn {
                    bottom: -18px;
                    position: relative;
                }
                #news h5 {
                    font-size: 12px;
                }
                #news-ticker ul a {
                    font-size: 11px;
                }
                #notice-board {
                    width: 299px;
                }
                #news {
                    width: 279px;
                }
                .container .six.columns {
                    width: 279px !important;
                }
                .mainwrapper .box .caption {
                    font-size: 10px;
                    padding-left: 10px;
                }
                #notice-board-ticker ul {
                    margin-bottom: 0px !important;
                }
            }
            
            @media screen and (max-width: 479px) {
                #sitelogo img {
                    display: block;
                    width: 60px;
                    height: auto;
                }
                #site-name-wrapper {
                    float: right;
                    left: 21px;
                    position: relative;
                    top: -61px;
                }
                #logo {
                    display: block;
                    position: relative;
                    left: -16px;
                    top: -24px;
                }
            }
            
            #site-info {
                clear: both;
                padding: 10px 0;
                background-color: #b56b32;
            }
            
            #site-info a,
            #site-info span {
                text-shadow: none !important;
            }
            
            #header-site-info {
                margin-bottom: 0;
                padding: 10px;
                z-index: 100;
                position: relative;
            }
            
            @media only screen and (max-width: 979px) and (min-width: 320px) {
                #header-site-info {
                    height: auto;
                }
            }
            
            @media screen and (max-width: 479px) {
                #div-lang-sel {
                    width: 30%
                }
                .drop-one-columns {
                    width: 300px !important;
                }
                #notice-board {
                    margin-top: -25px;
                    height: auto;
                }
                .row {
                    margin-bottom: 0px;
                }
                .six.columns {
                    margin-bottom: 10px;
                }
                .mainwrapper .box img {
                    width: 80px;
                }
                #news-ticker ul {
                    width: 86% !important;
                }
            }
            
            .hide {
                display: none
            }
            
            li.col1 .drop-four-columns,
            li.col2 .drop-four-columns,
            li.col3 .drop-four-columns,
            li.col4 .drop-four-columns,
            li.col5 .drop-four-columns,
            li.col6 .drop-four-columns,
            li.col7 .drop-four-columns,
            li.col1 .drop-three-columns,
            li.col2 .drop-three-columns,
            li.col3 .drop-three-columns,
            li.col4 .drop-three-columns,
            li.col5 .drop-three-columns,
            li.col6 .drop-three-columns,
            li.col7 .drop-three-columns {
                margin-left: 0
            }
            
            @media only screen and (max-width: 767px) {
                .container .sixteen.columns,
                .container .twelve.columns {
                    width: 100% !important
                }
            }
            
            @media only screen and (max-width: 767px) {
                .container {
                    width: 95%;
                }
            }
            
            @media screen and (max-width: 479px) {
                .container .six.columns {
                    width: 100% !important;
                }
            }
            
            .service-box {
                float: left !important
            }
            
            #right-content {
                width: 100%
            }
            
            #notice-board,
            #news {
                width: 100%;
            }
            
            #news {
                height: 70px;
            }
            
            #news .btn {
                margin-right: 20px;
                color: #fff;
            }
            
            .service-box h4 {
                font-weight: bold;
                margin-bottom: 10px;
            }
            
            @media screen and (max-width: 767px) and (min-width: 480px) {
                .container .six.columns {
                    width: 45% !important;
                    margin-right: 8px;
                }
            }
            
            .right-side-bar .block ul li {
                border-bottom: 1px solid transparent;
                border-image: linear-gradient(to right, #683091 0%, #8bc643 100%);
                border-image-slice: 1
            }
            
            .right-side-bar .block ul li a {
                font-size: 18px !important
            }

            #footer-menu {
                width: 100% !important
            }
            
            #footer-menu ul {
                max-width: 100%;
                margin: 0 auto;
            }
            
            #footer-menu ul li {
                display: inline-block !important;
                width: auto !important
            }
            
            #footer-menu ul li a {
                text-decoration: underline;
            }
            
            .footer-credit {
                float: none;
                /* width: 60%; */
                margin: 0 auto !important;
                text-align: center;
            }

            /* Media query for mobile view footer padding */
            @media only screen and (max-width: 767px) {
                .mobileFooter {
                    padding: 0 !important;
                    margin: 0 !important;
                }
                .mobileHeading {
                    font-size: 13px;
                }
                .footerText {
                    text-align: center !important;
                }
            }

            .service-box {
                transition: 0.5s;
            }

            .service-box:hover {
                transform: scale(1.03);
                border-bottom: 2px solid red;
                border-right: 2px solid green;
                border-top: 2px solid green;
                border-left: 2px solid red;
            }

            .box:nth-child(odd) {
                background: linear-gradient(45deg, #ffd69d, #f2a63c);
            }

            /* @font-face {
            font-family: nikosh;
            src: url({{asset('font.Nikosh.ttf')}});
            }
            body {
                font-family: nikosh !important;
                font-size: 1.0em;
            } */

            body {
                font-family: nikosh !important;
            }
            .carousel-indicators li {
                width: 10px !important;
                height: 5px !important;
            }

            .frontWrapper {
                max-width: 1000px;
                width: auto !important;
            }

            
            @media only screen and (max-width: 500px) {
                .carousel-inner .carousel-item img {
                    height: 210px;
                }
            }

            @media only screen and (max-width: 800px) {

                #demo {
                    padding-left: 15px;
                    padding-right: 15px;
                }
            }

            @media only screen and (max-width: 700px) {
            #demo {
                padding-left: 12px;
                padding-right: 12px;
            }
            }
            
            @media only screen and (max-width: 800px) {
                .carousel-inner .carousel-item img {
                    height: 280px;
                }
            }
        </style>
    </head>

    <body class="dae-portal-gov-bd">
        <div class="frontWrapper" style="box-shadow: 0 0 10px 2px #00000063;">
        