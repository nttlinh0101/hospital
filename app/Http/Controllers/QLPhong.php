<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class QLPhong extends Controller
{
         public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function add_Phong(){
        $this->Authlogin();
        $ds_khoa=DB::table('khoa')->orderby('MaKhoa','desc')->get();
    	return view('admin.add_Phong')->with('ds_khoa',$ds_khoa);
    }
    public function save_Phong(Request $request){
        $this->Authlogin();
    	$data = array();
    	$data['MaPhong']=$request -> MaPhong;
    	$data['MaKhoa']=$request -> Khoa;
    	// echo'<pre>';
    	// print_r($data);
    	// echo'</pre>';
    	DB::table('phong')->insert($data);
    	Session::put('message',"Thêm Phòng Thành Công!!!");
    	return Redirect::to('/add-Phong');
    }
    public function ds_Phong(){
        $this->Authlogin();
    	$ds_Phong = DB::table('phong')
        ->join('khoa','khoa.MaKhoa','=','phong.MaKhoa')->orderby('phong.MaPhong','desc')->get();
        $manager_dsphong = view('admin.ds_Phong')->with('ds_Phong',$ds_Phong);
        return view('/admin_layout')->with('admin.ds_Phong',$manager_dsphong);
    }

    public function unactive_Phong($Ma_Phong){
        DB::table('phong')->where('MaPhong',$Ma_Phong)->update(['TrangThaiPhong'=>1]);
        Session::put('message',"Kích Hoạt Phòng Thành Công!!!");
        return Redirect::to('/ds-Phong');

    }
    public function active_Phong($Ma_Phong){
     	 DB::table('phong')->where('MaPhong',$Ma_Phong)->update(['TrangThaiPhong'=>0]);
        Session::put('message'," Phòng Tạm Thời Ngừng Hoạt Động!!!");
        return Redirect::to('/ds-Phong');
    }

     public function edit_Phong($Ma_Phong){
        $this->Authlogin();
        $ds_khoa=DB::table('khoa')->orderby('MaKhoa','desc')->get();

        $edit_Phong = DB::table('phong')->where('MaPhong',$Ma_Phong)->get();

        $manager_dsphong = view('admin.edit_Phong')->with('edit_Phong',$edit_Phong)->with('ds_khoa',$ds_khoa);

        return view('/admin_layout')->with('admin.edit_Phong',$manager_dsphong);
    }
    public function update_Phong(Request $request,$Ma_Phong ){
        $this->Authlogin();
        $data = array();
        $data['MaPhong']=$request -> MaPhong;
        $data['MaKhoa']=$request -> Khoa;

        DB::table('phong')->where('MaPhong',$Ma_Phong)->update($data);
        Session::put('message',"Sửa Phòng Thành Công!!!");
        return Redirect::to('/ds-Phong');
    }
    public function delete_phong($MaPhong){
        // DB::table('khoa')->where('MaKhoa',$MaKhoa)->delete();
          DB::table('phong')->where('MaPhong',$MaPhong)->delete();
          return back();
      }
}