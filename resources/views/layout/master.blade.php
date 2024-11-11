

<!DOCTYPE html>
<html lang="en">

<head>
    <title>DISPERKIMTAN YOLANDA SALSABILLA</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('assets1')}}/images/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets1')}}/css/bootstrap/css/bootstrap.min.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets1')}}/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets1')}}/icon/icofont/css/icofont.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('assets1')}}/css/style.css">
      <link rel="stylesheet" type="text/css" href="{{asset('assets1')}}/css/jquery.mCustomScrollbar.css">

      <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>

      <style>
        .sidebarbiru {
            background-color: #215457 !important;
        }
        .bgbiru {
            background-color: #215457 !important;
        }

        .pcoded-item a:hover {
            background-color: #207784 !important; /* Slightly darker than the original */
            color: #ffffff !important;
        }
        .bgph {
            background-color: #215457 !important; /* page header */
        }
        /* .bghome {
            background-color: #caf0f6 !important;
        }
        .bgprofil{
            background-color: #a9c9dd !important;
        }
        .bgpengajuan{
            background-color: #88a2c4 !important;
        }
        .bgproses{
            background-color: #758BC2 !important;
        } */
        .bgpengesahan{
            background-color: #58B9BF !important;
            /* Ukuran ikon atau elemen lain yang mungkin Anda ingin atur */
        }
        .bglogout{
            background-color: #7A8A9B !important;
        }
        .bglaporan{
            background-color: #3D487B !important;
        }
        .bghistory{
            background-color: #1679AB !important;
        }
       .bgicon i {
        color: #215457; /* custom color for home icon */
        }
        .text-custom {
        color: #ffffff !important;
    }

      </style>
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo sidebarbiru">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search " href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="/dashboard">
                            <img class="img-fluid " src="{{asset('assets1')}}/images/logo1.png" alt="Theme-Logo" style="max-width: 122%; height: auto;"/>
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <i class="bi bi-person" style="font-size: 15px; "></i>
                                    <span>{{ auth()->user()->name }}</span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="/profile">
                                            <i class="bi bi-person"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                <i class="ti-layout-sidebar-left"></i> Logout
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper  ">
                    <nav class="pcoded-navbar ">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu sidebarbiru ">
                            <div class="">
                            <div class="pcoded-navigatio-lavel " data-i18n="nav.category.navigation">
                                <span class="text-white">
                                {{ auth()->user()->role }}
                                </span>
                            </div>

                            @if(auth()->user()->role == 'admin')

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/dashboard">
                                    <span class="pcoded-micon bglogout "><i class="ti-home" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white " data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/user">
                                        <span class="pcoded-micon bglogout "><i class="ti-id-badge " style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Data User</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item mb-3">
                                <li class="bgbiru">
                                    <a href="/pengembangan">
                                        <span class="pcoded-micon bglogout "><i class="ti-layout-media-center-alt" style="font-size: 22px;" ></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Data Pengajuan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">

                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)" class="bgbiru text-white">
                                        <span class="pcoded-micon bglogout" ><i class="ti-check-box" style="font-size: 22px;" style="font-size: 22px;" ></i></span>
                                        <span class="pcoded-mtext text-white"  data-i18n="nav.basic-components.main">Proses Persetujuan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu bgbiru">
                                        <li class="bgbiru ">
                                            <a href="persetujuanadmin">
                                                <span class="pcoded-micon"><i class="ti-angle-right" ></i></span>
                                                <span class="pcoded-mtext text-white" data-i18n="nav.basic-components.alert">Persetujuan Administrasi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="bgbiru ">
                                            <a href="persetujuanteknis">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext text-white" data-i18n="nav.basic-components.breadcrumbs">Persetujuan Teknis</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="bgbiru ">
                                            <a href="persetujuandokumen">
                                                <span class="pcoded-mtext text-white" data-i18n="nav.basic-components.breadcrumbs">Persetujuan Dokumen</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/dokumen">
                                        <span class="pcoded-micon bglogout"><i class="ti-file"style="font-size: 22px;" ></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Pembuatan Dokumen</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/pengesahan">
                                        <span class="pcoded-micon bglogout"><i class="ti-file"style="font-size: 22px;" ></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Pengesahan Siteplan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/laporan">
                                        <span class="pcoded-micon bglogout"><i class="ti-files" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Laporan Rekapitulasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/history">
                                        <span class="pcoded-micon bglogout"><i class="ti-share-alt" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">History</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon bglogout  "><i class="ti-power-off" style="font-size: 22px;"></i></span>
                                        <span class="pcoded-mtext text-white">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                            @elseif(auth()->user()->role == 'kabid')
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/dashboard">
                                        <span class="pcoded-micon bglogout"><i class="ti-home" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                            </ul>

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/persetujuandokumen">
                                        <span class="pcoded-micon bglogout"><i class="ti-check-box " style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Persetujuan Dokumen</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/laporan">
                                        <span class="pcoded-micon bglogout"><i class="ti-files" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Laporan Rekapitulasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon bglogout"><i class="ti-power-off" style="font-size: 22px;"></i></span>
                                        <span class="pcoded-mtext text-white">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            @elseif(auth()->user()->role == 'kadin')
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/dashboard">
                                        <span class="pcoded-micon bglogout"><i class="ti-home" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                            </ul>

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/persetujuandokumen">
                                        <span class="pcoded-micon bglogout"><i class="ti-check-box" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Persetujuan Dokumen</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/laporan">
                                        <span class="pcoded-micon bglogout"><i class="ti-files" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Laporan Rekapitulasi</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon bglogout"><i class="ti-power-off" style="font-size: 22px;"></i></span>
                                        <span class="pcoded-mtext text-white">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>


                            @else
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/dashboard">
                                        <span class="pcoded-micon bglogout"><i class="ti-home" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Home</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>

                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/profile">
                                        <span class="pcoded-micon bglogout"><i class="ti-user" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Profil Pengembang</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/pengajuan">
                                        <span class="pcoded-micon bglogout"><i class="ti-pencil-alt" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Pengajuan Siteplan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="bgbiru">
                                        <span class="pcoded-micon bglogout"><i class="ti-check-box" style="font-size: 22px;"></i></span>
                                        <span class="pcoded-mtext text-white"  data-i18n="nav.basic-components.main">Proses Persetujuan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu bgbiru">
                                        <li class="bgbiru">
                                            <a href="/persetujuanadmin">
                                                <span class="pcoded-micon bgadm"><i class="ti-angle-right" ></i></span>
                                                <span class="pcoded-mtext text-white" data-i18n="nav.basic-components.alert">Persetujuan Administrasi</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="bgbiru">
                                            <a href="/persetujuanteknis">
                                                <span class="pcoded-micon bgteknis"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext text-white" data-i18n="nav.basic-components.breadcrumbs">Persetujuan Teknis</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="/pengesahan">
                                        <span class="pcoded-micon bglogout"><i class="ti-file" style="font-size: 22px;"></i><b>D</b></span>
                                        <span class="pcoded-mtext text-white" data-i18n="nav.dash.main">Pengesahan Siteplan</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="bgbiru">
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <span class="pcoded-micon bglogout"><i class="ti-power-off" style="font-size: 22px;"></i></span>
                                        <span class="pcoded-mtext text-white">Logout</span>
                                        <span class="pcoded-mcaret"></span>
                                        </a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                    @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="fixed-button">
                    <a href="https://codedthemes.com/item/guru-able-admin-template/" target="_blank" class="btn btn-md btn-primary">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
                    </a>
                </div> --}}
            </div>
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets1/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('assets1')}}/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('assets1')}}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('assets1')}}/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="{{asset('assets1')}}/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets1')}}/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets1')}}/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="{{asset('assets1')}}/pages/widget/amchart/amcharts.min.js"></script>
<script src="{{asset('assets1')}}/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('assets1')}}/pages/todo/todo.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('assets1')}}/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="{{asset('assets1')}}/js/script.js"></script>
<script type="text/javascript " src="{{asset('assets1')}}/js/SmoothScroll.js"></script>
<script src="{{asset('assets1')}}/js/pcoded.min.js"></script>
<script src="{{asset('assets1')}}/js/demo-12.js"></script>
<script src="{{asset('assets1')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('bgbiru');
     }
     else {
         nav.removeClass('bgbiru');
     }
 });
</script>

@yield('scripts')
</body>

</html>
