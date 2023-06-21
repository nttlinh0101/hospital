<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class OrderController extends Controller
{
	public function print_order($checkout_code)
	{
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($checkout_code));
		return $pdf->stream();
	}

	public function print_order_convert($checkout_code)
	{
		$lich = DB::table('lichkham')
			->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
			->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
			->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
			->join('khoa', 'khoa.Makhoa', '=', 'bacsi.Makhoa')
			->where('lichkham.MaLK', $checkout_code)->get();
		$output = '';
		foreach ($lich as $key)
			if ($key->gioitinh == 0) {
				$gioitinh = "Nữ";
			} else {
				$gioitinh = "Nam";
			}
		$output .= '<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<img src="https://i.imgur.com/TKVdgHg.png"alt="">
		<h4>Mã lịch khám:' . $key->MaLK . '<center>Phiếu khám bệnh</center>Mã bệnh nhân:' . $key->MaBN . '</h4>
		<p>Người bệnh :</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên người bệnh</th>
						<th>Giới tính</th>
						<th> Ngày sinh </th>
                        <th>Số điện thoại</th>
					</tr>
				</thead>
				<tbody>;
				
	
					<tr>
						<td>' . $key->TenBN . '</td>
						<td>' . $gioitinh . '</td>
						<td>' . $key->Ngaysinh . '</td>
                        <td>' . $key->DienThoai . '</td>
						
					</tr>;
				

			
				</tbody>
			
		</table>

		<p>Thông tin khám :</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên bác sĩ</th>
						<th>Khoa</th>
						<th>Học vị</th>
					
					</tr>
				</thead>
				<tbody>;
				
	
					<tr>
						<td>' . $key->TenBS . '</td>
						<td>' . $key->TenKhoa . '</td>
						<td>' . $key->HocVi . '</td>
					
						;
				
			
				</tbody>
			
		</table>

		<p>Lịch khám </p>
			<table class="table-styling">
				<thead>
				</thead>
				<tbody>;

	            <tr>
				<td colspan="2">
					<p>Ngày khám : ' . $key->NgayTruc . ' </p>
					<p>Buổi:' . $key->Buoi . ' </p>
					<p>Giờ :' . $key->giokham . ' </p>
                    <p>Phòng :' . $key->MaPhong . ' </p>
                    <p>STT :' . $key->STT . ' </p>
				</td>
                <td colspan="2">
                <img src="https://i.imgur.com/q8MP1oP.png"alt="">
                
            </td>
		</tr>
					
				</tbody>
			
		</table>

		';


		return $output;
	}
	public function intoathuoc(Request $re)
	{
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_toathuoc_convert($re));
		return $pdf->stream();
	}

	public function print_toathuoc_convert($re)
	{
		
		$data['trieuchung'] = $re->tc;
		$data['benh'] = $re->benh;
		$data['toathuoc'] = $re->toathuoc;
		$data['ghichu'] = $re->ghichu;
		$data['Trangthai']=2;
		DB::table('lichkham')->where('MaLK', $re->malk)->update($data);
		$lich = DB::table('lichkham')
			->Join('benhnhan', 'lichkham.MaBN', '=', 'benhnhan.MaBN')
			->Join('lichtruc', 'lichkham.MaLT', '=', 'lichtruc.MaLT')
			->Join('bacsi', 'lichkham.MaBS', '=', 'bacsi.MaBS')
			->join('khoa', 'khoa.Makhoa', '=', 'bacsi.Makhoa')
			->where('lichkham.MaLK', $re->malk)->get();
		$output = '';
		foreach ($lich as $key)
			if ($key->gioitinh == 0) {
				$gioitinh = "Nữ";
			} else {
				$gioitinh = "Nam";
			}
		$thuoc = explode(',', $re->toathuoc);
		$output .= '<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<img src="https://i.imgur.com/TKVdgHg.png"alt="">
		<h4>Mã lịch khám:' . $key->MaLK . '<center>Toa thuốc</center>Mã bệnh nhân:' . $key->MaBN . '</h4>
		<p>Người bệnh :</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên người bệnh</th>
						<th>Giới tính</th>
						<th> Ngày sinh </th>
                        <th>Số điện thoại</th>
					</tr>
				</thead>
				<tbody>;
				
	
					<tr>
						<td>' . $key->TenBN . '</td>
						<td>' . $gioitinh . '</td>
						<td>' . $key->Ngaysinh . '</td>
                        <td>' . $key->DienThoai . '</td>
						
					</tr>;
				

			
				</tbody>
			
		</table>

		<p>Thông tin khám :</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên bác sĩ</th>
						<th>Khoa</th>
						<th>Học vị</th>
					
					</tr>
				</thead>
				<tbody>;
				
	
					<tr>
						<td>' . $key->TenBS . '</td>
						<td>' . $key->TenKhoa . '</td>
						<td>' . $key->HocVi . '</td>
					
						;
				
			
				</tbody>
			
		</table>

		<p>Thông tin bệnh </p>
			<table class="table-styling">
				<thead>
				</thead>
				<tbody>;

	            <tr>
				<td colspan="2">Triệu chứng
				</td>
                <td colspan="2">
				' . $re->tc . '
            	</td>
				</tr>
				<tr>
				<td colspan="2">Chẩn đoán bệnh
				</td>
                <td colspan="2">
				' . $re->benh . '
            	</td>
				</tr>
					
				</tbody>
				
			</table>
			<p>Toa thuốc </p>
			<table class="table-styling">
			<thead>
			<tr>
			<th >Tên thuốc</th>
			<th></th>
			<th>Số lượng</th>
			<th></th>
			</tr>
			</thead>
			<tbody>';
			foreach($thuoc as $t){
			$output .='<tr>
			<td colspan="2">'.$t.'
			</td>
			<td colspan="2">
			</td>
			</tr>';
			}


			$output .='</tbody>
		
			</table>
			<br>
			<table class="table-styling">
				<thead>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
				</thead>
				<tbody>;

	            <tr>
				<td>Ghi chú
				</td>
                <td colspan="5">
				' . $re->ghichu. '
            	</td>
				</tr>
			
					
				</tbody>
				
			</table>
			
			';

		


		return $output;
	}
}
