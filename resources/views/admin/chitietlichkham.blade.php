@extends('admin_layout')
@section('admin_content')
<style>
	.container {
		
		  padding: 15px;
		  display: flex;
		}
		/* Columns */
		.left-column {
		  width: 65%;
		  position: relative;
		}
		  
		.right-column {
		  width: 35%;
		  margin-top: 60px;
		}
		/* Left Column */
		.left-column img {
		  width: 100%;
		  position: absolute;
		  left: 0;
		  top: 0;
		}
		  
		.left-column img.active {
		  opacity: 1;
		}
		/* Product Description */
		.product-description {
		  border-bottom: 1px solid #E1E8EE;
		  margin-bottom: 20px;
		}
		.product-description span {
		  font-size: 12px;
		  color: #358ED7;
		  letter-spacing: 1px;
		  text-transform: uppercase;
		  text-decoration: none;
		}
		.product-description h1 {
		  font-weight: 300;
		  font-size: 52px;
		  color: #43484D;
		  letter-spacing: -2px;
		}
		.product-description p {
		  font-size: 16px;
		  font-weight: 300;
		  color: #86939E;
		  line-height: 24px;
		}
		
		/* Cable Configuration */
		.cable-choose {
		  margin-bottom: 20px;
		}
		  
		.cable-choose button {
		  border: 2px solid #E1E8EE;
		  border-radius: 6px;
		  padding: 13px 20px;
		  font-size: 14px;
		  color: #5E6977;
		  background-color: #fff;
		  cursor: pointer;
		  transition: all .5s;
		}
		.cable-config {
		  border-bottom: 1px solid #E1E8EE;
		  margin-bottom: 20px;
		}
		  
		.cable-config a {
		  color: #358ED7;
		  text-decoration: none;
		  font-size: 12px;
		  position: relative;
		  margin: 10px 0;
		  display: inline-block;
		}
		.cable-config a:before {
		  content: "?";
		  height: 15px;
		  width: 15px;
		  border-radius: 50%;
		  border: 2px solid rgba(53, 142, 215, 0.5);
		  display: inline-block;
		  text-align: center;
		  line-height: 16px;
		  opacity: 0.5;
		  margin-right: 5px;
		}
		@media (max-width: 940px) {
		  .container {
		    flex-direction: column;
		    margin-top: 60px;
		  }
		  
		  .left-column,
		  .right-column {
		    width: 100%;
		  }
		  
		  .left-column img {
		    width: 300px;
		    right: 0;
		    top: -65px;
		    left: initial;
		  }
		}
		  
		@media (max-width: 535px) {
		  .left-column img {
		    width: 220px;
		    top: -85px;
		  }
</style>



			<div style="font-weight: bold; margin-left: 100px; margin-top: 20px;">Chi Tiết Lịch Khám</div>
			<main class="container" >
			 @foreach ($chitietlichkham as $key => $value)
			   <!-- <div>
			   <td> <img src="http://localhost/benhvien/public/backend/img/{{$value->hinh}}" style="width: 125%; height: 90%;" ></td>
			  </div> -->
			  

			  <div style="margin-left: 130px;" class="col-sm-5" class="right-column">
			  
			    <!-- Product Description -->
			    <div class="product-description">
			     	<h1 style="font-weight: bold; " class="card-title">Tên Bác Sĩ: {{$value->TenBS}}</h1>
			     	<br>
			      <p style="font-size: 25px;" class="card-title">Tên Bệnh Nhân: {{$value->TenBN}}</p>
			      <br>
			      <p class="card-text" style="font-size: 25px;">Buổi Khám: {{$value->Buoi}}</p>
			      <br>
			      <p class="card-text" style="font-size: 25px;">Ngày Khám: {{$value->NgayTruc}}</p>
			      <br>
			      <p class="card-text" style="font-size: 25px;">Khoa: {{$value->TenKhoa}}</p>
			          <br>
			      <p class="card-text" style="font-size: 25px;">Phòng: {{$value->MaPhong}}</p>
			          <br>
			      <p class="card-text" style="font-size: 25px;">Số Thứ Tự Khám: {{$value->STT}}</p>
			          <br>
				<p class="card-text" style="font-size: 25px;">Trạng Thái: 
        				  <?php if ($value->Trangthai == 0) {
                      echo '   <a style="color: red;">Chưa khám </a>';
                    } else if ($value->Trangthai == 2) {
                      echo '   <a style="color: blue;">Vắng</a>';
                    } else if ($value->Trangthai == 1) {
                      echo ' <a style="color: green;">Đã khám</a>';
                    } ?>

				</p>
			          <br>
			    <p class="card-text" style="font-size: 25px;">Thanh Toán: 
			    <?php if ($value->Thanhtoan == 0) {
                      echo '   <a style="color: red;">Chưa thanh toán </a>';
                    } else {
                      echo '   <a style="color: green;">Đã thanh toán</a>';
                    } 
                    ?>
			    </p>
			    <br>
			          <form action="{{URL::to('/ds-LKham')}}" method="get">
			          	 
			          	<div class="card-body">
                                  <button  style="font-size: 25px; " type="submit" class="btn btn-secondary">Quay lại</button>
                        </div>
			          </form>

                                
			    </div>
			  </div>
			  @endforeach 
			</main>







@endsection