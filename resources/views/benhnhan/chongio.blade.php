@extends('welcome')
@section('datlich')

<head>


    <link rel="stylesheet" href="{{asset('public/frontend/css/dsbacsi.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<!-- search-->
<div class="s009">
    <div class="container">
        <!-- Section Tittle -->
        <a class="title back ">Chọn bác sĩ &nbsp; &nbsp; </a> <i class="fas fa-angle-right title"></i> <a class="title"> &nbsp; &nbsp;Bác sĩ</a>
        <div class="row justify-content-center">
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.back').click(function() {

                        parent.history.back();
                        return false;
                    });
                });
            </script>
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span> Khoa </span>

                    <h2><?php $Khoa = Session::get('khoa');
                        echo $Khoa;
                        ?></h2>
                    @foreach( $bs as $key=>$bacsi)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img style="border: 1px;" height="100" width="100" src="{{asset('./public/backend/img/'.$bacsi->hinh)}}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{($bacsi->HocVi)}}</h5>
                                    <p class="card-text">{{($bacsi->TenBS)}}</p>
                                    <p class="card-text">Phòng : {{($bacsi->MaPhong)}}</p>
                                    <p id="date"></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="section-tittle text-center ">
            <span> Ca trực </span>
            <br>
            <?php if ($count > 0) { ?>
                @foreach( $catruc as $key=>$ct)

                <input type="submit" data-id="{{($ct->Buoi)}}" data-ma="{{($ct->MaLT)}}" class="btnx" value="{{($ct->Buoi)}} {{($ct->NgayTruc)}}" />



                @endforeach
            <?php
            } else { ?>
                <a class="btnxx"> Không có ca trực </a>

            <?php } ?>
            <br>
            <div id="time">

            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.btnx').click(function() {
            var id = $(this).data('id');
            var ma = $(this).data('ma');
            var date = $(this).val();
            const x = document.querySelector('#date')
            x.innerHTML = 'Ca trực : &nbsp;' + date;
            $.ajax({
                url: 'gio/' + ma,
                method: "GET",
                success: function(data) {
                    data = JSON.parse(data);
                    var resultajax = '';
                    console.log(data);
                    $('#time').show();
                    if (id.toLowerCase() === "sáng") {
                        if(data[0].ca1 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=07:00')}}"  class="box" >7:00 - 8:00  (`+data[0].ca1+`/5)</a>`
                        }
                        if(data[0].ca2 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=08:00')}}"  class="box" >8:00 - 9:00  (`+data[0].ca2+`/5)</a>`
                        }
                        if(data[0].ca3 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=09:00')}}"  class="box" >9:00 - 10:00 (`+data[0].ca3+`/5)</a>`
                        }
                        if(data[0].ca4 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=010:00')}}"  class="box" >10:00 - 11:00 (`+data[0].ca4+`/5)</a>`
                        }
                        
                    }
                    else{
                        if(data[0].ca5 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=13:30')}}"  class="box" >13:30 - 14:30  (`+data[0].ca5+`/5)</a>`
                        }
                        if(data[0].ca6 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=14:30')}}"  class="box" >14:30 - 15:30  (`+data[0].ca6+`/5)</a>`
                        }
                        if(data[0].ca7 < 5){
                            resultajax += `<a href="{{URL::to('/dienthongtin?malt=` + ma + `&time=15:30')}}"  class="box" >15:30 - 16:30 (`+data[0].ca7+`/5)</a>`
                        }
                    }
                    $('#time').html(resultajax);
                  
                }
            })

        });
    });
</script>
<!--endsearch-->



@endsection


<style>
    .box {
        color: blue;
        cursor: pointer;
        display: inline-table;
        letter-spacing: 1px;
        border: 1px solid #1462f3 !important;
        margin: 5;
        height: 50px;
        width: 200;
        line-height: 40px;
        text-align: center;
    }

    .title {
        font-size: 2rem;

    }

    .error {
        color: #ff0000 !important;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;

        }

        table img {
            height: 100px;
        }

        table td::before {
            /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }

    /* destop */
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {

        padding: .35em;
    }

    table th,
    table td {
        width: 150px;
        padding: .625em;
        text-align: center;


    }

    table th {
        background-color: aliceblue !important;
        font-size: large !important;
        font-weight: bolder;
        padding: 2rem !important;
    }






    select {
        height: 3rem !important;
        width: 15rem;
        font-size: medium;
    }

    /* td {

        line-height: 20rem;
        font-size: larger;
        padding: 2rem !important;

    } */

    .btn {



        margin-top: 0rem !important;

    }

    .btnx {



        /* text-transform: uppercase; */
        color: black;
        /* cursor: pointer; */
        display: inline-table;


        letter-spacing: 1px;

        /* margin-bottom: 0; */
        /* padding: 27px 44px; */
        /* border-radius: 5px; */

        /* transition: color 0.4s linear; */
        /* position: relative; */
        /* z-index: 1; */
        border: 1px solid black !important;
        /* overflow: hidden; */
        margin: 5;
        height: 50px;
        width: 200;
        line-height: 40px;

        text-align: center;
    }

    .btnx:hover {
        background-color: #1462f3;
    }

    .btnx:active {
        background-color: #1462f3;
    }


    a:hover {
        color: #1462f3 !important;
    }



    .btnxx {
        background-image: linear-gradient(to left, #ff6347, #ff0000, #ff6347);
        -moz-user-select: none;
        text-transform: uppercase;
        color: black;
        cursor: pointer;
        display: inline-block;
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
        border: 0;
        overflow: hidden;
        margin: 0;
        height: 30px;
        line-height: 15px;
        font-weight: bold;
    }

    .btnxx::before {
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

    .btnxx:hover::before {
        transform: scaleX(1);
        color: #fff !important;
        z-index: -1;
    }
</style>