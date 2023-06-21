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
if($count >0){
foreach ($lichtruc as $key => $value) {
    $LT[] = $value->NgayTruc;
}
$LT = array_unique($LT);
foreach($LT as $key=>$value){
    $LT1[]=$value;
}
$leng = count($LT1);
}
for ($day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym . '-' . $day;
    $date1 = date_create($date);
    $date2 = date_format($date1, "Y-m-d");
    $tag = false;
    if ($today == $date) {
        $week .= '<td data-id="' . $date2 . '" class="btnday success" >' . $day;
    } else {
        if($count>0){
        for ($i = 0; $i < $leng; $i++) {
            $NT = $LT1[$i];
            if (strtotime($date2) == strtotime($NT)) {
                $week .= '<td  data-id="' . $date2 . '" class="btnday danger" >' . $day;
                $tag = true;
            }
        }
        if (!$tag) {
            $week .= '<td data-id="' . $date2 . '" >' . $day;
        }}
        else{
            $week .= '<td data-id="' . $date2 . '" >' . $day;
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
@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('public/backend/css/lichtruc.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-4">

                <div id="bacsi" class="single-team mb-30">

                    <div class="team-caption">
                        <h2 class="contact-title">Thông tin lịch trực</h2>
                       
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
                            url: '/benhvien1/bac-si/lich-truc/' + id,
                            method: "GET",
                            success: function(data) {
                                data = JSON.parse(data);
                                var resultajax = `  <div class="team-caption">
                        <h2 class="contact-title">Thông tin lịch trực</h2>
                        <br>
                        <br>
                        <h3 class="far fa-calendar-alt">&nbsp; `+id+` </h3>

                        <hr>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">`;
                                console.log(data);
                                $('#bacsi').show();
                                if (data.length > 0) {
                                    for (let i = 0; i < data.length; i++) {
                                        resultajax += `   <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">Ca trực :`+data[i].Buoi+`</h5>
                                        <h5 class="card-title">Phòng :`+data[i].MaPhong+`</h5>
                                        <h5 class="card-title">Lịch hẹn :`+data[i].count+`</h5>
                                        <hr>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <br>
                                    <br>
                                    <h4><a href="{{URL::to('/bac-si/lich-hen/` + data[i].MaLT + `')}}"> Xem </a></h4>
                                </div>`
                                    }
                                     resultajax += `  </div>
                                            </div>
                                        </div>
                                     <hr>`
                                }
                                $('#bacsi').html(resultajax);
                            }
                        })
                    })
                });
            </script>
            <div class="col-8">
                <div class="row"> &nbsp; &nbsp; &nbsp;
                    <a class="btny" href="?ym=<?php echo $prev; ?>">&lt;</a> &nbsp; &nbsp; &nbsp;
                    <span class="btny"><?php echo $html_title; ?></span> &nbsp; &nbsp; &nbsp;
                    <a class="btny" href="?ym=<?php echo $next; ?>">&gt;</a>
                    &nbsp;
                    <a class="btny" href="{{URL::to('/bac-si/lich-truc')}}">Hôm nay</a>
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
</div>

@endsection