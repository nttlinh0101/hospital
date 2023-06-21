
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
            <div class="col-4">

                <div  class="single-team mb-30">

                    <div class="team-caption">
                        <h2 class="contact-title">Danh sách đã khám {{($title)}} </h2>

                    </div>
                    <hr>
                </div>
            </div>
            <br>
            <div class="col-12">
            <table class="table table-bordered" id="myTable"   >
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th class="text-center">Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 0;?>
                    @foreach($danhsach as $key=>$value)
                    <?php $i++; ?>
                    <tr>
                        <td id="hello" data-label="Mã bệnh nhân :">{{($i)}}</td>
                        <td data-label="Tên bệnh nhân :">{{($value->TenBN)}}</td>
                        <td data-label="Ngày sinh :">{{($value->Ngaysinh)}}</td>
                        <td data-label="Giới tính :"><?php if ($value->gioitinh == 1) {
                                                            echo "Nam";
                                                        } else {
                                                            echo "Nữ";
                                                        } ?></td>
                      
                            @if($value->Trangthai == 2)
                                <td class="success" data-label="Trạng thái"> Đã khám </td>
                            @elseif ($value->Trangthai == 0)
                                <td class="d-flex d-flex justify-content-around">
                                    <a href="{{URL::to('/bac-si/confirm-status', [$value->MaLK, "2"])}}" type="submit" class="confirm-status cursor-pointer btn btn-primary text-dark">Xác nhận đã khám</a>
                                    <a href="{{URL::to('/bac-si/confirm-status', [$value->MaLK, "3"])}}" type="submit" class="confirm-status cursor-pointer btn btn-warning text-dark">Xác nhận vắng mặt</a>
                                </td>                            
                            @else   
                                <td class="success" data-label="Trạng thái"> Đã thanh toán </td>
                            @endif

                        
                        <td><a href="{{URL::to('/bac-si/chi-tiet-benh-nhan/'.$value->MaLK)}}" class="hihi" >Chi tiết</a></td>
                    </tr>
                    @endforeach
                   
                </tbody>
              
            </table>
            </div>
            <a onclick="hi()" class="btn btn-primary">
                Quay lại </a>
            <script type="text/javascript">
                function hi(){
                    parent.history.back();
                }
            </script>

        </div>
       
    </div>
</div>
</div>

@endsection
