<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', ''.($global_setting->title ?? "").'')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Department of Agricultural Extension (Bengali: কৃষি সম্প্রসারণ অধিদপ্তর) works to develop opportunity plan for facilitating agricultural growth and development." name="description" />
    <meta content="কৃষি সম্প্রসারণ অধিদপ্তর" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend-assets/assets/images/favicon.ico')}}">

    {{-- select2 css --}}
    <link rel="stylesheet" href="{{asset('backend-assets/assets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend-assets/assets/libs/glightbox/css/glightbox.min.css')}}">
    <!-- Layout config Js -->
    <script src="{{asset('backend-assets/assets/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('backend-assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('backend-assets/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('backend-assets/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('backend-assets/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

    <style>
        .select2-container .select2-selection--single {
            height: 38px !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #d2d2d2 !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px !important;
        }
        .card {
            -webkit-box-shadow: 0 0px 3px rgba(87, 87, 87, 0.24) !important;
            box-shadow: 0 0px 3px rgba(87, 87, 87, 0.24) !important;
        }
        .page-title-box {
            -webkit-box-shadow: 0 0px 3px rgba(56, 65, 74, 0.23) !important;
            box-shadow: 0 0px 3px rgba(56, 65, 74, 0.23) !important;
        }
        .fullscreen {
            background: white;
        }

        @font-face {
            font-family: nikosh;
            src: url({{asset('font.Nikosh.ttf')}});
        }
        body {
            font-family: nikosh;
            font-size: 1.0em;
            padding: 0;
            margin: 0;
        }
        .no-user-image-found i {
            font-size: 20px;
            color: #00000080;
            border: 1px solid white;
            padding: 5px;
            border-radius: 20px;
            background: white;
            box-shadow: 0 0 10px 2px #00000040;
        }
        .footer {
            color: #000 !important;
        }

        .navbar-menu .navbar-nav .nav-link {
  font-family: nikosh !important;
}
    </style>

    {{-- Stack css/style --}}
    @stack('css')

</head>

<body>
