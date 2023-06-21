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
    .table-responsive table tbody td{
      vertical-align: middle;
    }

</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Khoa
    </div>
       <?php 
           $message = Session::get('message');
           if($message){
               echo'<span class="text-alert">'.$message.'</span>';
              Session::put('message',null);
          }
       ?>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" class="data display datatable" id="myTable">
        <thead>
          <tr>
            <th>Tên Khoa</th>
            <th>Giá Khám</th>
            <th>Hình</th>
            <th style="width:50px;">Sửa</th>
            <th style="width:50px;">Xóa</th>
          </tr>
        </thead>
        <tbody>
             @foreach ($ds_Khoa as $key => $value)
          <tr>
            <td>{{$value->TenKhoa}}</td>
             <td>{{$value->gia}}</td>
            <td> <img src="public/frontend/img/khoa/{{$value->Hinh}}" height="100" width="100"></td>
              
            <td>
              <a href="{{URL::to('/edit-Khoa/'.$value->MaKhoa)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-edit"></i></a>
            </td>
            <td>
              <a href="{{ route('delete.khoa', ['MaKhoa' => $value->MaKhoa]) }}" onclick="return confirm('Xác nhận xóa?')"><i class="fa fa-times text-danger text"></i></a> 
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