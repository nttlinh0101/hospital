<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class QLKhoa extends Controller
{
      public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
     public function add_Khoa(){
       $this->Authlogin();
    	return view('admin.add_Khoa');
    }
     public function ds_Khoa(){
       $this->Authlogin();
     	$ds_Khoa = DB::table('khoa')->get();
     	$manager_dskhoa = view('admin.ds_Khoa')->with('ds_Khoa',$ds_Khoa);
    	return view('/admin_layout')->with('admin.ds_Khoa',$manager_dskhoa);
    }
    
    //ThemKhoa
    public function save_Khoa(Request $request){
       $this->Authlogin();
    	$data = array();
    	$data['MaKhoa']=$request -> MaKhoa;
    	$data['TenKhoa']=$request -> TenKhoa;
      $data['gia']=$request -> gia;
  		$get_image = $request ->file('Hinh');
  		if($get_image){
  			$get_name_image= $get_image->getClientOriginalName();
  			$name_image = current(explode('.', $get_name_image));
  			$new_image = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
  			$get_image->move('public/frontend/img/khoa',$new_image);
  			$data['Hinh']=$new_image;
  			DB::table('khoa')->insert($data);
	    	Session::put('message',"Thêm Khoa Thành Công!!!");
	    	return Redirect::to('/add-Khoa');
	  	}
	    	// echo'<pre>';
	    	// print_r($data);
	    	// echo'</pre>';
      $data['Hinh']='';
    	DB::table('khoa')->insert($data);
    	Session::put('message',"Thêm Khoa Thành Công!!!");
    	return Redirect::to('/add-Khoa');
    }
    //SuaKhoa
    public function edit_Khoa($Ma_Khoa ){
       $this->Authlogin();
    	$edit_Khoa = DB::table('khoa')->where('MaKhoa',$Ma_Khoa)->get();
     	$manager_dskhoa = view('admin.edit_Khoa')->with('edit_Khoa',$edit_Khoa);

    	return view('/admin_layout')->with('admin.edit_Khoa',$manager_dskhoa);
    }
    public function update_Khoa(Request $request,$Ma_Khoa ){
       $this->Authlogin();
    	$data = array();
    	$data['MaKhoa']=$request -> MaKhoa;
    	$data['TenKhoa']=$request -> TenKhoa;
      $data['gia']=$request -> gia;
  		$get_image = $request ->file('Hinh');
      if($get_image){
        $get_name_image= $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,100).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/frontend/img/khoa',$new_image);
        $data['Hinh']=$new_image;
       DB::table('khoa')->where('MaKhoa',$Ma_Khoa)->update($data);
      Session::put('message',"Sửa Thành Công!!!");
      return Redirect::to('/ds-Khoa');
      }
      $data['Hinh']='';
      DB::table('khoa')->where('MaKhoa',$Ma_Khoa)->update($data);
  		Session::put('message',"Sửa Thành Công!!!");
    	return Redirect::to('/ds-Khoa');
    }
    // //Xoa
    public function delete_Khoa($MaKhoa){
      DB::table('bacsi')->where('MaKhoa',$MaKhoa)->delete();
    	DB::table('khoa')->where('MaKhoa',$MaKhoa)->delete();
    	return back();
    }
    //  public function unactive_khoa($Ma_Khoa){
    //     DB::table('khoa')->where('MaKhoa',$Ma_Khoa)->update(['TrangThaiKhoa'=>1]);
    //     Session::put('message',"Kích Hoạt Khoa Thành Công!!!");
    //     return Redirect::to('/ds-Khoa');

    // }
    //  public function active_khoa($Ma_Khoa){
    //      DB::table('khoa')->where('MaKhoa',$Ma_Khoa)->update(['TrangThaiKhoa'=>0]);
    //     Session::put('message',"Khoa Tạm Ngưng Hoạt Động !!!");
    //     return Redirect::to('/ds-Khoa');
    // }

}