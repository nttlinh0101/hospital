@extends('welcome')
@section('datlich')

    <hr>
    <h2 class="tieude">Quy trình đăng ký khám bệnh theo hẹn</h2>
    <br>
    <img style="padding-left: 68rem;" src="{{asset('public/frontend/img/logo/logo.png')}}">
    <div style="padding-top: 15rem;" class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="about-caption mb-50">
                                    
                        <div class="section-tittle section-tittle2 mb-35">
         
                            <br>
                            <span>Bước 1 : Đặt lịch khám bệnh</span>
                             <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Đăng nhập vào phần mềm web. </h4>
                             <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Chọn hình thức đặt khám : theo ngày hoặc theo bác sĩ. </h4>
                             <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Chọn chuyên khoa và lịch khám. </h4>
                             <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Điền thông tin hồ sơ bệnh hoặc tạo mới </h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="about-caption mb-50">
                                    
                        <div class="section-tittle section-tittle2 mb-35">
         
                            <br>
                            <span>Bước 2 : Thanh toán </span>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Kiểm tra thông tin lịch hẹn . </h4>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Chọn hình thức thanh toán : thanh toán tại quầy hoặc online(PayPal). </h4>
                     
                            <h4 class="error">! Nhắc nhở : Bạn nên chọn hình thức thanh toán online sẽ tiết kiệm thời gian chờ đợi </h5>
    

                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div  class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="about-caption mb-50">
                                    
                        <div class="section-tittle section-tittle2 mb-35">
         
                            <br>
                            <span>Bước 3 : Xác nhận người bệnh đến khám theo hẹn</span>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Sau khi đặt lịch thành công người đặt có thể kiểm tra lịch khám tại mục quản lý . </h4>
                            <h4> <i class="fas fa-play-circle"></i>&nbsp;&nbsp; Đến ngày khám .</h4>
                            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Người bệnh đã thanh toán online đến thẳng phòng bệnh được ghi trong lịch khám trước 15 phút. </h4>
                                 <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Người bệnh đã thanh toán tại quầy đến quầy để thanh toán sau đó đến phòng bệnh chờ . </h4>     
                                 <h4 class="error">! Nhắc nhở : Nếu tới lượt người bệnh chưa có mặt sẽ mất lượt , người bệnh tiến hành đến phòng hỗ trợ số 1 để hẹn lại lịch </h5>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div  class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="about-caption mb-50">
                                    
                        <div class="section-tittle section-tittle2 mb-35">

                            <br>
                            <span>Bước 4 : khám và thực hiện cận lâm sàn </span>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Người bệnh khám tại phòng chuyên khoa theo lịch hẹn . </h4>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Thực hiện khám lâm sàn và đóng viện phí (nếu có)theo yêu cầu của bác sĩ . </h4>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Khi đã khám xong người bệnh nhận kết quả và toa thuốc từ bác sĩ. </h4>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div  class="about-area ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <div class="about-caption mb-50">
                                    
                        <div class="section-tittle section-tittle2 mb-35">
         
                            <br>
                            <span>Bước 5 : Mua thuốc </span>
                            <h4> <i class="fas fa-circle-notch"></i>&nbsp;&nbsp; Mua thuốc tại quầy thuốc ở tầng 1. </h4>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? All startups Start -->
    
    @endsection
    <style>
        
        .tieude{
            color: blue;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            animation-name: inherit;

        }
        h4{
            padding-left: 20rem;
        }
        .error{
            background-color: antiquewhite;
            border: 1px solid black;
            color: red;
        }
    </style>