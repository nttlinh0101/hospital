@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
</style>
                        <div class="card">
                            <div class="card-body">
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Thêm Lịch Trực Mới</h5>
                                <?php 
                                    $message = Session::get('message');
                                    if($message){
                                        echo'<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                 ?>
                                <form role="form" action="{{URL::to('/save-LTruc')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label for="fname" class="col-md-3 m-t-15">Tên Bác Sĩ -- Khoa</label>
                                        <div class="col-sm-9">
                                            <select name="MaBS" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                              @foreach ($ds_bacsi as $key => $value)
                                             
                                                <option value="{{$value->MaBS}}" >{{$value->TenBS}} -- {{$value->TenKhoa}} </option>
                            
                                             @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <label class="col-md-3">Buổi Trực</label>
                                    <div class="col-md-9">
                                        <div class="custom-control custom-radio">
                                            <input name="Buoi" value="Sáng" type="radio" class="custom-control-input" id="customControlValidation1" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation1">Sáng</label>
                                        </div>
                                         <div class="custom-control custom-radio">
                                            <input value="Chiều" name="Buoi" type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                                            <label class="custom-control-label" for="customControlValidation2">Chiều</label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Ngày Trực</label>
                                        <div class="col-sm-9">
                                            <input required name="NgayTruc" type="date" class="form-control" id="lname" min="<?php $day = date('Y-m-d', strtotime(' + 1 days'));
                                            echo $day; ?>"/>
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