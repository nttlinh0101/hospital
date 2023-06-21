<!doctype html>

<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Bệnh viện </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/frontend/img/logo/loder.png')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}">

    {{-- <!-- <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}"> --> --}}
	<link rel="stylesheet" href="{{asset('public/frontend/css/slicknav.css')}}">

    <link rel="stylesheet" href="{{asset('public/frontend/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animated-headline.css')}}">
  
    <link rel="stylesheet" href="{{asset('public/frontend/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/slick.css')}}">


    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/DataTables/css/jquery.dataTables.min.css')}}">
</head>

<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{asset('public/frontend/img/logo/loder.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a ><img src="{{asset('public/frontend/img/logo/logo.png')}}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{URL::to('/')}}">Trang chủ </a></li>
                                            <li><a href="{{URL::to('/quy-trinh')}}">Quy trình</a></li>
                                            <li><a href="{{URL::to('/datlich')}}">Đặt lịch</a></li>
                                            <?php $taikhoan = Session::get('ten-user');
                                        $id = Session::get('id-user');
                                if($taikhoan){?>

                                            <li>   <a class=""><i class="fas fa-user"></i> 
                                                    <?php echo $taikhoan; ?></a>
                                                <ul class="submenu">
                                                <!-- <li><a href="{{URL::to('/kiemtra')}}">Kiểm tra </a></li> -->
                                                    <li><a href="{{URL::to('/trangcanhan')}}">Quản Lý</a></li>
                                                    <li> <a href="{{URL::to('/dangxuat')}}" class="">Đăng xuất</a></li>
                                                    <li><a href="{{URL::to('/doimatkhau')}}">Đổi mật khẩu</a></li>

                                                </ul>
                                            </li>

                                            <?php
                                    }else{ 
                                    ?>

                                            <li> <a href="{{URL::to('/dangnhap')}}" >Đăng nhập</a> </li>
                                            <?php
                                }
                                ?>


                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">

                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
      
        @yield('content')
        @yield('datlich')
        <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "100324542198293");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    </main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" >
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            
                                <!-- logo -->
                                <div class="footer-logo">
                                    <img class="footer-logo" src="{{asset('public/frontend/img/logo/yte.png')}}"
                                        alt="">
                                    {{-- <img height="200px" width="200px" src="{{asset('public/frontend/img/logo/yte.png')}}"
                                        alt=""> --}}
                                        <br>
                                    {{-- <img style="padding-left:30px ;" height="50" width="100" src="{{asset('public/frontend/img/logo/face.png')}}"
                                        alt=""> --}}
                               
                                </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1">Bệnh viên hàng đầu về sức khỏe con người </p>
                                        <p class="info1">Luôn lắng nghe , luôn thấu hiểu , luôn tận tụy</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-number mb-50">
                                    <h4><span>+084 </span>34833033</h4>
                                    <p>01 Lê Duẩn Thành phố Vinh</p>
                                    <p>hospital01@gmail.com</p>
                                </div>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part" novalidate="true">
                                         
                                            <div class="form-icon">
                                                <a href="{{URL::to('/bacsi')}}" class="btn">
                                                  Đăng nhập bác sĩ
                                                </a>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{asset('public/frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>
 
    <script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('public/frontend/js/jquery.slicknav.min.js')}}"></script>





    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <!-- <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> -->
    <script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/animated.headline.js')}}"></script>
    <!-- <script src="{{asset('public/frontend/js/jquery.magnific-popup.js')}}"></script> -->

    <!-- Date Picker -->
    <!-- <script src="{{asset('public/frontend/js/gijgo.min.js')}}"></script> -->

    <!-- <script src="{{asset('public/frontend/js/jquery.magnifier.js')}}"></script> -->
   

    <script src="{{asset('public/frontend/js/jquery.form.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>

  

    
    <script src="{{asset('public/frontend/js/plugins.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/backend/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
    <!-- lịch -->

</body>

</html>