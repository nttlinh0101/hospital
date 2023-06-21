@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
span.fa.fa-calendar-check{
    font-size: 28px;
    color: green;
}
span.fa.fa-calendar-times {
    font-size: 28px;
    color: red;
}

</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Bác Sĩ
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
            <th>Tên BS</th>
             <th>Khoa</th>
            <th>Học Vị</th>
            <th>Giới Tính</th>
            <th>Trạng Thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_bacsi as $key => $value)
          <tr>
            <td> <a style="color: #999;" href="{{URL::to('/chitietbacsi/'.$value->MaBS)}}">{{$value->TenBS}}</a></td>
            <td>{{$value->TenKhoa}}</td>
            <td><span class="text-ellipsis">{{$value->HocVi}}</span></td>
            <td><span class="text-ellipsis">
              <?php 
                  if($value->gioitinh==0){
                    echo'Nữ';
                  } else
                    echo "Nam";
               ?>
              
            </span></td>
              <td><span class="text-ellipsis">
                        <?php 
                            if($value->TrangThaiBS==0){
                              ?>
                              <a href="{{URL::to('/unactive-bacsi/'.$value->MaBS)}}" ><span class="fa fa-calendar-times"></span></a>
                            <?php  
                            } else{
                            ?>
                           <a href="{{URL::to('/active-bacsi/'.$value->MaBS)}}" ><span class="fa fa-calendar-check"></span></a>
                           <?php 
                           }
                         ?>
              </span></td>
            <td>
              <a href="{{URL::to('/edit-bacsi/'.$value->MaBS)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-edit"></i></a>
                  <a href="{{URL::to('/delete-bacsi/'.$value->MaBS)}}" onclick="return confirm('Xác nhận xóa?')"><i class="fa fa-times text-danger text"></i></a> 
            </td>
          </tr>
           @endforeach
        </tbody>
      </table>
     
    </div>
  
  </div>

@endsection