<?php

namespace App\Http\Controllers;
use App\bacsi;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\Count;
use Symfony\Component\VarDumper\Cloner\Data;

session_start();

class homecontroller extends Controller
{
    public function sendmail($re,$code){
        $code = rand(1000,9999);
        $to_name = " Medical ";
        $to_email = $re->email;
        $data = array("name"=>$re->ten,"body" => 'Vui lòng nhập mã :',"code"=>$code);
        Mail::send('formmail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Quên mật khẩu ');
            $message->from($to_email,$to_name);
        });

    }
    
    public function Alogin(){
        $matk=Session::get('id-user');
            if($matk){
              return  Redirect::to('/');
            }else{
              return  Redirect::to('/dangnhap')->send();
            }
    }
    public function chonca($MaBS){
        $this->Alogin();
        $today = date('Y-m-j', time());
        
        $lichkham = DB::table('lichtruc')->where('NgayTruc','>',$today)
            ->where('MaBS', $MaBS) ->get();
            $c = DB::table('lichtruc')->where('NgayTruc','>',$today)
            ->where('MaBS', $MaBS) ->count();
        $BS = DB::table('bacsi')->where('MaBS',$MaBS)->get();
        
        return View('benhnhan.chongio')->with('catruc',$lichkham)->with('bs',$BS)->with('count',$c);
    }
    public function quytrinh(){
        return view('quytrinh');
    }
    public function dangnhap(){
        Session::put('thongbaodangnhap',"Đăng nhập để đăng ký lịch");
        Session::put('thongbaodangky',"");
        Session::put('thongbaodangky1',"");
        return view('benhnhan.dangnhap');

    }
    public function layout()
    {
       
    $this->Alogin();
    return view('datlich');
    }

    public function dskhoa($key)
    {   $this->Alogin();
        $khoa = DB::table('khoa')->get();
        Session::put('key', $key);
        return view('benhnhan.timbacsi')->with('khoa', $khoa);
    }

    //Hiện danh sách khoa
    public function layout_theobacsi()
    {   $this->Alogin();
        $khoa = DB::table('khoa')->get();

        return view('benhnhan.timbacsi')->with('khoa', $khoa);
       
    }

    //Phân loại layout chọn
    public function dsbacsi($Makhoa)
    { 
        $this->Alogin();
        $key = Session::get('key');
        if ($key == 2) {
            
            $khoa = DB::table('khoa')->where('Makhoa', $Makhoa)->get();
            foreach ($khoa as $key)
            Session::put('khoa', $key->TenKhoa);
            Session::put('makhoa', $key->MaKhoa);
            
            $dsbacsi = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')->where('bacsi.MaKhoa', $Makhoa)->where('TrangThaiBS',"1")->get();
            return view('benhnhan.dsbacsi')->with('dsbacsi', $dsbacsi);
        } else if ($key == 1) {
            $khoa = DB::table('khoa')->where('Makhoa', $Makhoa)->get();
            foreach ($khoa as $key)
            Session::put('khoa', $key->TenKhoa);
            Session::put('makhoa', $key->MaKhoa);
            return view('lich1');
        }
       
    }
  //tìm kiếm Bác sĩ
    public function timkiem(Request $re)
    {   
        $hoten = $re->hoten;
        $gioitinh = $re->gioitinh;
        $hocvi = $re->hocvi;
        $Makhoa = $re->makhoa;

        if ($hoten) {
            if ($gioitinh) {
                if ($hocvi) {
                    $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                        ->where('bacsi.MaKhoa', $Makhoa)
                        ->where('TenBS', 'like', '%' . $hoten . '%')
                        ->where('gioitinh', 'like', '%' . $gioitinh . '%')
                        ->where('HocVi', 'like', '%' . $hocvi . '%')
                        ->where('TrangThaiBS',"1")->get();
                } else {
                    $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                        ->where('bacsi.MaKhoa', $Makhoa)
                        ->where('TenBS', 'like', '%' . $hoten . '%')
                        ->where('gioitinh', 'like', '%' . $gioitinh . '%')
                        ->where('TrangThaiBS',"1")->where('TrangThaiBS',"1")->get();
                }
            } else if ($hocvi) {
                $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                    ->where('bacsi.MaKhoa', $Makhoa)
                    ->where('TenBS', 'like', '%' . $hoten . '%')
                    ->where('HocVi', 'like', '%' . $hocvi . '%')->where('TrangThaiBS',"1")->get();
            } else {
                $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                    ->where('bacsi.MaKhoa', $Makhoa)
                    ->where('TenBS', 'like', '%' . $hoten . '%')->where('TrangThaiBS',"1")->get();
            }
        } else if ($gioitinh >= 0) {
            if ($hocvi) {
                $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                    ->where('bacsi.MaKhoa', $Makhoa)
                    ->where('gioitinh', 'like', '%' . $gioitinh . '%')
                    ->where('HocVi', 'like', '%' . $hocvi . '%')->where('TrangThaiBS',"1")->get();
            } else {
                $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                    ->where('bacsi.MaKhoa', $Makhoa)
                    ->where('gioitinh', 'like', '%' . $gioitinh . '%')->where('TrangThaiBS',"1")->get();
            }
        } else {
            $result = DB::table('bacsi')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
                ->where('bacsi.MaKhoa', $Makhoa)
                ->where('HocVi', 'like', '%' . $hocvi . '%')->where('TrangThaiBS',"1")->get();
        }

        return view('benhnhan.dsbacsi')->with('dsbacsi', $result);
    }
  
    //Điền form đăng ký thông tin bệnh nhân 
    public function diendangky(Request $request)
    {
     
        
        $ac = Session::get('id-user');
        if($ac){
        $MaLT=$request->malt;
        $time =$request->time;
        Session::put('time',$time);
        Session::put('MaLT',$MaLT);
        $result = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')->Join('khoa', 'bacsi.MaKhoa', '=', 'khoa.MaKhoa')
            ->where('lichtruc.MaLT', $MaLT)->get();
        $benhnhan = DB::table('benhnhan')->where('MaTK',$ac)->get();
        $quan = DB::table('quan')->where('provinceid', "79TTT")->orderBy('namequan', 'desc')->get();
        return view('benhnhan.dienthongtin')->with('quan', $quan)->with('bacsi', $result)->with('benhnhan',$benhnhan)->with('time',$request->time);
        }else{
            return redirect('/dangnhap');
        }

    }//Lấy dữ liệu quận 
    public function quan($Maquan)
    { $result = DB::table('phuong')->Join('quan', 'quan.districtid', '=', 'phuong.districtid')
        ->where('quan.namequan', $Maquan)
        ->orderBy('name', 'desc')
        ->get();

        echo $result;
    }
    
 
   

  public function lichkham($MaBS)
    {  $today = date('Y-m-j', time());
        
        $lichkham = DB::table('lichtruc')->where('NgayTruc','>',$today)
            ->where('MaBS', $MaBS) ->get();
        foreach($lichkham as $l){
            $LK = $l->MaLT;
            $data["MaLT"]=$LK;
            $data["Buoi"]=$l->Buoi;
            $data["NgayTruc"]=$l->NgayTruc;
            $data["MaBS"]=$l->MaBS;
          
            $Count = DB::table('lichkham')->where('MaLT',$LK)->count();
            $data["count"]=$Count;
            
          
           $a[]=$data;
            $hihi = json_encode($a,true);
        } 
        echo $hihi;
        }
    
       public function ngaytruc($ngaytruc){
        $makhoa = session::get('makhoa');
        $bacsi = DB::table('bacsi')->Join('lichtruc', 'bacsi.MaBS', '=', 'lichtruc.MaBS')
        ->where('MaKhoa',$makhoa)
        ->where('lichtruc.NgayTruc', $ngaytruc)->get();
        echo $bacsi;
    }
    public function homnay(){
        $this->Alogin();
        return view('lich1');
    }
    public function test(){
        $MaBS = 1;
        $today = date('Y-m-j', time());
        $a[]="";
        $lichkham = DB::table('lichtruc')->where('NgayTruc','>',$today)
            ->where('MaBS', $MaBS) ->get();
        foreach($lichkham as $l){
            $LK = $l->MaLT;
            $data["MaLT"]=$LK;
            $data["Buoi"]=$l->Buoi;
            $data["NgayTruc"]=$l->NgayTruc;
            $data["MaBS"]=$l->MaBS;
          
            $Count = DB::table('lichkham')->where('MaLT',$LK)->count();
            $data["count"]=$Count;
            
          
           $a[]=$data;
            $hihi = json_encode($a,true);
        } 
        echo $hihi;
        
    }
    public function chongio($ma){
            $count1= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"07:00:00")->count();
            $count2= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"08:00:00")->count();
            $count3= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"09:00:00")->count();
            $count4= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"10:00:00")->count();
            $count5= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"13:30:00")->count();
            $count6= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"14:30:00")->count();
            $count7= DB::table('lichkham')->where('MaLT',$ma)->where('giokham',"15:30:00")->count();
            $data["ca1"]=$count1;
            $data["ca2"]=$count2;
            $data["ca3"]=$count3;
            $data["ca4"]=$count4;
            $data["ca5"]=$count5;
            $data["ca6"]=$count6;
            $data["ca7"]=$count7;
            $a[]=$data;
            $hihi = json_encode($a,true);
            echo $hihi;

            

    }
 
}
