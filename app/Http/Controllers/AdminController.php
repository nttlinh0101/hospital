<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function Authlogin(){
        $matk=Session::get('matk');
            if($matk){
              return  Redirect::to('dashboard');
            }else{
              return  Redirect::to('admin')->send();
            }
    }
    public function index(){
        $matk=Session::get('matk');
        $mabacsi=Session::put('matk-bacsi');
        if($matk){
            return  Redirect::to('dashboard');
        }elseif($mabacsi){
            return Redirect::to('/trangbacsi');
        }else{
        return view('admin_login');
        }
    }
    public function admin_layout(){
        $this->Authlogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){
        $Ten = $request->Ten;
        $MatKhau = $request->MatKhau;
        $result = DB::table('taikhoan')->where('ten',$Ten)->where('MatKhau',$MatKhau)->first();
     
        if($result){
            $vaitro =$result->VaiTro; 

            if($vaitro==1){
            Session::put('ten',$result->Ten);
            Session::put('matk',$result->MaTK);
            return Redirect::to('/dashboard');
            }else{
                Session::put('matk-bacsi',$result->MaTK);
                Session::put('MaBS',$result->MaBS);
                $bacsi = DB::table('bacsi')->where('MaBs',$result->MaBS)->first();
                Session::put('ten-bacsi',$bacsi->TenBS);
                return Redirect::to('/trangbacsi');
            }

        }else{
             Session::put('message',"Mật Khẩu Hoặc Tài Khoản Không Đúng!!");
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        $this->Authlogin();
        Session::put('ten',null);
        Session::put('matk',null);
        return Redirect::to('/admin');
    }
}