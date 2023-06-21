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
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Thêm Tài Khoản Bác Sĩ</h5>
                                <?php 
                                    $message = Session::get('message');
                                    if($message){
                                        echo'<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                 ?>
     				 <form role="form" action="{{URL::to('/save-TaiKhoan')}}" method="post">
                                             {{csrf_field()}}
                                             <div class="form-group row">
                                        <label for="fname" class="col-md-3 m-t-15">Tên Bác Sĩ -- Khoa</label>
                                        <div class="col-sm-9">
                                            <select name="MaBS" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                              @foreach ($ds_bacsi as $key => $value)
                                              	
                                                <option value="{{$value->MaBS}}" >{{$value->MaBS}}--{{$value->TenBS}} -- {{$value->TenKhoa}}</option>
                                               
                                             @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Tên Tài Khoản</label>
                                        <div class="col-sm-9">
                                            <input name="Ten" type="text" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Số Điện Thoại</label>
                                        <div class="col-sm-9">
                                            <input   name="Sodienthoai" type="text" class="form-control" >
                                        </div>
                                    </div>
                                            <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15">Mật Khẩu</label>
                                        <div class="col-sm-9">
                                            <input name="MatKhau" type="text" class="form-control" >
                                        </div>
                                    </div>
                                   
                                            <div class="form-group row">
                                        <label  for="fname" class="col-md-3 m-t-15"></label>
                                        <div class="col-sm-9">
                                            <input readonly value="2" name="VaiTro" type="hidden" class="form-control" >
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