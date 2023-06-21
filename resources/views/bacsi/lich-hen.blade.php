@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('public/backend/css/lichtruc.css')}}">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="{{asset('public/frontend/js/jquery.magnifier.js')}}"></script>


<div class="card">
    <div class="card-body">
        <div id="form" class="row">
            <div class="col-5">

                <div  class="single-team mb-30">

                    <div class="team-caption">
                        <h2 class="contact-title">Lịch hẹn </h2 > 
                        <div class="row">
                        
                        <a  href="{{URL::to('/bac-si/danh-sach-benh-nhan?key='.$malt)}}" class="btn btn-success">Đã khám</a>
                        <a href="{{URL::to('/bac-si/danh-sach-bn?key='.$malt)}}" class="btn btn-danger">vắng</a> 
                        
                        </div>
                       
                    </div>
                    <hr>
                </div>
            </div>
            <br>
            <div class="col-12" >
            <table id="myTable" class="table table-bordered">
                <thead>
                    <tr>
                    <th>Ca khám </th>
                        <th>STT</th>
                        
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($danhsach as $key=>$value)
                        <?php $time = substr($value->giokham,0,2) ?>
                    <tr> 
                        @if($time % 2==0)
                        <td style="color: red; background-color:aqua" data-label="Ca khám:">{{($value->giokham)}}</td>            
                        <td style="color: red; background-color:aqua" id="hello" data-label="Mã bệnh nhân :">{{($value->STT)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td style="color: red; background-color:aqua" data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>                        
                        <td style="color: red; background-color:aqua"><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a>|  
                        <a style="color: red;" href="{{URL::to('/bac-si/kham/?key=1&mabn='.$value->MaLK)}}" class="hihi" >Khám</a></td>
                        @else
                        <td  data-label="Ca khám:">{{($value->giokham)}}</td>            
                        <td  id="hello" data-label="Mã bệnh nhân :">{{($value->STT)}}</td>
                        <td  data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td  data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td  data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>                        
                        <td ><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a>|  
                          <a style="color: red;" href="{{URL::to('/bac-si/kham/?key=1&mabn='.$value->MaLK)}}" class="hihi" >Khám</a></td>
                    @endif
                    </tr>
           
                    @endforeach


                </tbody>

            </table>
            </div>

        </div>
       
    </div>
</div>
</div>

@endsection