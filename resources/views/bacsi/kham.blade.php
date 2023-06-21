@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('public/backend/css/lichtruc.css')}}">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<div class="card">
    <div class="card-body">
        <div id="form" class="row">
            <h3>Thông tin bệnh nhân</h3>
            <br>
            <br>
            <form class="" action="{{URL::to('/bac-si/capnhat/')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @foreach($benhnhan as $key => $BN)
                    <div class="col-6">
                        <label class="form-label">Họ Tên :</label>
                        <input id="malk" type="hidden" name="MaLK" value="{{($BN->MaLK)}}">
                        <input type="hidden" name="MaLT" value="{{($BN->MaLT)}}">
                        <input readonly name="ten" value="{{($BN->TenBN)}}" class="form-control">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Giới tính :</label>
                        <select readonly name="gioitinh" class="form-control">
                            <option value="{{($BN->gioitinh)}}"></option>

                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Ngày sinh</label>
                        <input readonly name="ngaysinh" type="date" value="{{($BN->Ngaysinh)}}" class="form-control">
                    </div>
                    <div class="col-4">
                        <label class="form-label">Số điện thoại </label>
                        <input readonly name="sdt" value="{{($BN->DienThoai)}}" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">CMND</label>
                        <input readonly name="cmnd" value="{{($BN->CMND)}}" class="form-control">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Địa chỉ</label>
                        <input readonly name=diachi value="{{($BN->DiaChi)}}" class="form-control">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Tiền sử bệnh</label>
                        <textarea readonly name="tiensubenh" value="{{($BN->Tiensubenh)}}" class="form-control"></textarea>


                        <br>
                    </div>

                    @if(strlen($BN->hinh)>0)
                    <div class="col-3">
                        <label class="form-label">Hình ảnh</label>
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"><img id="imgSmile" style="width:200px; height:150px" src="{{asset('./public/uploads/benhan/'.$BN->hinh)}}" />
                                <ul class="list-style-none el-info">
                                    <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{asset('./public/uploads/benhan/'.$BN->hinh)}}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>




                <button name="submit" class="btn btn-danger" value="3">Vắng </button>
                <button name="submit" class="btn btn-success" value="2"> Đã khám </button>


                @endforeach
            </form>
        </div>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="form" class="row">
            <br>
            <br>
            <!-- <form class="input101" action="{{URL::to('/bac-si/print-toa-thuoc')}}" method="post" enctype="multipart/form-data"> -->
            @csrf
            <div class="row">
                <div class="col-12">
                    <center>
                        <h3>Chẩn đoán bệnh</h3>
                    </center>
                </div>
                <input type="hidden" name="MaLK" value="{{($BN->MaLK)}}">
                <div class="col-12">
                    <label class="form-label">Triệu chứng :</label>
                    <textarea id="tc" name="trieuchung" class="form-control"></textarea>
                </div>

                <div class="col-4">
                    <!-- 
                        <script type="text/javascript">
                            var text = '';
                            function tchung() {
                                var checkbox = document.getElementsByName('hobby');
                                var result = "";
                                // Lặp qua từng checkbox để lấy giá trị
                                for (var i = 0; i < checkbox.length; i++) {
                                    if (checkbox[i].checked === true) {
                                        result +=  checkbox[i].value + ', ';
                                    }

                                }
                                var tay = $('.tc').val();
                                if (tay.length > 0)
                                {
                                    tay= tay+',';
                                }
                                text += tay;
                                const y = document.querySelector('#tc');
                                y.innerHTML= result + text;
                                $('.tc').val('');
                            };

                          
                        </script> -->
                </div>

                <div class="col-12">
                    <label class="form-label">Chẩn đoán bệnh </label>
                    <textarea id="benh" name="benh" class="form-control"></textarea>
                </div>


                <div class="col-12">
                    <label class="form-label">Toa thuốc </label>
                    <textarea id="toathuoc" name="toathuoc" class="form-control"></textarea>
                </div>

                <div class="col-12">
                    <label class="form-label">ghi chú </label>
                    <textarea id="ghichu" name="toathuoc" class="form-control"></textarea>
                </div>

                <div class="col-4">
                    <br>
                    <br>
                    <input type="submit" onclick="xacthuc()" class="form-control btn btn-danger" value="In ">
                </div>

            </div>



            <?php $x = Session::get('alert'); ?>

            <script type="text/javascript">
                function xacthuc() {
                    var id = $('#malk').val();
                    var x = $('#tc').val();
                    var y = $('#benh').val();
                    var z = $('#toathuoc').val();
                    var n = $('#ghichu').val();
                    console.log(x);
                    if (confirm("xác nhận in đơn thuốc !") == true) {
                        window.location.assign('print-toa-thuoc?tc=' + x + '&benh=' + y + '&toathuoc=' + z + '&ghichu=' + n + '&malk=' + id);
                    } else {

                    }
                }
                $(document).ready(function() {
                    <?php if(strlen($x)>5){ ?>
                    alertt();
                    function alertt() {
                        alert("bạn cần giải quyết lịch khám này !");
                    };
                    <?php }
                     Session::put('alert',"");
                    ?>
                });
            </script>
            <!-- </form> -->
        </div>

    </div>
</div>


@endsection



<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js">
    $(document).ready(function() {
        alertt();
        var flag = false;
        $('#imgSmile').click(function() {
            if (flag == false) {
                flag = true; {
                    $(this).animate({
                        width: "500px",
                        height: "500px"
                    }, 'slow');
                }
            } else {
                {
                    flag = false;
                    $(this).animate({
                        width: "200px",
                        height: "300px"
                    }, 'slow');
                }
            }
        });

        function alertt() {
            alert("bạn cần giải quyết lịch khám này !");
        };
    });
</script>