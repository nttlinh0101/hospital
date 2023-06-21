@extends('admin_layout')
@section('admin_content')
                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Cập Nhật Bác Sĩ</h5>    
                                 @foreach ($edit_bacsi as $key => $edit_value)
                                   
                                    <form action="{{URL::to('/ds-bacsi')}}" method="get">
                                     
                                    <div class="card-body">
                                              <button type="submit" class="btn btn-secondary">Quay lại</button>
                                    </div>
                                  </form>
                       
                                <form role="form" action="{{URL::to('/update-bacsi/'.$edit_value->MaBS)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label for="fname" class="col-md-3 m-t-15">Tên</label>
                                        <div class="col-sm-9">
                                            <input required value="{{$edit_value->TenBS}}" name="TenBS" type="text" class="form-control" id="fname" placeholder="Nhập Tên">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Số Điện Thoại</label>
                                        <div class="col-sm-9">
                                            <input required value="{{$edit_value->DienThoai}}" name="DienThoai" type="text" class="form-control" id="lname" placeholder="Nhập Số Điện Thoại">
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
                                            <input required value="{{$edit_value->DiaChi}}" name="DiaChi" type="text" class="form-control" id="lname" placeholder="Nhập Địa Chỉ">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Khoa</label>
                                    <div class="col-md-9">
                                        <select name="Khoa" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                             @foreach ($ds_khoa as $key => $value)
                                                @if($value->MaKhoa==$edit_value->MaKhoa)
                                                <option selected value="{{$value->MaKhoa}}">{{$value->TenKhoa}}</option>
                                                @else 
                                                    <option  value="{{$value->MaKhoa}}">{{$value->TenKhoa}}</option>
                                                @endif
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Phòng</label>
                                    <div class="col-md-9">
                                        <select name="Phong" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                              @foreach ($ds_phong as $key => $value)
                                               @if($value->MaPhong==$edit_value->MaPhong)
                                                <option selected value="{{$value->MaPhong}}" >{{$value->MaPhong}}</option>
                                                @else 
                                                    <option  value="{{$value->MaPhong}}">{{$value->MaPhong}}</option>
                                                @endif
                                             @endforeach
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
                                            <label class="col-md-3">Hình ảnh</label>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input value="{{$edit_value->hinh}}" name="hinh" type="file" class="custom-file-input" id="validatedCustomFile" >
                                                    <label  class="custom-file-label" for="validatedCustomFile">Chọn ảnh...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                </div>
                                            </div>
                                        </div>                   
                            <div class="border-top">
                                <div class="card-body">
                                    <button  type="Submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                      
                         @endforeach
                    </div>
                 </div>

@endsection