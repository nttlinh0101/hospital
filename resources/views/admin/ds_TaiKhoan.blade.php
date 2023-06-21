@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
span.fa.fa-check-circle {
    font-size: 28px;
    color: green;
}
span.fa.fa-times-circle {
    font-size: 28px;
    color: red;
}
</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Tài Khoản
    </div>
    <div class="panel">
      <?php 
           $message = Session::get('message');
           if($message){
               echo'<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
       ?>
    </div>
    
    <div class="table-responsive">

      <table class="table table-striped b-t b-light" class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th>Tên Tài Khoản</th>
            <th>Số Điện Thoại</th>
            <th>Mật Khẩu</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_TaiKhoan as $key => $value)
          <tr>
            <td> <a>{{$value->Ten}}</a></td>
            <td><span class="text-ellipsis">{{$value->Sodienthoai}}</span></td>
            <td><span class="text-ellipsis">{{$value->MatKhau}}</span></td>
                
            <td>
              <a href="{{URL::to('/edit-TaiKhoan/'.$value->MaTK)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-edit"></i></a>
              <a onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Tài Khoản Này Không?')" href="{{URL::to('/delete-TaiKhoan/'.$value->MaTK)}}" class="active" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
           @endforeach
        </tbody>
      </table>
     
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
      </div>
    </footer>
  </div>

@endsection