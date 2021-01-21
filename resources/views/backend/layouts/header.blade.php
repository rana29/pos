<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Admin Dashbord</title>
      <!--  jquery file -->
    <script src="{{asset('/')}}assets/admin/vendor/jquery/min.js"></script>
    <script src="{{asset('/')}}assets/admin/vendor/jquery/jquery-1.12.3.min.js"></script>

    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="{{asset('/')}}assets/admin/image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="{{asset('/')}}assets/admin/image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="{{asset('/')}}assets/admin/image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{asset('/')}}assets/admin/vendor/pace/pace.min.js"></script>
    <link href="{{asset('/')}}assets/admin/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- loddar -->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/loddar/style.css">

    <!-- ========================================================= -->
    <!-- bootstrap toggle -->
   
    <link href="{{asset('/')}}assets/admin/toggle/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <!--ckeditor css-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/ckeditor/samples/css/samples.css">

    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/animate.css/animate.css">
    

     <!--dataTable-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/magnific-popup/magnific-popup.css">
    <!--Select with searching & tagging-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/select2/css/select2-bootstrap.min.css">
    <!--Date picker-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/bootstrap_date-picker/css/bootstrap-datepicker3.min.css">
      <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/bootstrap_time-picker/css/timepicker.css">
    <!--Color picker-->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/vendor/bootstrap_color-picker/css/bootstrap-colorpicker.min.css">
   
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/stylesheets/css/style.css">
  <!--   Bootstrap toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
   <!--  sweet alert -->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
   <!--  custom css  -->
    <link rel="stylesheet" href="{{asset('/')}}assets/admin/custom/cs/custom.css">


</head>

<body>

    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
   <!--  <input type="hidden" name="_token2" id="_token2" value="{{ csrf_token() }}"> -->
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="" class="on-click">
                       <!-- <img alt="logo" src="{{asset('/')}}assets/admin/images/header-logo.png" />  -->
                       <h3><a class="ml-4" href="">Online_Shop</a></h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>
                <!--NOCITE HEADERBOX-->
                
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{asset('/')}}assets/admin/images/avatar/avatar_user.jpg" />
                        </div>
                        <div class="user-info">
                            <span class="user-name"></span>
                            <span class="user-profile">{{Auth::user()->name}}</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="pages_user-profile.html"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href="pages_lock-screen.html"><i class="fa fa-lock" aria-hidden="true"></i> Lock Screen</a></li>
                                <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Configurations</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </div>
        </div>