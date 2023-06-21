@extends('welcome')
@section('datlich')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('public/frontend/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/util.css')}}">
    <script type="text/javascript">
function test(){
        
        const y = document.querySelector('#error')
        const x = document.querySelector('#button')
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();
        if(pass1 == pass2){
            y.innerHTML='<h3 class="success"> Đã khớp </h3>';
            x.innerHTML =`  <button id="dangky" onclick="aaa()" class="login100-form-btn">
                                Gửi
                            </button>`
        }else{
            y.innerHTML='<h3 class="error"> Chưa  khớp </h3>';
            x.innerHTML =``
        } 
    } ;


    </script>

</head>

<hr>
<section class="contact-section">
    <div class="container">
        <div class="limiter">
            <div class="container-login100">

                <div id="form" class="wrap-login100">
                    <form action="{{URL::to('/cap-nhat-mat-khau')}}" method="POST" class="login100-form validate-form">
                        @csrf

                        <span class="login100-form-title p-b-43">
                            Đổi mật khẩu
                        </span>
                        <br>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input required class="input100 input101" id="pass1" pattern=".{6,}"
                                title="Mật khẩu ít nhất 6 ký tự" type="password" name="pass1"
                                placeholder="Mật khẩu">

                        </div>
                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input onkeyup="test()" required class="input100 input1011" id="pass2" type="password"
                                name="pass2" placeholder="Nhập lại mật khẩu">
                                <input type="hidden" name="email" value="{{$email}}">

                        </div>
                        <div id="error"></div>
                      


                        <br>
                        <div id="button" class="container-login100-form-btn">
                          
                        </div>
                        <div class="text-center p-t-46 p-b-20">
                            <span class="txt2">

                            </span>
                        </div>
                    </form>

                    <div class="login100-more">
                        <img height="720" width="610" src="{{asset('public/frontend/img/hero/dangnhap.png')}}" alt="">
                    </div>

                </div>
                <script type="text/javascript">


                </script>



            </div>

        </div>
    </div>

</section>

@endsection
<style>
.input101 {}

.input1011 {}

.error {

    text-align: center;
    color: red !important;
}

.success {

    text-align: center;
    color: green !important;
}

.note {

    text-align: center;
    color: slateblue !important;
}
</style>