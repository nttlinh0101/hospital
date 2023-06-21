@extends('admin_layout')
@section('admin_content')

  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Bệnh Nhân
    </div>
 
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" class="table table-striped table-bordered" id="myTable">
        <thead>
          <tr>
            <th>Tên Bệnh Nhân</th>
            <th>Số Điện Thoại</th>
            <th>Giới Tính</th>
            <th>Địa Chỉ</th>
            <th>Xóa</th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_BenhNhan as $key => $value)
          <tr>
            <td> <a style="color: #999;" href="{{URL::to('/chitietbenhnhan/'.$value->MaBN)}}">{{$value->TenBN}}</a></td>
            <td><span class="text-ellipsis">{{$value->DienThoai}}</span></td>
            <td><span class="text-ellipsis">
              <?php 
                  if($value->gioitinh==0){
                    echo'Nữ';
                  } else
                    echo "Nam";
               ?>
            </span></td>
            <td><span class="text-ellipsis">{{$value->DiaChi}}</span></td>
            <td>
              {{-- <a href="{{URL::to('/edit-Khoa/'.$value->MaKhoa)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                <i class="fa fa-edit"></i></a> --}}
                <a href="{{ route('delete.benhnhan', ['MaBN' => $value->MaBN]) }}" onclick="return confirm('Xác nhận xóa?')"><i class="fa fa-times text-danger text"></i></a> 
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