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
   
 
    
</script>

</head>

<hr>
<section class="contact-section">
    <div class="container">
        <div class="limiter">
            <div class="container-login100">

                <div id="form" class="wrap-login100">
                    <form  action="{{URL::to('/xacthuc')}}" method="POST" class="login100-form validate-form">
                    @csrf
                 
                        <span class="login100-form-title p-b-43">
                            Quên mật khẩu 
                        </span>
                        <br>
                        <?php $error = isset($mess)?$mess:null;  ?>
                        @if($error)
                        <p class="error">Sai mã code</p>
                        @endif
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input  id="aa" placeholder="Nhập code của bạn tại đây"  required
                                class="input100" type="text" name="code">
                            <input type="hidden" name="email" value="{{$email}}" >
                        </div>


                        <br>
                        <div class="container-login100-form-btn">
                            <button id="dangky" onclick="aaa()"  class="login100-form-btn">
                                Gửi
                            </button>
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
.error{
   
    text-align: center;
    color: red !important ;
}
.success{
   
    text-align: center;
    color: green!important ;
}
.note{
    
    text-align: center;
    color: slateblue!important ;
}
</style>
