@extends('welcome')
@section('datlich')

    <!-- Hero End -->
    <!--? About Start-->
    <hr>
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
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{('public/img/gallery/about2.png')}}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="{{('public/img/gallery/about1.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? All startups Start -->
    
    @endsection