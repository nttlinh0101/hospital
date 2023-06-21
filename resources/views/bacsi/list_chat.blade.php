@extends('bacsi.bacsi_layout')
@section('bacsi_content')
<div class="row">
    <div class="col-6">
        <input id="search" class="form-control">
    </div>
</div>
<script type="text/javascript">
    var a = null;
    $(document).ready(function() {
     
            $('#search').keyup(function(){
                var key = $(this).val();

            $.ajax({
                url: '/benhvien1/trangbacsi/timkiem/'+key,
                method: "GET",
                success: function(data) {
                    data = JSON.parse(data);
                 
                    var resultajax = `  <h4>Kết quả tìm kiếm </h4>`;
                    console.log(data);
                    $('#timkiem').show();
                    if (data.length > 0) {
                        for (let j = 0; j < data.length; j++) {
                            resultajax += `    <li class="sidebar-item"><a href="{{URL::to('/bac-si/chat/` + data[j].MaTK + `')}}" class="sidebar-link black"><i class="fas fa-comment-dots"></i><span class="hide-menu ">` + data[j].TenBS + `</span></a></li>`
                        }

                        $('#timkiem').html(resultajax);

                    }
                }
            });

        });



    });
</script>
<div class="row">

    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav black">
            <ul id="timkiem" class="p-t-30">
    


            </ul>
            <ul id="tincho" class="p-t-30">
                <h4> Tin nhắn chờ</h4>


            </ul>


            <ul id="sidebarnav" class="p-t-30">


                <h4> Danh sách liên hệ</h4>
                <li class="sidebar-item"> <a class="sidebar-link black has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-briefcase-medical"></i><span class="hide-menu">Hệ thống</span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="#" class="sidebar-link black"><i class="fas fa-comment-dots"></i><span class="hide-menu"> Admin 1</span></a></li>
                        <li class="sidebar-item"><a href="#" class="sidebar-link black"><i class="fas fa-comment-dots"></i><span class="hide-menu"> Admin 2</span></a></li>
                    </ul>
                </li>
                @foreach($khoa as $key=> $value)
                <li class="sidebar-item"> <a data-id="{{($value->MaKhoa)}}" class="sidebar-link black has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="far fa-plus-square"></i><span class="hide-menu">{{($value->TenKhoa)}}</span></a>
                    <ul id="bacsi" aria-expanded="false" class="collapse  first-level">
                        @foreach($bacsi as $k)
                        @foreach($k as $v=>$item)
                        @if($item->MaKhoa == $value->MaKhoa)
                        <li class="sidebar-item"><a href="{{URL::to('/bac-si/chat/'.$item->MaTK)}}" class="sidebar-link black"><i class="fas fa-comment-dots"></i><span class="hide-menu">{{($item->TenBS)}}</span></a></li>
                        @endif
                        @endforeach
                        @endforeach
                    </ul>
                </li>
                @endforeach


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <script type="text/javascript">
        var a = null;
        $(document).ready(function() {
            load_tincho();

            setInterval(function() {
                load_tincho()
            }, 2000);

            function load_tincho() {

                $.ajax({
                    url: '/benhvien1/trangbacsi/tincho/',
                    method: "GET",
                    success: function(data) {
                        data = JSON.parse(data);
                        let uniqueAnimalsId = data.map(v => v['Magui']);
                        uniqueAnimalsId = uniqueAnimalsId.map((v, i, array) => array.indexOf(v) === i && i);
                        uniqueAnimalsId = uniqueAnimalsId.filter(v => data[v]);
                        let data2 = uniqueAnimalsId.map(v => data[v]);
                        var resultajax = `  <h4> Tin nhắn chờ</h4>`;
                        console.log(data2);
                        $('#tincho').show();
                        if (data2.length > 0) {
                            for (let j = 0; j < data2.length; j++) {
                                resultajax += `    <li class="sidebar-item"><a href="{{URL::to('/bac-si/chat/` + data2[j].Magui + `')}}" class="sidebar-link black"><i class="fas fa-comment-dots"></i><span class="hide-menu error">` + data2[j].TenBS + `(` + data2[j].count + `)</span></a></li>`
                            }

                            $('#tincho').html(resultajax);

                        }
                    }
                });

            };



        });
    </script>
</div>
@endsection
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery/jquery-1.4.2.min.js">


</script>
<style>
    .black {
        color: black !important;

    }

    .black i {
        color: black !important;
    }

    .sidebar-nav ul .sidebar-item.selected>.sidebar-link {
        background: none !important;
    }
</style>