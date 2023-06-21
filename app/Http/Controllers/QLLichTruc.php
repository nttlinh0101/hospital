<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLLichTruc extends Controller
{
     public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function add_LTruc(){
  		$this->Authlogin();
        $ds_bacsi=DB::table('bacsi')
        ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')->where('TrangThaiBS',"1")
        ->orderby('MaBS','desc')->get();

    	return view('admin.add_LTruc')->with('ds_bacsi',$ds_bacsi);
    }

    public function bs_add_LTruc(){
        // $this->Authlogin();
        $matk = Session::get('matk-bacsi');
      $ds_bacsi=DB::table('bacsi')
      ->join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
      ->where('MaBS', $matk)
      ->first();
        // dd($ds_bacsi);
      return view('bacsi.add_LTruc')->with('ds_bacsi',$ds_bacsi);
  }
    public function save_LTruc(Request $request){
        $this->Authlogin();
    	$data = array();
    	$data['MaLT']=$request -> MaLT;
    	$data['Buoi']=$request -> Buoi;
    	$data['NgayTruc']=$request -> NgayTruc;
        $data['MaBS']=$request -> MaBS;
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('lichtruc')->insert($data);
    	Session::put('message',"Thêm Lịch Trực Thành Công!!!");
    	return Redirect::to('/add-LTruc');
    }
    public function bs_save_LTruc(Request $request){
        // $this->Authlogin();
    	$data = array();
    	$data['MaLT']=$request -> MaLT;
    	$data['Buoi']=$request -> Buoi;
    	$data['NgayTruc']=$request -> NgayTruc;
        $data['MaBS']=$request -> MaBS;
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('lichtruc')->insert($data);
    	Session::put('message',"Thêm Lịch Trực Thành Công!!!");
    	return Redirect::to('/bs-add-LTruc');
    }
    public function ds_LTruc(){
        $this->Authlogin();
    	$ds_LTruc = DB::table('lichtruc')
        ->join('bacsi','bacsi.MaBS','=','lichtruc.MaBS')
        ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
        ->orderby('lichtruc.MaLT','desc')->get();
        $manager_dsLTruc = view('admin.ds_LTruc')->with('ds_LTruc',$ds_LTruc);
        return view('/admin_layout')->with('admin.ds_LTruc',$manager_dsLTruc);
    }

    public function edit_LTruc($Ma_LTruc){
        $this->Authlogin();
        $ds_bacsi=DB::table('bacsi')
        ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
        ->orderby('MaBS','desc')->get();
        $edit_LTruc = DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->get();

        $manager_dsLTruc = view('admin.edit_LTruc')->with('edit_LTruc',$edit_LTruc)->with('ds_bacsi',$ds_bacsi);

        return view('/admin_layout')->with('admin.edit_LTruc',$manager_dsLTruc);
    }
    public function update_LTruc(Request $request,$Ma_LTruc ){
        $this->Authlogin();
        $data = array();
    	$data['Buoi']=$request -> Buoi;
    	$data['NgayTruc']=$request -> NgayTruc;
        $data['MaBS']=$request -> MaBS;

        DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->update($data);
        Session::put('message',"Sửa Thành Công!!!");
        return Redirect::to('/ds-LTruc');
    }
    public function delete_LTruc($Ma_LTruc){
        $this->Authlogin();
        DB::table('lichtruc')->where('MaLT',$Ma_LTruc)->delete();
        Session::put('message',"Xóa Thành Công!!!");
        return Redirect::to('/ds-LTruc');
    }

    public function confirmpay($MaLK) {
        DB::table('lichkham')->where('MaLK', '=', $MaLK)
        ->update(['Thanhtoan' => "1"]);
        return back();
    }

    //Quản lý lịch khám
    public function ds_LKham(){
        $this->Authlogin();
        $ds_LKham = DB::table('lichkham')
        ->join('benhnhan','benhnhan.MaBN','=','lichkham.MaBN')
        ->join('bacsi','bacsi.MaBS','=','lichkham.MaBS')
        ->join('lichtruc','lichtruc.MaLT','=','lichkham.MaLT')
        ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
        ->join('phong','phong.MaPhong','=','bacsi.MaPhong')
        ->orderby('lichkham.MaLK','desc')->get();
        $manager_dsLKham = view('admin.ds_LKham')->with('ds_LKham',$ds_LKham);
        return view('/admin_layout')->with('admin.ds_LKham',$manager_dsLKham);
    }
     public function chitietLK($Ma_LKham){
        $chitietlichkham = DB::table('lichkham')->where('MaLK',$Ma_LKham)
         ->join('benhnhan','benhnhan.MaBN','=','lichkham.MaBN')
        ->join('bacsi','bacsi.MaBS','=','lichkham.MaBS')
        ->join('lichtruc','lichtruc.MaLT','=','lichkham.MaLT')
        ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
        ->join('phong','phong.MaPhong','=','bacsi.MaPhong')
        ->orderby('lichkham.MaLK','desc')->get();
        $manager_ctLKham = view('admin.chitietlichkham')->with('chitietlichkham',$chitietlichkham);

        return view('/admin_layout')->with('admin.chitietlichkham',$manager_ctLKham);
    }

     public function ds_TaiKhoan(){
        $this->Authlogin();
        $ds_TaiKhoan = DB::table('taikhoan')->where('vaitro',0)->get();
        $manager_dstaikhoan = view('admin.ds_TaiKhoan')->with('ds_TaiKhoan',$ds_TaiKhoan);
        return view('/admin_layout')->with('admin.ds_TaiKhoan',$manager_dstaikhoan);
    }
     public function edit_TaiKhoan($Ma_TaiKhoan){
        $this->Authlogin();
        $edit_TaiKhoan = DB::table('taikhoan')->where('MaTK',$Ma_TaiKhoan)->get();

        $manager_dstaikhoan = view('admin.edit_TaiKhoan')->with('edit_TaiKhoan',$edit_TaiKhoan);

        return view('/admin_layout')->with('admin.edit_TaiKhoan',$manager_dstaikhoan);
    }
    public function update_TaiKhoan(Request $request,$Ma_TaiKhoan ){
        $this->Authlogin();
        $data = array();
        $data['MaTK']=$request -> MaTK;
        $data['Ten']=$request -> Ten;
        $data['Sodienthoai']=$request -> Sodienthoai;
        $data['MatKhau']=$request -> MatKhau;
        $data['VaiTro']=$request -> VaiTro;

        DB::table('taikhoan')->where('MaTK',$Ma_TaiKhoan)->update($data);
        Session::put('message',"Sửa Thành Công!!!");
        return Redirect::to('/ds-TaiKhoan');
    }
    public function delete_TaiKhoan($Ma_TaiKhoan){
        $this->Authlogin();
        DB::table('taikhoan')->where('MaTK',$Ma_TaiKhoan)->delete();
        Session::put('message',"Xóa Thành Công!!!");
        return Redirect::to('/ds-TaiKhoan');
    }


     public function add_TaiKhoan(){
        $this->Authlogin();
        $ds_bacsi=DB::table('bacsi')
         ->join('khoa','khoa.MaKhoa','=','bacsi.MaKhoa')
         ->orderby('MaBS','desc')->get();
        return view('admin.add_TaiKhoan')->with('ds_bacsi',$ds_bacsi);
    }
    public function save_TaiKhoan(Request $request){
      $this->Authlogin();
        $data = array();
        $data['MaTK']=$request -> MaTK;
        $data['Ten']=$request -> Ten;
        $data['Sodienthoai']=$request -> Sodienthoai;
        $data['MatKhau']=$request -> MatKhau;
        $data['VaiTro']=$request -> VaiTro;
        $data['MaBS']=$request -> MaBS;
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
        DB::table('taikhoan')->insert($data);
        Session::put('message',"Thêm Tài Khoản Thành Công!!!");
        return Redirect::to('/add-TaiKhoan');
    }
}
