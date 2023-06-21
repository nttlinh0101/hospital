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
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Thêm Phòng Mới</h5>
                                <?php 
                                    $message = Session::get('message');
                                    if($message){
                                        echo'<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                 ?>
                                <form role="form" action="{{URL::to('/save-Phong')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group row">
                                        <label for="fname" class="col-md-3 m-t-15">Tên Phòng</label>
                                        <div class="col-sm-9">
                                            <input required name="MaPhong" type="text" class="form-control" id="fname" placeholder="Nhập Tên">
                                        </div>
                                    </div>                              
                                <div class="form-group row">
                                    <label class="col-md-3 m-t-15">Khoa</label>
                                    <div class="col-md-9">
                                        <select name="Khoa" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                             @foreach ($ds_khoa as $key => $value)
                                                <option value="{{$value->MaKhoa}}">{{$value->TenKhoa}}</option>
                                                @endforeach
                                        </select>
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