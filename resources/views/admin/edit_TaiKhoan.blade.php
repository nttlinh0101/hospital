@extends('admin_layout')
@section('admin_content')

                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Cập Nhật Tài Khoản</h5>
                               
                                 @foreach ($edit_TaiKhoan as $key => $edit_value)
                                   
                                    <form action="{{URL::to('/ds-TaiKhoan')}}" method="get">
                                     
                                    <div class="card-body">
                                              <button type="submit" class="btn btn-secondary">Quay lại</button>
                                    </div>
                                  </form>
                               
                                <form role="form" action="{{URL::to('/update-TaiKhoan/'.$edit_value->MaTK)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Mã Tài Khoản</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$edit_value->MaTK}}" name="MaTK" type="text" class="form-control" >
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Tên Tài Khoản</label>
                                        <div class="col-sm-9">
                                            <input  value="{{$edit_value->Ten}}" name="Ten" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Số Điện Thoại</label>
                                        <div class="col-sm-9">
                                            <input  value="{{$edit_value->Sodienthoai}}" name="Sodienthoai" type="text" class="form-control" >
                                        </div>
                                    </div>
                                            <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Mật Khẩu</label>
                                        <div class="col-sm-9">
                                            <input  value="{{$edit_value->MatKhau}}" name="MatKhau" type="text" class="form-control" >
                                        </div>
                                    </div>
                                            <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Vai Trò</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$edit_value->VaiTro}}" name="VaiTro" type="text" class="form-control" >
                                        </div>
                                    </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button  type="Submit" class="btn btn-primary">Cập Nhật</button>
                                </div>
                            </div>
                        </form>
                         @endforeach
                    </div>
                 </div>

@endsection