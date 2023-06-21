@extends('admin_layout')
@section('admin_content')

                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Cập Nhật Phòng</h5>
                               
                                 @foreach ($edit_Phong as $key => $edit_value)
                                   
                                    <form action="{{URL::to('/ds-Phong')}}" method="get">
                                     
                                    <div class="card-body">
                                              <button type="submit" class="btn btn-secondary">Quay lại</button>
                                    </div>
                                  </form>
                               
                                <form role="form" action="{{URL::to('/update-Phong/'.$edit_value->MaPhong)}}" method="post"  enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Tên Phòng</label>
                                        <div class="col-sm-9">
                                            <input readonly value="{{$edit_value->MaPhong}}" name="MaPhong" type="text" class="form-control" id="fname" placeholder="Nhập Mã Khoa">
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