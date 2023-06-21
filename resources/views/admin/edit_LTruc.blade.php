@extends('admin_layout')
@section('admin_content')
                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Cập Nhật Lịch Trực </h5>    
                                 @foreach ($edit_LTruc as $key => $edit_value)
  
                                    <form action="{{URL::to('/ds-LTruc')}}" method="get">
                                     
                                    <div class="card-body">
                                              <button type="submit" class="btn btn-secondary">Quay lại</button>
                                    </div>
                                  </form>
                       
                                <form role="form" action="{{URL::to('/update-LTruc/'.$edit_value->MaLT)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Tên Bác Sĩ -- Khoa</label>
                                    <div class="col-md-9">
                                        <select name="MaBS" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                             @foreach ($ds_bacsi as $key => $value)
                                                @if($value->MaBS==$edit_value->MaBS)
                                                <option selected value="{{$value->MaBS}}">{{$value->TenBS}} </option>
                                                @else 
                                                    <option  value="{{$value->MaBS}}">{{$value->TenBS}} </option>
                                                @endif
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                     <div class="form-group row">
                                    <label class="col-md-3">Buổi Trực</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input name="Buoi" value="0" type="radio" class="custom-control-input" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation1">Sáng</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input value="1" name="Buoi" type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">Chiều</label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Ngày Trực</label>
                                        <div class="col-sm-9">
                                            <input required value="{{$edit_value->NgayTruc}}" name="NgayTruc" type="date" class="form-control" id="lname" placeholder="Nhập Học Vị">
                                        </div>
                                    </div>                     
                            <div class="border-top">
                                <div class="card-body">
                                    <button  type="Submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </form>
                         @endforeach
                    </div>
                 </div>

@endsection