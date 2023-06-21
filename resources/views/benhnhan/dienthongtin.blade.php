@extends('welcome')
@section('datlich')
<?php

$id = Session::get('id-user');
$sodienthoai = Session::get('sodienthoai');
$ten = Session::get('ten');
?>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function hi() {
            var a = $('#hinh').val();
            var duoi = a.slice(-3);
            var duoi1 = duoi.toLowerCase();
            if(duoi1.length>0){
            const hople = ["jpg", "png", "peg"];
            var a = hople.includes(duoi1);
           if(a==true){
               
           }else{
               alert("Không hợp lệ ");
               $('#hinh').val('');
           }
            }

        };
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bn').change(function() {
                var id = $(this).val();
                if (id.length > 0) {
                    $.ajax({
                        url: '/benhvien1/dienthongtin/lay-benh-nhan/' + id,
                        method: "GET",
                        success: function(data) {
                            data = JSON.parse(data);

                            var resultajax = `<form class="" action="{{URL::to('/dienthongtin')}}" method="post" enctype="multipart/form-data">
                        @csrf `;
                            console.log(data);
                            $('#f').show();
                            for (let i = 0; i < data.length; i++) {
                                var gioitinh = "";
                                if (data[i].gioitinh == 0) {
                                    gioitinh = "Nữ";
                                } else {
                                    gioitinh = "Nam";
                                } //Ngày trực
                                resultajax += `          <br>
                    <br>
            
                    <div class="col-12">
                        <h3 class="">Thông tin bệnh nhân</h3>
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="col-sm-8">
                        <div class="form-group">
                            Họ và tên: <input value="` + data[i].TenBN + `" class="form-control" name="ten" required type="text"
                                placeholder="Nhập tên bệnh nhân">
                            <input name="MaBN" value="` + data[i].MaBN + `" type="hidden"  >
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">

                            Ngày sinh: <input class="form-control valid" value=` + data[i].Ngaysinh + ` name="ngaysinh" type="date"
                                placeholder="Ngày sinh">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                         Giới tính :<select name="gioitinh" class="form-control">
                         <option value="` + data[i].gioitinh + `">` + gioitinh + `</option>
                         <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                         </select>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            Số điện thoại :<input id="sdt" class="form-control valid" value="` + data[i].DienThoai + `" required name="sdt" type="text"
                                placeholder="Nhập số điện thoại">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            CMND :<input class="form-control" value="` + data[i].CMND + `" name="cmnd" type="text" placeholder="CMND/CCCD">
                        </div>
                    </div>
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

                  
                    <div class="col-sm-8">
                        <div class="form-group">
                            Địa chỉ :<input class="form-control" name="diachi" value="` + data[i].DiaChi + `"  type="text" placeholder="Số nhà">
                        </div>
                    </div>
                
                    <div class="col-sm-5">
                        <div class="form-group">
                            Tiền sử bệnh :<textarea value="` + data[i].tiensubenh + `" class="form-control" name="tiensubenh" 
                                placeholder="Tiền sử bệnh"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">(hình đính kèm)
                            <input id="hinh" class="form-control" name="hinh" type="file" placeholder="">
                        </div>
                    </div>`
                                if ((data[i].hinh).length == 0) {
                                    resultajax += ``

                                } else {
                                    resultajax += `<div class="col-3">

<br>

<img data-magnifyby="6" src="{{asset('./public/uploads/benhan/` + data[i].hinh + `')}}" height='100' alt='' />
</div>
`
                                }



                            }


                            var x = resultajax + ` <div class="form-group col-5">
                    <button id="submit" onclick="hi()" type="submit" class="button  boxed-btn">Hoàn tất </button>
                </div>`
                            $('#f').html(x);
                        }
                    })
                }
            })
        });
    </script>
</head>
<hr>
<section class="contact-section">
    <div class="container">


        <div class="row">
            <div class="col-sm-5">
                <div class="form-group">
                    <h4> <label class="form-label">Hồ sơ bệnh nhân :</label></h4>
                    <select id="bn" class="form-control">
                        <option>---Chọn hồ sơ-----</option>
                        @foreach($benhnhan as $key=>$BN)
                        <option value="{{($BN->MaBN)}}">{{($BN->TenBN)}}</option>
                        @endforeach
                    </select>
                    <!-- <input checked onclick="doi1()" class=" valid" name="doituong" id="minh" type="radio"> Đặt cho
                        mình
                        <input onclick="doi()" class=" valid" name="doituong" id="nguoithan" type="radio"> Đặt cho
                        người thân -->
                </div>
            </div>
            <div id="f" class="col-lg-8">

             
                    <form class="" action="{{URL::to('/dienthongtin')}}" method="post" enctype="multipart/form-data">
                        @csrf
            
                <div class="row">
             

                    <div class="col-12">
                    <br>
                        <h3 class="">Thông tin bệnh nhân</h3>
                        <br>
                    </div>
                    <br>
                    <br>
                    <br>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <input class="form-control" name="ten" required type="text" placeholder="Nhập tên bệnh nhân">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">

                            (Ngày sinh) <input class="form-control valid" name="ngaysinh" type="date" placeholder="Ngày sinh" 
                            max="<?php $day = date('Y-m-d', strtotime(' - 365 days'));
                                            echo $day; ?>">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input checked value="1" class=" valid" name="gioitinh" id="minh" type="radio">Nam
                            &nbsp; &nbsp;
                            <input class=" valid" value="0" name="gioitinh" id="nguoithan" type="radio">Nữ
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input id="sdt" class="form-control valid" required name="sdt" type="text" placeholder="Nhập số điện thoại">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <input class="form-control" name="cmnd" type="text" placeholder="CMND/CCCD">
                        </div>
                    </div>
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

                    <div class="col-sm-3">
                        <label>Tỉnh </label>
                        <div class="form-group">

                            <select name="tp" class="form-control">
                                <option>Nghệ An</option>
                                <option>Hà Tĩnh</option>
                                <option>Thanh Hóa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label>(Quận Huyện ) </label>
                        <div class="form-group">

                            <select id="quan" name="quan" class="form-control">

                                <option selected></option>
                                @foreach($quan as $key=>$value)
                                <option value="{{($value->namequan)}}">{{($value->namequan)}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $('#quan').change(function() {
                                var id = $(this).val();
                                $.ajax({
                                    url: 'quan/' + id,
                                    method: "GET",
                                    success: function(data) {
                                        data = JSON.parse(data);
                                        var resultajax = ``;
                                        console.log(data);
                                        $('#phuong').show();
                                        if (data.length > 0) {
                                            for (let i = 0; i < data.length; i++) {
                                                resultajax += `<option value="` + data[i]
                                                    .name + `">` + data[i].name +
                                                    `</option>`
                                            }
                                        }
                                        $('#phuong').html(resultajax);
                                    }
                                })
                            })
                        });
                    </script>
                    <div class="col-sm-3">
                        <label>(Phường xã ) </label>
                        <div class="form-group">

                            <select name="phuong" id="phuong" class="form-control">
                                <option></option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input class="form-control" name="sonha" type="text" placeholder="Số nhà">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input class="form-control" name="duong" type="text" placeholder="Đường">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <textarea class="form-control" name="tiensubenh" type="" placeholder="Tiền sử bệnh"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">(hình đính kèm)
                            <input onchange="hi()" id="hinh" class="form-control" name="hinh" type="file" placeholder="">
                        </div>
                    </div>

                    <div class="form-group col-5">
                        <button id="submit" onclick="hi()" type="submit" class="button  boxed-btn">Hoàn tất </button>
                    </div>
                </div>

                </form>
            </div>

            <div class="col-lg-3 offset-lg-1">
                @foreach($bacsi as $key => $value)
                <div class="single-team mb-30">
                    <br>
                    <br>
                    <br>

                    <h2 class="contact-title">Thông tin Bác sĩ</h2>

                    <div class="team-img">
                        <img height="300" src="{{asset('./public/backend/img/'.$value->hinh)}}"  alt="">
                    </div>
                    <div class="team-caption">

                        <h3><a href="#">{{($value->TenBS)}}</a></h3>
                        <h3><a href="#">Khoa : {{($value->TenKhoa)}}</a></h3>
                        <h5>Học vị : {{($value->HocVi)}}</h5>
                        <h5>Giới tính : <?php if ($value->gioitinh == 0) {
                                                echo "Nữ";
                                            } else {
                                                echo "Nam";
                                            } ?></h5>
                        <h5>Buổi :{{($value->Buoi)}} {{($time)}}</h5>
                        <h5>Ngày :{{($value->NgayTruc)}}</h5>
                        <h5>Phòng :{{($value->MaPhong)}}</h5>
                        <h4>Giá khám : <?php echo number_format(($value->gia));  ?> VNĐ</h4>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

@endsection
<style>
    .col-lg-8 {
        border: 1px solid black;
        align-items: center !important;
    }

    .col-lg-3 {
        border: 1px solid black;
    }

    .op {}
</style>