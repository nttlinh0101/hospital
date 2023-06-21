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
                                <h5 style="text-align: center; font-size: 25px;" class="card-title">Thêm Khoa</h5>
                                <?php 
                                    $message = Session::get('message');
                                    if($message){
                                        echo'<span class="text-alert">'.$message.'</span>';
                                        Session::put('message',null);
                                    }
                                 ?>
                                <form role="form" action="{{URL::to('/save-Khoa')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Tên Khoa</label>
                                        <div class="col-sm-9">
                                            <input required name="TenKhoa" type="text" class="form-control" id="lname" placeholder="Nhập Tên Khoa">
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="lname" class="col-md-3 m-t-15">Giá</label>
                                        <div class="col-sm-9">
                                            <input required name="gia" type="text" class="form-control" id="lname" placeholder="Nhập Giá">
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">Hinh</label>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input name="Hinh" type="file" class="custom-file-input" id="validatedCustomFile" >
                                                    <label  class="custom-file-label" for="validatedCustomFile">Chọn ảnh...</label>
                                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                                </div>
                                            </div>
                                        </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button  type="Submit" class="btn btn-secondary">Thêm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>

@endsection