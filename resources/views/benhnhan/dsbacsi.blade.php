@extends('welcome')
@section('datlich')

<head>


    <link rel="stylesheet" href="{{asset('public/frontend/css/dsbacsi.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
    <!-- search-->
    <div class="s009">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <span> Bác sĩ </span>

                        <h2><?php $Khoa = Session::get('khoa');
                                echo $Khoa;
                                ?></h2>
                    </div>
                </div>

                <form action="{{URL::to('/timkiem')}}" method="post">
                    @csrf
                    <input type="hidden" name="makhoa" value="<?php $makhoa = Session::get('makhoa');
                                                                    echo $makhoa;  ?>">
                    <div class="inner-form">
                        <div class="basic-search">
                            <div class="input-field">
                                <input id="search" name="hoten" type="text" placeholder="Họ tên bác sĩ" />
                                <div class="icon-wrap">
                                    <svg class="svg-inline--fa fa-search fa-w-16" fill="#ccc" aria-hidden="true"
                                        data-prefix="fas" data-icon="search" role="img" viewBox="0 0 512 512">
                                        <path
                                            d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="advance-search">
                            <span class="desc"></span>
                            <div class="row">
                                <div class="form-group">
                                    <div class="input-select">
                                        <select data-trigger="" name="gioitinh">
                                            <option placeholder="" value="">Giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-select">
                                        <select data-trigger="" name="hocvi">
                                            <option placeholder="" value="">Học vị</option>
                                            <option>Chọn hết</option>
                                            <option value="PGS"> Phó giáo sư</option>
                                            <option value="BS">Bác sĩ</option>
                                            <option value="ThS">Thạc sĩ</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- </div>
                            <div class="row third"> -->
                                <div class="input-field">
                                    <div class="result-count">
                                    </div>
                                    <div class="group-btn">

                                        <button class="button button-contactForm boxed-btn">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <hr>
            <div style="overflow-x:auto;" class="col-12">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th></th>
                        <th>Tên bác sĩ</th>
                        <th>Học vị </th>
                        <th>Khoa</th>
                        <th>giới tính</th>
                        <th></th>
                      

                    </tr>
                </thead>
                <tbody>
                    @foreach($dsbacsi as $key=>$value)
                    <tr>
                        <td> <img height="200" src="{{asset('./public/backend/img/'.$value->hinh)}}" alt="">
                        </td>
                        <td data-label="Tên :" width="40%">{{($value->TenBS)}}</td>
                        <td data-label="Học vị :"> {{($value->HocVi)}}</td>
                        <td data-label="Khoa :" width="30%">{{($value->TenKhoa)}}</td>
                        <td data-label="Giới tính"><?php if ($value->gioitinh == 0) {
                                    echo "Nữ";
                                } else {
                                    echo "Nam";
                                } ?></td>
                        <!-- <td><input type="button" class="btn" data-id="{{($value->MaBS)}}" value="Lịch khám" /> </td> -->
                       <td> <a class="btn" href="{{URL::to('/dienthongtin/chongio/'.$value->MaBS)}}" >Chọn lịch </a></td>
                    </tr>
                    <tr id="{{($value->MaBS)}}">

                    </tr>

                    @endforeach
                </tbody>

                <script type="text/javascript">
                $(document).ready(function() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('input:button').click(function() {
                        var id = $(this).data('id');
                        var flag = $(this).val();
                        //Ngày hiện tại
                        var d = new Date();

                        var Now = d.toLocaleString();
                        var date = Now.slice(10, 20);
                        //Hết 
                        if (flag == 'Lịch khám') {
                            $.ajax({
                                url: '/benhvien1/lichkham/' + id,
                                method: "GET",
                                success: function(data) {
                                    data = JSON.parse(data);

                                    var resultajax = `  <td colspan="6"   > `;
                                    console.log(data);
                                    $('#' + id).show();
                                    if (data.length > 0) {
                                        for (let i = 0; i < data.length; i++) {    //Ngày trực
                                            var string = data[i].NgayTruc;
                                            var Days = string.slice(8, 10) + "/" + string
                                                .slice(5, 7);
                                            if( data[i].count < 5 ){
                                            resultajax +=
                                                `<a href="{{URL::to('/dienthongtin/` + data[
                                                    i].MaLT + `')}}"class="btnx" > ` + data[
                                                    i].Buoi + `:` + Days +`(`+ data[i].count+`/5)</a>`
                                                    }
                                                    else {
                                                        resultajax +=
                                                `<a class="btnx error" > ` + data[
                                                    i].Buoi + `:` + Days +`( `+ data[i].count+`/5)</a>`
                                                    }
                                        }
                                    } else if (data.length == 0) {
                                        resultajax +=
                                            ` <a class="btnxx" > Không có ca trực </a> <br>`
                                    }
                                    var x = resultajax + `</td> `
                                    $('#' + id).html(x);
                                },
                                error: function(data){
                                    var x = `  <td colspan="6"   ><a class="btnxx" > Không có ca trực </a> <br> `;
                                    $('#' + id).show();
                                    $('#' + id).html(x);
                                }

                            })
                        }
                    })
                });
                function time1(){
                    const y = document.querySelector('#')
                }

                </script>

            </table>
            </div>
        </div>

    </div>

    <!--endsearch-->

 

    @endsection


    <style>
    .error{
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
  table img{
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