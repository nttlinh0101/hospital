@extends('welcome')
@section('datlich')

<head>


    <link rel="stylesheet" href="{{asset('public/frontend/css/dsbacsi.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        .img-qr {
            width: 300px;
            height: 300px;
        }
        .s009 {
            min-height: 73vh !important;
        }
    </style>
</head>
<!-- search-->
<div class="s009">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
           <img src="{{asset('public/frontend/img/qr.jpg')}}" alt="" class="img-qr">
        </div>
        {{-- <hr> --}}
        <div class="row justify-content-center mt-3">
           <h3>Nguyễn Thị Thùy Linh</h3>
        </div>
        
    </div>

</div>

<!--endsearch-->



@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<style>
  .stt{
      padding-top: 4rem;
      font-size: 30px;
      color: red;
      font-weight: bolder;
      
  }
  .stt1{
      padding: 4rem;
      color: red;
      font-weight: bolder;
      
  }

  .box{
    /* border: 1px solid black;
    line-height: 2; */
  }
</style>