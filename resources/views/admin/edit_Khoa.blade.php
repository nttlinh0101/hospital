@extends('admin_layout')
@section('admin_content')

                        <div class="card">
                            <div class="card-body">
                               <h5 style="text-align: center; font-size: 25px;" class="card-title">Cập Nhật Khoa</h5>
                               
                                 @foreach ($edit_Khoa as $key => $edit_value)
                                     
                                    <form action="{{URL::to('/ds-Khoa')}}" method="get">
                                     
                                    <div class="card-body">
                                              <button type="submit" class="btn btn-secondary">Quay lại</button>
                                    </div>
                                  </form>
                               
                                <form role="form" action="{{URL::to('/update-Khoa/'.$edit_value->MaKhoa)}}" method="post"  enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Mã Khoa</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$edit_value->MaKhoa}}" name="MaKhoa" type="text" class="form-control" id="fname" placeholder="Nhập Mã Khoa">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Tên Khoa</label>
                                        <div class="col-sm-9">
                                            <input required value="{{$edit_value->TenKhoa}}" name="TenKhoa" type="text" class="form-control" id="lname" placeholder="Nhập Tên Khoa">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Giá</label>
                                        <div class="col-sm-9">
                                            <input required value="{{$edit_value->gia}}" name="gia" type="text" class="form-control" id="lname" placeholder="Nhập Giá">
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                            <label class="col-md-3">Hinh</label>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input value="{{$edit_value->Hinh}}" name="Hinh" type="file" class="custom-file-input" id="validatedCustomFile" >
                                                    <label  class="custom-file-label" for="validatedCustomFile">Chọn ảnh...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                    
                                                </div>
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