<?php
// Set your timezone
date_default_timezone_set('asia/ho_chi_minh');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

// Check format
$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j', time());

// For H3 title
$html_title = date('m / y', $timestamp);

// Create prev & next month link     mktime(hour,minute,second,month,day,year)
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));
// You can also use strtotime!
// $prev = date('Y-m', strtotime('-1 month', $timestamp));
// $next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 0:Sun 1:Mon 2:Tue ...
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
//$str = date('w', $timestamp);


// Create Calendar!!
$weeks = array();
$week = '';

// Add empty cell
$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym . '-' . $day;
    $date1 = date_create($date);
    $date2 = date_format($date1, "Y-m-d");

    if ($today == $date) {
        $week .= '<td class="btny">' . $day;
    } else {
        if (strtotime($date) < strtotime($today)) {
            $week .= '<td class="">' . $day;
        } else {
            $week .= '<td data-id="' . $date2 . '" class="btnday">' . $day;
        }
    }
    $week .= '</td>';

    // End of the week OR End of the month
    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            // Add empty cell
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        // Prepare for new week
        $week = '';
    }
}
?>
@extends('welcome')
@section('datlich')
<style>
    .container {
        font-family: 'Noto Sans', sans-serif;
        margin-top: 80px;
    }

    a {
        color: black;
    }

    h3 {
        margin-bottom: 30px;
    }

    th {
        height: 30px;
        text-align: center;
    }

    td {
        height: 100px;
    }

    .today {
        background: orange;
    }

    th:nth-of-type(1),
    td:nth-of-type(1) {
        color: red;
    }

    th:nth-of-type(7),
    td:nth-of-type(7) {
        color: blue;
    }

    .btnday {
        background-image: linear-gradient(to left, #fafafa, #559af3);
        -moz-user-select: none;
        /* text-transform: uppercase; */
        /* color:black;
    cursor: pointer; */
        /* display: inline-table; 
    font-size: 14px; */
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
        font-size: medium;
        line-height: 40px;
        font-weight: bold;
        text-align: center;
    }

    .btnday::before {
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

    .btnday:hover::before {
        transform: scaleX(1);
        color: #fff !important;
        z-index: -1;
    }

    .btny {
        background-color: antiquewhite;
        -moz-user-select: none;

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

        line-height: 40px;
        font-weight: bold;
        text-align: center;
    }

    @media only screen and (min-width: 320px) and (max-width: 860px) {


        th {
            height: 30px;
            text-align: center;
        }

        td {
            height: 50px;
        }

        .today {
            background: orange;
        }

        th:nth-of-type(1),
        td:nth-of-type(1) {
            color: red;
        }

        th:nth-of-type(7),
        td:nth-of-type(7) {
            color: blue;
        }

        .btnday {
            background-image: linear-gradient(to left, #fafafa, #559af3);
            -moz-user-select: none;

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
            font-size: small;
            line-height: 40px;
            font-weight: bold;
            text-align: center;
        }

        .btnday::before {
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

        .btnday:hover::before {
            transform: scaleX(1);
            color: #fff !important;
            z-index: -1;
        }

        .btny {
            background-color: antiquewhite;
            -moz-user-select: none;
            border-radius: 5px;
            height: 5rem !important;
            font-weight: bold;
            text-align: center;
            width: 5rem !important;
            line-height: 20px !important;

        }


        .col-4 {
            max-width: 100% !important;
            flex: 100%;
        }

        .col-8 {
            max-width: 100% !important;
            flex: 100%;
        }
    }
</style>
<link rel="stylesheet" href="{{asset('public/frontend/css/dsbacsi.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<body>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-4">

                <div id="bacsi" class="single-team mb-30">
                    <?php $tenkhoa = Session::get('khoa'); ?>
                    <div class="team-caption">
                        <h2 class="contact-title">Thông tin khám</h2>
                        <h3 class="far fa-address-card"> &nbsp; &nbsp; <?php echo $tenkhoa; ?></h3>

                    </div>
                    <hr>


                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('.btnday').click(function() {
                        var id = $(this).attr('data-id');
                        $.ajax({
                            url: 'ngaytruc/' + id,
                            method: "GET",
                            success: function(data) {
                                data = JSON.parse(data);
                                var resultajax = ` <div class="team-caption">
                        <h2 class="contact-title">Thông tin khám</h2>
                        <h3 class="far fa-address-card"> &nbsp; &nbsp; <?php echo $tenkhoa; ?></h3>
                        &nbsp; 
                        <h3 class="far fa-calendar-alt">&nbsp; ` + id + ` </h3>

                    </div>
                    <hr>`;
                                console.log(data);
                                $('#bacsi').show();
                                if (data.length > 0) {
                                    for (let i = 0; i < data.length; i++) {
                                        if (data[i].Buoi.toLowerCase() === "sáng") {
                                            resultajax += `  <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img height="100" width="100" src="{{asset('./public/backend/img/` + data[i].hinh + `')}}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">` + data[i].HocVi + `</h5>
                                    <p class="card-text">` + data[i].TenBS + `</p>
                                    <p class="card-text"> Phòng :` + data[i].MaPhong + ` &nbsp; &nbsp;/ &nbsp;   Buổi ` + data[i].Buoi + `</p>
                                    <input onclick="hii(` + data[i].MaLT + `,'`+data[i].Buoi+`')"  value="chọn" class="btn ahi" type="submit"  />
                                </div>
                            </div>
                                       
                        </div>
                        </div>
                        <div id="`+data[i].MaLT+`" class="row g-0">
                         
                            
                        </div>
                        <hr>
                    
                        `

                                        } else if ((data[i].Buoi.toLowerCase() === "chiều")) {
                                            resultajax += ` <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img height="100" width="100" src="{{asset('./public/backend/img/` + data[i].hinh + `')}}" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">` + data[i].HocVi + `</h5>
                            <p class="card-text">` + data[i].TenBS + `</p>
                            <p class="card-text"> Phòng :` + data[i].MaPhong + ` &nbsp; &nbsp;/ &nbsp; Buổi ` + data[i].Buoi + `</p>
                            <input onclick="hii(` + data[i].MaLT + `,'`+data[i].Buoi+`')"  value="chọn" class="btn ahi" type="submit"  />
                        </div>
                    </div>

                </div>
            </div>
            <div id="`+data[i].MaLT+`" class="row g-0">

            
            </div>
            <hr>
            `

                                        }
                                    }
                                } else {
                                    resultajax += ` <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Không có ca trực</h5>

                        </div>
                    </div>
                </div>
            </div> `
                                }

                                $('#bacsi').html(resultajax);
                            }
                        })
                    });



                });

                function hii(id,buoi) {
                    $.ajax({
                        url: '/benhvien/dienthongtin/chongio/gio/' + id,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);
                            var resultajax = '';
                            console.log(data);
                    $('#'+id).show();
                    if (buoi.toLowerCase() === "sáng") {
                        if(data[0].ca1 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=07:00')}}"  class="col-3 box" >7:00 - 8:00 (`+data[0].ca1+`/5)</a>`
                        }
                        if(data[0].ca2 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=08:00')}}"  class="col-3 box" >8:00 - 9:00 (`+data[0].ca2+`/5)</a>`
                        }
                        if(data[0].ca3 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=09:00')}}"  class="col-3 box" >9:00 - 10:00 (`+data[0].ca3+`/5)</a>`
                        }
                        if(data[0].ca4 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=010:00')}}"  class="col-3 box" >10:00 - 11:00 (`+data[0].ca4+`/5)</a>`
                        }
                        
                    }
                    else{
                        if(data[0].ca5 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=13:30')}}"  class="col-3 box" >13:30 - 14:30 (`+data[0].ca5+`/5)</a>`
                        }
                        if(data[0].ca6 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=14:30')}}"  class="col-3 box" >14:30 - 15:30 (`+data[0].ca6+`/5)</a>`
                        }
                        if(data[0].ca7 < 5){
                            resultajax += ` <a href="{{URL::to('/dienthongtin?malt=` + id + `&time=15:30')}}"  class="col-3 box" >15:30 - 16:30 (`+data[0].ca7+`/5)</a>`
                        }
                    }
                    $('#'+id).html(resultajax);
                           

                        }
                    })
                }
            </script>

            <div class="col-8">
                <div class="row"> &nbsp; &nbsp; &nbsp;
                    <a class="btny" href="?ym=<?php echo $prev; ?>">&lt;</a> &nbsp; &nbsp; &nbsp;
                    <span class="btny"><?php echo $html_title; ?></span> &nbsp; &nbsp; &nbsp;
                    <a class="btny" href="?ym=<?php echo $next; ?>">&gt;</a>
                    &nbsp;
                    <a class="btny" href="{{URL::to('/theongay')}}">Hôm nay</a>
                </div>
                <br>
                <table class="table table-bordered">
                    <tr>
                        <th>Chủ nhật </th>
                        <th>Thứ 2</th>
                        <th>Thứ 3</th>
                        <th>Thứ 4</th>
                        <th>Thứ 5</th>
                        <th>Thứ 6</th>
                        <th>Thứ 7</th>
                    </tr>
                    <?php
                    foreach ($weeks as $week) {

                        echo $week;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
<style>
    .box {
        color: blue !important;
        border: 1px solid #559af3;
        border-radius: 5px;
        font-size: 1.1rem;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        line-height: 4rem;
        width: auto;


    }

    .col-3 {
        height: 5rem;
    }
</style>
@endsection