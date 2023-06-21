<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\Cloner\Data;
session_start();
class loginController extends Controller
{
    public function Alogin(){
        $matk=Session::get('id-user');
            if($matk){
              return  Redirect::to('/');
            }else{
              return  Redirect::to('/dangnhap')->send();
            }
    }
    // public function sendmail($re,$code){
    //     $code = rand(1000,9999);
    //     $to_name = " Medical ";
    //     $to_email = $re->email;
    //     $data = array("name"=>$re->ten,"body" => 'Vui lòng nhập mã :',"code"=>$code);
    //     Mail::send('formmail',$data,function($message) use ($to_name,$to_email){
    //         $message->to($to_email)->subject('Quên mật khẩu ');
    //         $message->from($to_email,$to_name);
    //     });

    // }
    public function dangnhap(Request $re){
        Session::put('thongbaodangky',"");
        Session::put('thongbaodangky1',"");
        Session::put('thongbaodangnhap',"");
        $phone = $re->phone;
        $pass = $re->pass;

        $result = DB::table('taikhoan')->where('Sodienthoai',$phone)->where('MatKhau',$pass)->first();
        if($result){

            Session::put('id-user',$result->MaTK); 
            Session::put('sodienthoai',$result->Sodienthoai);
            Session::put('ten-user',$result->Ten);
            Session::put('email-user',$result->email);
            return view('home'); 
        }else{
            Session::put('thongbaodangnhap',"Số điện thoại hoặc mật khẩu không đúng !");
            return view('benhnhan.dangnhap'); 
        }

    }
    public function quenmatkhau(){
        return View('matkhau.quenmatkhau');
    }
  
    public function dangky(Request $re){
        Session::put('thongbaodangky',"");
        Session::put('thongbaodangky1',"");
        $phone = $re->phone;
        $ten = $re->ten;
        $pass1 = $re->pass1;
        $pass2 = $re->pass2;

        $cout = DB::table('taikhoan')->where('Sodienthoai',$phone)->count();
        if($cout>0)
        {
            Session::put('thongbaodangky',"Số điện thoại đã tồn tại !");   
            return view('benhnhan.dangnhap');
        }else{
        if($pass1 == $pass2){
            $data['Ten'] = $ten;
            $data['Sodienthoai']=$phone;
            $data['MatKhau']=$pass1;
            $data['email']=$re->email;
            $data['VaiTro']="0";  
            DB::table('taikhoan')->insert($data);
            Session::put('thongbaodangky1',"Đăng Ký Thành Công");
            return view('benhnhan.dangnhap');
        }else{
            Session::put('thongbaodangky',"Mật khẩu chưa khớp  !");
          return view('benhnhan.dangnhap');
        }
    }
}
        public function dangxuat(){
            Session::put('id-user',""); 
            Session::put('sodienthoai',"");
            Session::put('ten-user',"");
            return view('home'); 
        }
        public function layma(Request $re){
            $email = DB::table('taikhoan')->where('email',$re->email)->count();
            if($email==0){
                return view('matkhau.quenmatkhau')->with('error',"Tài khoản không tồn tại");
            }else{
                $code = rand(1000,9999);
                $data['code']=$code;
                DB::table('taikhoan')->where('email',$re->email)->update($data);
                $to_name = " Medical ";
                $to_email = $re->email;
                $data = array("name"=>$re->ten,"body" => 'Mã của bạn là :',"code"=>$code);
                Mail::send('formmail',$data,function($message) use ($to_name,$to_email){
                    $message->to($to_email)->subject('Quên mật khẩu ');
                    $message->from($to_email,$to_name);
                });
                return View('matkhau.nhapcode')->with('email',$re->email);
            }
            
        }
        public function xacthuc(Request $re){
            $email= DB::table('taikhoan')->where('email',$re->email)->where('code',$re->code)->count();
            if($email == 0){
                return View('matkhau.nhapcode')->with('mess',"Sai mã , nhập lại !")->with('email',$re->email);
            }else if($email==1){
                $data['code']=null;
                DB::table('taikhoan')->where('email',$re->email)->update($data);
                return View('matkhau.doimatkhau')->with('email',$re->email);
            }
        }
        public function capnhatmatkhau(Request $re){
            $data['MatKhau']= $re->pass1;
            DB::table('taikhoan')->where('email',$re->email)->update($data);
            return redirect('/');
        }
        public function doimatkhau(){
            $this->Alogin();
            $email=Session::get('email-user');
            return View('matkhau.doimatkhau')->with('email',$email);
        }



   

}
