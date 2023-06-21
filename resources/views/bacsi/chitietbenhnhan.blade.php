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
                        <input type="hidden" name="MaLK" value="{{($BN->MaLK)}}">
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
                @if($BN->Trangthai==2)
                <a  class="btn btn-primary">
                    < Quay lại </a>
                        @else
                            <a href="{{URL::to('/bac-si/lich-hen/'.$BN->MaLT)}}" class="btn btn-primary">
                            < Quay lại </a>
                               
                                @endif

                                @endforeach
            </form>
        </div>

    </div>
</div>
</div>

@endsection
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js">
       
    
</script>


<script type="text/javascript">
    $(document).ready(function() {
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
        $('.btn-primary').click(function() {
          
            parent.history.back();
            return false;
        });

    });
</script>