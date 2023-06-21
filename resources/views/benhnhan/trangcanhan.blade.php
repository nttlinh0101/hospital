@extends('welcome')
@section('datlich')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>




    <script type="text/javascript">




    </script>


</head>

<hr>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{URL::to('/trangcanhan')}}" class="btnx btn form-group">
    &nbsp;&nbsp;&nbsp; Hồ sơ bệnh nhân &nbsp;&nbsp;&nbsp;
</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="{{URL::to('/trang-ca-nhan/lich-kham/')}}" class="btnx btn form-group">
    &nbsp;&nbsp;&nbsp; Lịch khám bệnh &nbsp;&nbsp;&nbsp;
</a>
<section class="contact-section">

    <div class="container">

        <div class="row">
            <div class="col-2">


            </div>

            <div id="form" class="col-8">
                <h3>Hồ sơ bệnh nhân</h3>
                <br>
                <br>
                <table id="myTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã bệnh nhân</th>
                            <th>Tên bệnh nhân</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th></th>

                        </tr>
                    </thead>
                    @foreach($benhnhan as $key=> $bn)
                    <tr>
                        <td id="hello" data-label="Mã bệnh nhân :">{{($bn->MaBN)}}</td>
                        <td data-label="Tên bệnh nhân :">{{($bn->TenBN)}}</td>
                        <td data-label="Giới tính :"><?php if ($bn->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                        <td data-label="Ngày sinh :">{{($bn->Ngaysinh)}}</td>
                        <td data-label="Số điện thoại:">{{($bn->DienThoai)}}</td>
                        <td><a style="color: green;" class="hihi" data-id="{{($bn->MaBN)}}">Chi tiết</a> | <a style="color: red;" class="hihix" data-id="{{($bn->MaBN)}}">Xóa</a> </td>
                    </tr>
                    @endforeach
                </table>


            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                            $('.hihi').click(function() {
                                var id = $(this).attr('data-id');
                                $.ajax({
                                    url: '/benhvien1/trangcanhan/chi-tiet-benh-nhan/' + id,
                                    method: "GET",
                                    success: function(data) {
                                        data = JSON.parse(data);

                                        var resultajax = `    <h3>Thông tin bệnh nhân</h3>
                <br>
                <br>
                <form  class="" action="{{URL::to('/trang-ca-nhan/cap-nhat')}}" method="post"
                    enctype="multipart/form-data" >
                    @csrf `;
                                        console.log(data);
                                        $('#form').show();
                                        for (let i = 0; i < data.length; i++) {
                                            var gioitinh = "";
                                            if (data[i].gioitinh == 0) {
                                                gioitinh = "Nữ";
                                            } else {
                                                gioitinh = "Nam";
                                            } //Ngày trực
                                            resultajax += `  <div class="row">

<div class="col-6"> 
    <label class="form-label">Họ Tên :</label>
    <input type="hidden" name="MaBN" value="` + data[i].MaBN + `">
    <input name="ten" value="` + data[i].TenBN + `" class="form-control">
</div>
<div class="col-4">
    <label class="form-label">Giới tính :</label>
    <select name="gioitinh" class="form-control">
        <option value="` + data[i].gioitinh + `">` + gioitinh + `</option>
        <option value="1">Nam</option>
        <option value="0">Nữ</option>
    </select>
</div>
<div class="col-6">
    <label class="form-label">Ngày sinh</label>
    <input name="ngaysinh" type="date" value="` + data[i].Ngaysinh + `" class="form-control">
</div>
<div class="col-6">
    <label class="form-label">Số điện thoại </label>
    <input name="sdt" value="` + data[i].DienThoai + `" class="form-control">
</div>
<div class="col-6">
    <label class="form-label">CMND</label>
    <input name="cmnd" value="` + data[i].CMND + `" class="form-control">
</div>

<div class="col-6">
    <label class="form-label">Địa chỉ</label>
    <input name=diachi value="` + data[i].DiaChi + `"class="form-control">
</div>
<div class="col-6">
    <label class="form-label">Tiền sử bệnh</label>
    <textarea name="tiensubenh" value="` + data[i].Tiensubenh + `" class="form-control"></textarea>
</div>

<div class="col-2">
    <label class="form-label">Hình ảnh</label>
    <input name="hinh" type="file" class="form-control-file">
    <br>
</div>`
                                            if ((data[i].hinh).length == 0) {
                                                resultajax += ``

                                            } else {
                                                resultajax += `<div class="col-3">

<br>

<img data-magnifyby="6" src="{{asset('./public/uploads/benhan/` + data[i].hinh + `')}}" height='100' alt='' />
</div>`
                                            }

                                        }
                                        var x = resultajax + ` </div>
                    <button class="btn" type="submit">Cập nhật </button>
                </form>`
                                        $('#form').html(x);
                                    }
                                })
                            });

                            $('.hihix').click(function() {
                                var id = $(this).attr('data-id');
                                $.ajax({
                                    url: '/benhvien1/trangcanhan/xoa/' + id,
                                    method: "GET",
                                    success: function(data) {
                                        alert(data);
                                        if(data.length != 51){
                                        location.reload();
                                        }
                                        
                                    }

                                })

                                });


                            });
            </script>
        </div>

    </div>
</section>

@endsection
<style>
    .hihi {
        color: red;
        cursor: pointer;
    }

    .hihix {
        color: red;
        cursor: pointer;
    }

    input {
        font-size: 20px !important;

    }

    @media screen and (max-width: 600px) {


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

        table td::before {

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
    table td {
        text-align: center;
    }

    .error {
        color: red;
    }

    .success {
        color: green;
    }

    h3 {
        text-align: center !important;
        font-weight: bolder !important;
    }

    .btnx {
        font-size: 1.5rem;
        background-color: skyblue;
        border: 1px solid black;
        -moz-user-select: none;
        text-transform: uppercase;
        color: black;
        cursor: pointer;
        border-radius: 5px;
        margin: 10px;
        cursor: pointer;
        line-height: 40px;
        font-weight: bold;
        text-align: center;
    }

    .btnx::before {
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


    a:hover {
        color: black !important;
    }
</style>