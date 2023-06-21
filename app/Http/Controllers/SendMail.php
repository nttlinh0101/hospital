<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
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
}
