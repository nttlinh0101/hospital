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
    <?php
$error = Session::get('thongbaodangky');
$success = Session::get('thongbaodangky1');
if($error){
?>
    $(document).ready(function(){
    $("#dangky").trigger('click'); 
        });
    <?php
    }
    ?>   
    function myFunction() {
        const ipnElement = document.querySelector('.input101')


        const currentType = ipnElement.getAttribute('type')
        
        ipnElement.setAttribute(
            'type',
            currentType === 'password' ? 'text' : 'password'
        )
        // ipnElement1.setAttribute(
        //     'type',
        //     currentType1 === 'password' ? 'text' : 'password'
        // )
    };

    function aaa() {
        const x = document.querySelector('#form')
        x.innerHTML = `<form action="{{URL::to('/dangky')}}" method="post" class="login100-form validate-form">
        @csrf
<span class="login100-form-title p-b-43">
Đăng Ký
</span>
<h3 class="Success"><?php echo $success ; ?></h3>
<h3 class="error"><?php echo $error ; ?></h3>
<div class="wrap-input100 validate-input" >
<input required class="input100"  type="text" id="tenx"   name="ten" placeholder="Họ và tên">

</div>


<div class="wrap-input100 validate-input">
<input id="aa" placeholder="Nhập số điện thoại" pattern="[0-9]{10}"  title="Số điện thoại gồm 10 số "  required class="input100" type="phone" name="phone">                        
 </div>
 <div class="wrap-input100 validate-input">
<input id="aa" placeholder="Nhập Email"    required class="input100" type="email" name="email">                        
 </div>

<div class="wrap-input100 validate-input" data-validate="Password is required">
<input required class="input100 input101" id="pass1" pattern=".{6,}" title="Mật khẩu ít nhất 6 ký tự"  type="password" name="pass1" placeholder="Mật khẩu">

</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<input onkeyup="test()" required class="input100 input1011" id="pass2" type="password" name="pass2" placeholder="Nhập lại mật khẩu">

</div>
<div id="error"></div>
<div class="flex-sb-m w-full p-t-3 p-b-32">
<div>

<input onclick="myFunction()" id="check" type="radio"> &nbsp; Hiện mật khẩu
<label class="label" for="ckb1">

</label>
</div>
</div>


<div class="container-login100-form-btn">
<button class="login100-form-btn">
Đăng Ký
</button>
</div>
<div class="text-center p-t-46 p-b-20">
<span class="txt2">

</span>
</div>

</form>
<div class="login100-more">
 <img height="780" width="610" src="{{asset('public/frontend/img/hero/dangnhap.png')}}" alt="">
</div>`;
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function test(){
        
        const y = document.querySelector('#error')
        var pass1 = $('#pass1').val();
        var pass2 = $('#pass2').val();
        if(pass1 == pass2){
            y.innerHTML='<h3 class="success"> Đã khớp </h3>';
        }else{
            y.innerHTML='<h3 class="error"> Chưa  khớp </h3>';
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
                    <form  action="{{URL::to('/login')}}" method="POST" class="login100-form validate-form">
                    @csrf
                    <?php
                        $thongbao = Session::get('thongbaodangnhap');
                        if($thongbao)
                        {
                        ?>
                        <h3 class="note"> <?php echo $thongbao; ?></h3>
                        <?php
                        }
                        ?>
                        <span class="login100-form-title p-b-43">

                            Đăng nhập
                        </span>
                       

                        <h3 class="Success"><?php echo $success ; ?></h3>
                        <br>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input  id="aa" placeholder="Nhập số điện thoại" onkeyup="test()" required
                                class="input100" type="phone" name="phone">


                        </div>


                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input required class="input100" type="password" name="pass">
                            <span class="focus-input100"></span>
                            <span class="label-input100">Mật khẩu</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                Đăng nhập
                            </button>
                        </div>
                        <br>
                        <div class="container-login100-form-btn">
                            <button id="dangky" onclick="aaa()"  class="login100-form-btn">
                                Đăng Ký
                            </button>
                        </div>
                        <div class="container-login100-form-btn">
                            <p><a href="{{URL::to('/quenmatkhau')}}">Quên mật khẩu ?</a></p>
                        </div>
                        <div class="text-center p-t-46 p-b-20">
                            <span class="txt2">

                            </span>
                        </div>
                    </form>

                    <div class="login100-more">
                        <img height="780" width="610" src="{{asset('public/frontend/img/hero/dangnhap.png')}}" alt="">
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
