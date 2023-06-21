<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLBenhNhan extends Controller
{
    public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function ds_BenhNhan(){
        $this->Authlogin();
    	$ds_BenhNhan = DB::table('benhnhan')->get();
     	$manager_dsbenhnhan = view('admin.ds_BenhNhan')->with('ds_BenhNhan',$ds_BenhNhan);
    	return view('/admin_layout')->with('admin.ds_BenhNhan',$manager_dsbenhnhan);
    }
     public function chitietbn($Ma_benhnhan){
        $chitietbenhnhan = DB::table('benhnhan')->where('MaBN',$Ma_benhnhan)->
        orderby('benhnhan.MaBN','desc')->get();
        $manager_ctbenhnhan = view('admin.chitietbenhnhan')->with('chitietbenhnhan',$chitietbenhnhan);

        return view('/admin_layout')->with('admin.chitietbenhnhan',$manager_ctbenhnhan);
    }
    public function delete_benhnhan($MaBN){
      DB::table('lichkham')->where('MaBN',$MaBN)->delete();
      DB::table('benhnhan')->where('MaBN',$MaBN)->delete();
        return back();
    }

    //add-benhnhan
    public function add_benhnhan(){
      $this->Authlogin();
      $tk = DB::table('taikhoan')->orderby('MaTK','desc')->get();
      // $ds_phong=DB::table('phong')->orderby('MaPhong','desc')->get();

      return view('admin.add_benhnhan')->with('ds_TaiKhoan',$tk);
      // ->with('ds_phong',$ds_phong);
  }
  public function save_benhnhan(Request $request){
    $this->Authlogin();
    $data = array();
    $data['TenBN']=$request -> TenBN;
    $data['gioitinh']=$request -> GioiTinh;
    $data['Ngaysinh']=$request -> NgaySinh;
    $data['DiaChi']=$request -> DiaChi;
    $data['DienThoai']=$request -> DienThoai;
    $data['CMND']=$request -> CMND;
    // $data['Hinh']=$request -> Hinh;
    $data['MaTK']=$request -> MaTK;
    $get_image = $request ->file('hinh');
    if($get_image){
        $get_name_image= $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/backend/img',$new_image);
        $data['hinh']=$new_image;
        DB::table('benhnhan')->insert($data);
        Session::put('message',"Thêm Thành Công!!!");
        return Redirect::to('/add-benhnhan');
    }
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
    $data['hinh']='';
    DB::table('benhnhan')->insert($data);
    Session::put('message',"Thêm Thành Công!!!");
    return Redirect::to('/add-benhnhan');
}
}
