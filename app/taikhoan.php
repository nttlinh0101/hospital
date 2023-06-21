<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class taikhoan extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'taikhoan';

    protected $fillable=['Ten','Sodienthoai','MatKhau'];

}
