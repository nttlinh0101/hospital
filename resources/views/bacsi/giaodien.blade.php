@extends('bacsi.bacsi_layout')
@section('bacsi_content')

<div class="row padding">
    <div class="col-10">
        <div class="card">
            <form action="{{URL::to('trangbacsi/capnhat')}}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Thông tin bác sĩ </h4>
                    <div class="bia"> <img height="200" width="200" src="{{asset('./public/frontend/img/gallery/bacsinam.png')}}" alt="..."></div>
                    @foreach($bacsi as $Key=>$v)
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Họ và Tên :</label>
                        <div class="col-sm-9">
                            <input readonly value="{{($v->TenBS)}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Giới tính :</label>
                        <div class="col-sm-9">
                            @if($v->gioitinh ==0)
                            <input readonly value="Nữ" type="text" class="form-control">
                            @else
                            <input readonly value="Nam" type="text" class="form-control">
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Học vị :</label>
                        <div class="col-sm-9">
                            <input readonly value="{{($v->HocVi)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Chuyên khoa :</label>
                        <div class="col-sm-9">
                            <input type="text" readonly value="{{($v->TenKhoa)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Phòng :</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{($v->MaPhong)}}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Địa chỉ :</label>
                        <div class="col-sm-9">
                            <input type="text" name="diachi" id="diachi" value="{{($v->DiaChi)}}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Điện thoại : </label>
                        <div class="col-sm-9">
                            <input type="text" name="dienthoai" id="dienthoai" value="0{{($v->DienThoai)}}" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">

                        <input type="submit" id="btn1" value="Cập nhật" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row padding">
    <div class="col-10">
        <div class="card">
            <form action="{{URL::to('trangbacsi/capnhattk')}}" method="POST" class="form-horizontal">
            @csrf
                <div class="card-body">
                    <h4 class="card-title">Thông tin tài khoản</h4>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Tên đăng nhập :</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{($v->Ten)}}" readonly class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Mật khẩu : </label>
                        <div class="col-sm-9">
                            <input type="password" id="pass1" value="{{($v->MatKhau)}}" readonly class="form-control">
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    <h5>Đổi mật khẩu</h5>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Mật khẩu cũ :</label>
                        <div class="col-sm-9">
                            <input onkeyup="test()" type="text" id="pass2" class="form-control">
                            <div id="error">
                                <div class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div id="x" class="form-group row">
                        
                    </div>
                    <script type="text/javascript">
                

                            function test() {
                                var pass1 = $('#pass1').val();
                                const y = document.querySelector('#error')
                                const x = document.querySelector('#x')
                                var pass2 = $('#pass2').val();
                                if (pass1 == pass2) {
                                    y.innerHTML = '<div class="success"> Đã khớp </div>';
                                    x.innerHTML =`<label class="col-sm-3 text-right control-label col-form-label">Mật khẩu mới : </label>
                        <div class="col-sm-9">
                            <input name="matkhau" type="text" class="form-control">
                        </div>`
                                }else if (pass2==''){
                                    y.innerHTML = '<div class="success"></div>';
                                    x.innerHTML=``;
                                }
                                 else {
                                    y.innerHTML = '<div class="error"> Chưa  khớp </div>';
                                    x.innerHTML ='';
                                }
                            };
                    
                    </script>
                </div>
                <div class="border-top">
                    <div class="card-body">

                    <input type="submit"  value="Đổi mật khẩu" class="btn btn-danger">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<style>
    .error {
        color: red;
        font-size: 10px;
        padding-top: 5px;

    }

    .success {
        color: green;
        font-size: 10px;
        padding-top: 5px;
    }

    .padding {
        padding-top: 2rem ;
        padding-left: 10rem ;
    }

    .bia {
        background-color: antiquewhite !important;
        height: 12rem !important;
        width: 12rem !important;
        border: 1px solid black !important;
    }
    @media screen and (max-width: 600px) {
        .padding {
        padding-top: 0rem !important;
        padding-left: 0rem !important;
    }
    }
</style>