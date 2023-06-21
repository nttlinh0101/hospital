@extends('welcome')
@section('datlich')

<head>


    <link rel="stylesheet" href="{{asset('public/frontend/css/dsbacsi.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<!-- search-->
<div class="s009">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                @foreach( $lich as $key=>$bacsi)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img style="border: 1px;" height="100" width="100" src="{{asset('./public/backend/img/'.$bacsi->hinh)}}" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <input type="hidden" id="STT" value="{{($bacsi->MaLT)}}" >
                                    <h5 class="card-title">{{($bacsi->HocVi)}}</h5>
                                    <p class="card-text">{{($bacsi->TenBS)}}</p>
                                    <p class="card-text">Phòng : {{($bacsi->MaPhong)}}</p>
                                    <p id="date"></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                @foreach( $lich as $key=>$bacsi)
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            
                            <div id="st" class="col-md-4">
                             
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <p class="card-text">Số thứ tự của bạn : {{($bacsi->STT)}}</p>
                                    <p class="card-text">Ca :  {{($bacsi->giokham)}} </p>
                                    <p class="card-text">Ngày khám : {{($bacsi->NgayTruc)}}</p>
                                    <p id="date"></p>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
        
    </div>

</div>

<!--endsearch-->



@endsection
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var so=null;
        var giokham=null;

        setInterval(function() {
            load_stt()
        }, 2000);

   
        var count = 0;

        function load_stt() {
           
            var id = $('#STT').val();
            $.ajax({
                url: 'load/stt/' + id,
                method: "GET",
                success: function(data) {
                    data = JSON.parse(data);
                    var resultajax = ``;
                    console.log(data);
                    $('#st').show();
                    console.log(data.length);
                    if (data.length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            resultajax +=`   <p> Đã tới số  </p> 
                                <p  class="box stt">`+data[i].STT +`</p>
                                <p  > Ca :`+data[i].giokham+`</p> `
                                so=data[i].STT;
                        giokham = data[i].giokham;
                        }
                       
                    } else if (data.length == 0) {
                        if(so!=null){
                            resultajax +=`   <p> Bác sĩ đang khám </p> 
                                <p  class="box stt">`+so+`</p>
                                <p  > Ca :`+giokham+`</p> `
                        }else{
                        resultajax +=`  
                                <p  class="box stt">Bác sĩ chưa làm việc </p>
                         `
                        }
                    }
                    $('#st').html(resultajax);
                   
                  

                }
            });

        };

      
        

       
       
    });
</script>

<style>
  .stt{
      padding-top: 4rem;
      font-size: 30px;
      color: red;
      font-weight: bolder;
      
  }
  .stt1{
      padding: 4rem;
      color: red;
      font-weight: bolder;
      
  }

  .box{
    /* border: 1px solid black;
    line-height: 2; */
  }
</style>