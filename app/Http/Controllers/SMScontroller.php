<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SMScontroller extends Controller
{
    public function send(){
        $code = rand(1000,9999);
        $basic  = new \Vonage\Client\Credentials\Basic("57f48ef4", "8XNQONlBrRyC6dpO");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("84585003265", 'Medical', 'vui lòng nhập mã code:'.$code)
        );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
