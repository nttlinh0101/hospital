<?php

namespace App\Http\Controllers;
date_default_timezone_set('Asia/Ho_Chi_Minh');
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Symfony\Component\VarDumper\Cloner\Data;
session_start();
class chatController extends Controller
{
    public function Alogin(){
        $matk=Session::get('matk-bacsi');
            if($matk){
              return  Redirect::to('/');
            }else{
              return  Redirect::to('/bacsi')->send();
            }
    }
    public function listchat(){
        $this->Alogin();
        $khoa = DB::table('khoa')->get();
        
        foreach($khoa as $key ){
            $MaKhoa= $key->MaKhoa;
            $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('MaKhoa',$MaKhoa)->get();
            $a[] = $bacsi;
            }
        return view('bacsi.list_chat')->with('khoa',$khoa)->with('bacsi',$a);
    }

    public function box_chat($Manhan){
        $this->Alogin();
        $matk =Session::get('matk-bacsi');
        $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('taikhoan.MaTK',$Manhan)->first();
        $Messgui = DB::table('tinnhan')->where([['Magui','=',$matk],['Manhan','=',$Manhan]])->orWhere([['Magui','=',$Manhan],['Manhan','=',$matk]])->orderBy('MaTN','ASC')->get();
        $c = DB::table('tinnhan')->where([['Magui','=',$matk],['Manhan','=',$Manhan]])->orWhere([['Magui','=',$Manhan],['Manhan','=',$matk]])->count();
        $date['thoigian'] =date('Y-m-d H:i:s');;
   
        $matk =Session::get('matk-bacsi');
        DB::table('tinnhan')->where('Magui',$Manhan)->where('Manhan',$matk)->where('thoigian',null)->update($date);
        return view('bacsi.chat_box')->with('Mess',$Messgui)->with('bacsi',$bacsi->TenBS)->with('MBS',$Manhan)->with('c',$c);

    }
    public function box_chat1($Manhan){
        $matk =Session::get('matk-bacsi');
        $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('taikhoan.MaTK',$Manhan)->first();
        $Messgui = DB::table('tinnhan')->where([['Magui','=',$matk],['Manhan','=',$Manhan]])->orWhere([['Magui','=',$Manhan],['Manhan','=',$matk]])->orderBy('MaTN','ASC')->get();
        $c = DB::table('tinnhan')->where([['Magui','=',$matk],['Manhan','=',$Manhan]])->orWhere([['Magui','=',$Manhan],['Manhan','=',$matk]])->count();
        echo $Messgui;
    }
    public function chatkhoa($MaKhoa){
        
        $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('MaKhoa',$MaKhoa)->get();
    echo $bacsi;
    }
    public function send(Request $re){
        
        $matk =Session::get('matk-bacsi');
        $data['Manhan']=$re->NN;
        $data['Magui']=$matk;
        $data['noidung']=$re->text;
        DB::table('tinnhan')->insert($data);
    }
    public function test(){
        $this->Alogin();
        return view('bacsi.test');
    }

    public function xemtin($Magui){
        
        $date['thoigian'] =date('Y-m-d H:i:s');;
   
        $matk =Session::get('matk-bacsi');
        DB::table('tinnhan')->where('Magui',$Magui)->where('Manhan',$matk)->where('thoigian',null)->update($date);
      

    }
    public function loadtin($matk){
        $count = DB::table('tinnhan')->where('Manhan',$matk)->where('thoigian',null)->count();
        echo $count;
    }

    public function tincho(){
        $matk =Session::get('matk-bacsi');
       
        $tinnhan = DB::table('tinnhan')->where('Manhan',$matk)->where('thoigian',null)->get();
        foreach($tinnhan as $l){
            $MG = $l->Magui;
            $data["Magui"]=$MG;
            $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('taikhoan.MaTK',$MG)->first();
            $data["TenBS"]=$bacsi->TenBS;
            $Count = DB::table('tinnhan')->where('Manhan',$matk)->where('Magui',$MG)->where('thoigian',null)->count();
            $data["count"]=$Count;
            
            
             $a[]=array_unique($data);
            $hihi = json_encode($a,true);
        } 
        echo $hihi;
    }
    public function timkiem($key){
        $bacsi = DB::table('taikhoan')->Join('bacsi', 'taikhoan.MaBS', '=', 'bacsi.MaBS')->where('bacsi.TenBS', 'like', '%' . $key . '%')->get();
        echo $bacsi;
    }
    
}