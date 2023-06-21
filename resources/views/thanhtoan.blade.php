@extends('welcome')
@section('datlich')
<?php

$id = Session::get('id-user');
$sodienthoai = Session::get('sodienthoai');
$ten = Session::get('ten');
?>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        *::before {
            padding-right: 10px;
        }
        h5{
            margin-bottom: 20px;
        }
    </style>
   
   
</head>
<hr>
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2> Chọn hình thức thanh toán
                </h2>
                <br>
               
                {{-- <div class="form-group">
                    Thanh toán bằng Paypal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img height="50" src="{{asset('./public/frontend/img/logo/logopaypal.jpg')}}" alt="">&nbsp;
                    <div id="paypal-button"></div>
                </div> --}}
                <a href="{{URL::to('/thanhcong/1')}}" class="form-group">
                    Thanh toán bằng mã QR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img height="50" width="95" src="{{asset('./public/frontend/img/logo/logo.png')}}" alt="">

                </a>

            </div>
           
            <div class="col-sm-4">
            <h2> Lịch khám bệnh</h2>
            @foreach( $BN as $key=>$value)
            <h5><i class="fas fa-user"></i> Bệnh nhân&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($value->TenBN)}}</h5>
            <h5><i class="fas fa-phone"></i> Số điện thoại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($value->DienThoai)}}</h5>
            
            @endforeach
            @foreach($result as $key =>$values)
            <h5><i class="far fa-address-card"></i>Chuyên khoa&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($values->TenKhoa)}}</h5>
            <h5><i class="fas fa-user-md"></i>Bác sĩ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($values->TenBS)}}</h5>
            <h5><i class="fas fa-calendar-alt"></i>Thời gian&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($values->NgayTruc)}}({{($values->Buoi)}})</h5>
            <h5><i class="fas fa-hospital"></i> Phòng&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{($values->MaPhong)}}</h5>
            <hr>
            <div><h3>Tiền khám : <?php echo number_format(($values->gia));  ?> VNĐ ≈ <?php echo round($values->gia/23000,2); ?> USD</h3>
            <input id="tien" type="hidden" onclick="hihi()" value="{{round($values->gia/23000,2)}}">
            </div>
            @endforeach
            </div>
        </div>
</section>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script type="text/javascript" >

    var usd = $("#tien").val();    
    paypal.Button.render({
        
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'AT95aNx0vC1CqBTOXvTMR7MlyPJPebL_wVhoYO_N7g-pdYUrVRC4KskZJXFRGlajisftSH6MOn3ICold',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: `${usd}`,
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                // Show a confirmation message to the buyer
                window.alert('Thanh toán thành công ');
                window.location.replace("thanhcong/1");
                
            });
        }
    }, '#paypal-button');
    
    </script>
@endsection
<style>
.col-lg-8 {
    border: 1px solid black;
    align-items: center !important;
}

.form-group {
    font-size: 20;
    border: 1px solid black;
    height: 60;
    line-height: 2;
    padding-left: 50 !important;
    width: 60%;

    -moz-user-select: none;
    text-transform: uppercase;
    color: black;
    cursor: pointer;
    display: inline-table;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1px;
    line-height: 0;
    margin-bottom: 0;
    padding: 27px 44px;
    border-radius: 5px;

    margin: 10px;
    cursor: pointer;
    transition: color 0.4s linear;
    position: relative;
    z-index: 1;

    overflow: hidden;
    margin: 0;
    line-height: 40px;
    font-weight: bold;
    text-align: center;
}

.form-group::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: white;
    z-index: 1;
    border-radius: 5px;
    transition: transform 0.5s;
    transition-timing-function: ease;
    transform-origin: 0 0;
    transition-timing-function: cubic-bezier(0.5, 1.6, 0.4, 0.7);
    transform: scaleX(0);
    border-radius: 0;


}

.form-group:hover::before {
    transform: scaleX(1);
    background-image: linear-gradient(to left, #1462f3, #fafafa, #559af3);
    z-index: -1;
}

.hihi {
    border: 1px solid black;
    align-items: center !important;
    height: 30;
    text-align: center !important;
    width: 30;
    font-size: larger;
}
</style>