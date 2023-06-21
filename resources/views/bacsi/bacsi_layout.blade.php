<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('public/frontend/img/logo/loder.png')}}">
    <title>Bác sĩ</title>
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/assets/libs/fullcalendar/dist/fullcalendar.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/assets/extra-libs/calendar/calendar.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/dist/css/style.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />

    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">

    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>



    <link rel="stylesheet" href="{{asset('public/backend/DataTables/css/jquery.dataTables.min.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{URL::to('/dashboard')}}">
                        <!-- Logo icon -->
                        <b class="">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img class="logohospital_bd" src="{{asset('public/frontend/img/logo/logohospital1.png')}}" alt="">

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->

                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>

                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{asset('public/backend/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31">
                                <span style="font-size: 13px;" class="username">
                                    <?php
                                    $Ten = Session::get('ten-bacsi');
                                    if ($Ten) {
                                        echo $Ten;
                                    }
                                    ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <div class="dropdown-divider"></div>
                                <a href="{{URL::to('/logout-bacsi')}}" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"> <a class="sidebar-link " href="{{URL::to('/trangbacsi')}}"><i class="ti-user m-r-5 m-l-5"></i><span class="hide-menu">Trang bác sĩ  </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link " href="{{URL::to('/bac-si/lich-truc')}}"><i class="mdi mdi-receipt"></i><span class="hide-menu">Lịch trực </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Quản Lý Bệnh Nhân </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{URL::to('/bac-si/danh-sach-benh-nhan?key=confirm')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Danh Sách đang chờ khám </span></a></li>
                                <li class="sidebar-item"><a href="{{URL::to('/bac-si/danh-sach-benh-nhan?key=all')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Danh Sách đã khám </span></a></li>
                                <li class="sidebar-item"><a href="{{URL::to('/bac-si/danh-sach-bn?key=all')}}" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Danh Sách vắng </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Quản Lý Lịch Trực Bác Sĩ </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{URL::to('/bs-add-LTruc')}}" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Thêm Lịch Trực</span></a></li>
                            </ul>
                        </li> 
                        <li class="sidebar-item"><a href="{{URL::to('/bac-si/chat')}}" class="sidebar-link" id="load"></a></li>
                        <?php $matk = Session::get('matk-bacsi'); ?>
                        <input id="Ma" type="hidden" value="{{($matk)}}">
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <audio id="audi">
                <source src="https://audio-previews.elements.envatousercontent.com/files/262347732/preview.mp3" type="audio/mpeg">
            </audio>
            <!-- End Sidebar scroll-->
        </aside>
        <script type="text/javascript">
             var a =null;
            $(document).ready(function() {
                load_tin();
                setInterval(function() {
                    load_tin()
                }, 2000);
           
                function load_tin() {
                    var id = $('#Ma').val();

                    $.ajax({
                        url: '/benhvien1/trangbacsi/tai-tin/' + id,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            if (data == 0) {
                                var resultajax = `<i class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat ` + data + ` </span>`;
                            } else {
                                var resultajax = `<i class="mdi mdi-message-outline"></i><span class="hide-menu error"> Chat ` + data + ` </span>`;
                                console.log(a);
                                if(a==null){
                                    a=data;
                                    if(a==1){
                                    document.getElementById('audi').play();
                                    }
                                }
                                if(a != data){
                                a=data;
                                document.getElementById('audi').play();
                               
                                }
                            }
                            $('#load').show();
                            $('#load').html(resultajax);

                        }
                    });

                };

            });
        </script>

        <div class="page-wrapper">
            <div class="container-fluid">


                @yield('bacsi_content')
            </div>

            <footer style="margin-top: 4.2%; background-color: white;" class="footer text-center">
             
            </footer>

        </div>

        <style>
            .error {
                color: red !important;
                font-weight: bold !important;
            }
        </style>

        <script src="{{asset('public/backend/js/jquery.magnifier.js')}}"></script>

        <script src="{{asset('public/backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/js/jquery.ui.touch-punch-improved.js')}}"></script>
        <script src="{{asset('public/backend/dist/js/jquery-ui.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{asset('public/backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{asset('public/backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/extra-libs/sparkline/sparkline.js')}}"></script>
        <!--Wave Effects -->
        <script src="{{asset('public/backend/dist/js/waves.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{asset('public/backend/dist/js/sidebarmenu.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{asset('public/backend/dist/js/custom.min.js')}}"></script>
        <!-- this page js -->
        <script src="{{asset('public/backend/assets/libs/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('public/backend/assets/libs/fullcalendar/dist/fullcalendar.min.js')}}"></script>
        <script src="{{asset('public/backend/dist/js/pages/calendar/cal-init.js')}}"></script>
        <script src="{{asset('public/backend/DataTables/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>