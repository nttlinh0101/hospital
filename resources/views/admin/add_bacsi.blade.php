@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
</style>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Thêm Bác Sĩ Mới</h5>
                                <?php 
                                    $message = Session::get('message');
                                    if($message){
                                        echo'<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                 ?>
                                <form role="form" action="{{URL::to('/save-bacsi')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label for="fname" class="col-md-3 m-t-15">Tên</label>
                                        <div class="col-sm-9">
                                            <input data-validation="length" data-validation-length="min3" data-validation-error-msg="nhập sai" required name="TenBS" type="text" class="form-control" id="fname" placeholder="Nhập Tên">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="lname" class="col-md-3 m-t-15">Số Điện Thoại</label>
                                        <div class="col-sm-9">
                                            <input required name="DienThoai" type="text" class="form-control" id="lname" placeholder="Nhập Số Điện Thoại">
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label class="col-md-3 m-t-15">Học Vị</label>
                                        <div class="col-md-9">
                                        <select name="HocVi" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option value="G.S,T.S">Giáo Sư,Tiến Sĩ</option>
                                                <option value="PG.S,T.S">Phó Giáo Sư,Tiến Sĩ</option>
                                                <option value="BS.CK">Bác Sĩ Chuyên Khoa</option>
                                                <option value="T.S">Thạc Sĩ</option>
                                                <option value="T.S,B.S">Tiến Sĩ,Bác Sĩ</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Địa Chỉ</label>
                                        <div class="col-sm-9">
                                            <input required name="DiaChi" type="text" class="form-control" id="lname" placeholder="Nhập Địa Chỉ">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Khoa</label>
                                    <div class="col-md-9">
                                        <select required id="khoa" name="Khoa" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                            <option></option>
                                             @foreach ($ds_khoa as $key => $value)
                                                <option value="{{$value->MaKhoa}}">{{$value->TenKhoa}}</option>
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
                            $('#khoa').change(function() {
                                var id = $(this).val();
                            
                                $.ajax({
                                    url: 'getphong/' + id,
                                    method: "GET",
                                    success: function(data) {
                                        data = JSON.parse(data);
                                        var resultajax = ``;
                                        console.log(data);
                                        $('#phong').show();
                                        if (data.length > 0) {
                                            for (let i = 0; i < data.length; i++) {
                                                resultajax += `<option value="` + data[i]
                                                    .MaPhong + `">` + data[i].MaPhong+
                                                    `</option>`
                                            }
                                        }
                                        $('#phong').html(resultajax);
                                    }
                                })
                            })
                        });
                    </script>
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Phòng</label>
                                    <div class="col-md-9">
                                        <select id="phong" name="Phong" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <option> </option>
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Giới Tính</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input name="GioiTinh" value="1" type="radio" class="custom-control-input" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation1">Nam</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input value="0" name="GioiTinh" type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                             
                                   <div class="form-group row">
                                    <label class="col-md-3">Trạng Thái</label>
                                    <div class="col-md-9">
                                        <!-- <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation1">Nam</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">Nữ</label>
                                        </div> -->
                                        <input value="1" readonly required name="TrangThaiBS" type="text" class="form-control" id="fname">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                            <label class="col-md-3">Hình ảnh</label>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input name="hinh" type="file" class="custom-file-input" id="validatedCustomFile" >
                                                    <label  class="custom-file-label" for="validatedCustomFile">Chọn ảnh...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                </div>
                                            </div>
                                        </div>
                                  
                            <div class="border-top">
                                <div class="card-body">
                                    <button  type="Submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>

@endsection