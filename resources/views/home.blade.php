@extends('welcome')
@section('content')
<div id="today"  class="col-1 bong">
            <p class="btn  " >Số ca mắc Covid-19 hôm nay: </p>
        </div>
        <style>
            .bong{
                transition: top 1000ms ease 0s !important;
                position: fixed;    
                z-index: 101;
                padding-top: 100px;
            }
            table {
                /* border-spacing: 10px;  */
                height: 255px;
                margin-bottom: 0;
            }
            .country {
                height: 100px;
            }
        </style>
         <head>
                            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
                        </head>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                tg();
                                vn();
                                popupOpen();
                            });
                        </script>
                        <script>
                            function vn() {
                                const x = document.querySelector('#vietnam')
                                const y = document.querySelector('#today')
                                fetch('https://corona.lmao.ninja/v2/countries/vn')
                                    .then((response) => {
                                        return (response.json());
                                    })
                                    .then((data) => {
                                        x.innerHTML = `<td class="genric-btn danger circle mt-5">Việt Nam</td>
                                        <td style="color: red;">${data.cases}</td>
                                    <td style="color: orange;">${data.active}</td>
                                    <td style="color: green;">${data.recovered}</td>
                                    <td style="color: gray;">${data.deaths}</td>`;
                                    y.innerHTML=` <p class="btn  " >Số ca mắc Covid-19 hôm nay: ${data.todayCases} </p>`
                                    })
                            }
                            function tg() {
                                const x = document.querySelector('#tg')
                                fetch('https://disease.sh/v3/covid-19/all')
                                    .then((response) => {
                                        return (response.json());
                                    })
                                    .then((data) => {
                                        x.innerHTML = `<td class="genric-btn warning circle mt-4">Thế giới</td>
                                        <td style="color: red;">${data.cases}</td>
                                    <td style="color: orange;">${data.active}</td>
                                    <td style="color: green;">${data.recovered}</td>
                                    <td style="color: gray;">${data.deaths}</td>`;
                                    })
                            }

                        </script>
<div class="slider-area position-relative">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                        <div class="hero__caption">
                            <span></span>
                            <h1 class="cd-headline letters scale">Điều hạnh phúc của chúng tôi là được thấy bạn
                                <strong class="cd-words-wrapper">
                                    <b class="is-visible">khỏe mạnh</b>
                                    <b>vui vẻ</b>
                                    <b>hạnh phúc</b>
                                </strong>

                            </h1>
                            <p data-animation="fadeInLeft" data-delay="0.1s">Sức khỏe tốt và trí tuệ minh mẫn là hai điều hạnh phúc nhất của cuộc đời.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slider -->

    </div>
</div>
<div class="about-area section-padding2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-35">

                        <span>Thông báo Y TẾ</span>
                        <p>Vì tình hình dịch bệnh diễn biến phức tạp Bộ Y tế kêu gọi mỗi người dân tự giác thực hiện khuyến cáo 5K
                            cũng như khai báo y tế khi di chuyển
                        </p>

                        <img style="padding-left:40px ;" height="200px" width="400px" src="{{asset('public/frontend/img/logo/5.png')}}" alt="">
                    </div>

                </div>

            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-caption mb-50">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-35">

                        <span>số liệu y tế</span>
                        <p>Số liệu liên quan tình hình Covid-19 của Việt Nam và thế giới</p>
                        <br>
                        <br>
                        <br>

                        <table class="table covid">
                            <thead>
                                <th></th>
                                <th style="color: red;">TỔNG CA Bị </th>
                                <th style="color: orange;">ĐANG CHỮA TRỊ</th>
                                <th style="color: green;">ĐÃ KHỎI</th>
                                <th style="color: gray;">TỬ VONG</th>
                            </thead>
                            <tbody>
                                <tr id="vietnam">

                                </tr>
                                <tr id="tg">
                               
                            </tbody>
                        </table>

                       
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- slider Area End-->
        <!--? About Start-->
        <div class="about-area section-padding2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <div class="about-caption mb-50">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2 mb-35">
                                <span>Đặt lịch khám</span>
                                <h2>Cám ơn bạn đã tin tưởng bệnh viện của chúng tôi</h2>
                            </div>
                            <p>Nhằm đáp ứng nhu cầu chăm sóc sức khỏe , cũng như giảm tối thiểu thời gian chờ đợi của bệnh nhân , bạn vui lòng đăng ký lịch khám bênh trước </p>
                            <div class="about-btn1 mb-30">
                                <a href="{{URL::to('/dskhoa/1')}}" class="btn about-btn">Khám theo ngày <i class="ti-arrow-right"></i></a>
                            </div>
                            <div class="about-btn1 mb-30">
                                <a href="{{URL::to('/dskhoa/2')}}" class="btn about-btn2">Khám theo bác sĩ <i class="ti-arrow-right"></i></a>
                            </div>
                            <!-- <div class="about-btn1 mb-30">
                            <a href="about.html" class="btn about-btn2">Khám tại nhà <i class="ti-arrow-right"></i></a>
                        </div> -->
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <div class="about-font-img d-none d-lg-block">
                                <img src="{{asset('public/img/gallery/bacsinam.png')}}" alt="">
                            </div>
                            <div class="about-back-img ">
                                <img src="{{asset('public/img/gallery/bacsinam.png')}}" alt="">
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <hr>
        <div class="about-area">

            <style type=text/css>
                .covid td {
                    height: 6rem !important;
                    background-color: azure;
                    border-radius: 10px !important;
                    -moz-border-radius: 10px !important;
                    -webkit-border-radius: 10px !important;
                    text-align: center;
                    line-height: 3rem;
                    font-size: 15px;
                    font-weight: bold;

                }

                .covid th {
                    text-align: center;
                    font-size: 15px;

                }

                hr {
                    border: 0;
                    height: 0;
                    border-top: 5px solid blue;
                    box-shadow: 0 2px 0 0 #4E92DF;
                    margin-bottom: 2em;
                    width: 50%;

                }

                body {
                    margin: 0;
                    padding: 0;
                    font-family: 'Roboto Condensed', sans-serif;
                }

                /* Overlay Styles */
                .overlay {
                    background: rgba(0, 0, 0, 0.8);
                    opacity: 0.8;
                    filter: alpha(opacity=80);
                    position: absolute;
                    top: 0px;
                    bottom: 0px;
                    left: 0px;
                    right: 0px;
                    z-index: 100;
                    height: 450%;

                }

                /* Popup */
                .popup {
                    transition: top 1000ms ease 0s !important;
                    position: fixed !important;
                    background: white;
                    z-index: 101;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
          
                    width: 500px;
                    /*Change your width here*/
                    height: 600px;
                    /*Change your height here*/
                    margin: auto;
                    /* Popup Inner */
                }

                @media (max-width: 768px) {
                    .popup {
                        width: 90%;
                        margin: auto 5%;
                    }
                }
                
                .popup .popup-inner {
                    position: relative;
                    padding: 1em;
                }

                .popup .popup-inner input.s3-btn-close {
                    position: absolute;
                    top: -0.5em;
                    right: -0.5em;
                    background: black;
                    border: solid 2px white;
                    color: white;
                    cursor: pointer;
                    border-radius: 15px;
                    outline: none;
                }

                /*************
  S3 Button
*************/
                input.s3-btn {
                    background: #4E92DF;
                    border: none;
                    width: 30%;
                    height: 50px;
                    cursor: pointer;
                    position: absolute;
                    top: 0;
                    color: white;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    margin: auto;
                    font-size: 18pt;

                }

                .popup-inner a {
                    color: green;
                }

                .popup-inner p {
                    font-weight: bold;
                }
            </style>
            <?php $taikhoan = Session::get('ten-user');
            $id = Session::get('id-user');
            if (!$taikhoan) { ?>

                <div onclick=popupClose() class=overlay id="overlay" style=display:none;> </div>
                <div class=popup id="popup" style=display:none;>
                    <div class=popup-inner>
                        <input type=button name=Close class=s3-btn-close onclick=popupClose() value=&times;>
                        <h2>Thông báo </h2>
                        <p>Vì tình hình dịch bệnh phức tạp , người dân hãy nghiêm túc thực hiện :</p>
                        <img style="padding-left:40px ;" height="200px" width="400px" src="{{asset('public/frontend/img/logo/5.png')}}" alt="">
                        <p> + Khai báo y tế tại : <a href="https://tokhaiyte.vn/"> https://tokhaiyte.vn/ </a></p>
                        <img style="padding-left:40px ;" height="200px" width="400px" src="{{asset('public/frontend/img/logo/QR.png')}}" alt="">
                        <input type=button name=Close class=s3-btn-close onclick=popupClose() value=&times;>
                    </div>
                </div>
            <?php
            } ?>
            <div>

                <div>


                    <script>
                        function popupOpen() {
                            document.getElementById("popup").style.display = "block",
                                document.getElementById("overlay").style.display = "block"
                        }

                        function popupClose() {
                            document.getElementById("popup").style.display = "none",
                                document.getElementById("overlay").style.display = "none"
                        }
                    </script>
                </div>
            </div>

        </div>
        <div class="about-area ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60459.9091867987!2d105.63147838416955!3d18.720261497362618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3139ce88bfffffff%3A0xc45e5c797425ea66!2zQuG7h25oIFZp4buHbiDEkGEgS2hvYSBUaMOgbmggUGjhu5EgVmluaA!5e0!3m2!1svi!2s!4v1681760647005!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!-- About  End-->
        <!--? department_area_start  -->

        <!-- depertment area end  -->
        <!--? Gallery Area Start -->

        <!-- gallery Products End -->
        <!--? Blog start -->

        <!-- Blog End -->
        @endsection