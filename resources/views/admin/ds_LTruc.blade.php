@extends('admin_layout')
@section('admin_content')
<style >
    span.text-alert {
    color: red;
    margin-top: 20px;
    font-size: 15px;
}
span.fa.fa-thumbs-up {
    font-size: 28px;
    color: green;
}
span.fa.fa-thumbs-down {
    font-size: 28px;
    color: red;
}
</style>
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản Lý Lịch Trực
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
            <th>Buổi Trực</th>
            <th>Ngày Trực</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
          
        <tbody>
           @foreach ($ds_LTruc as $key => $value)
          <tr>
            <td> <a>{{$value->TenBS}}</a></td>
            <td> <a>{{$value->TenKhoa}}</a></td>
            <td><span class="text-ellipsis">
              <?php 
                  if($value->Buoi==0){
                    echo'Sáng';
                  } else
                    echo "Chiều";
               ?>
              
            </span></td>
              <td> <a>{{$value->NgayTruc}}</a></td>
            <td>
              <a href="{{URL::to('/edit-LTruc/'.$value->MaLT)}}" class="active" ui-toggle-class="" style="font-size: 15px;">
                  <i class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Lịch Trực Này Không?')" href="{{URL::to('/delete-LTruc/'.$value->MaLT)}}" class="active" ui-toggle-class="">
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