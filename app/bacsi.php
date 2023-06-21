<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;

class bacsi extends Model
{
    use Notifiable;
    
    public $timestamps = FALSE;
    protected $table = "bacsi";
    protected $primarykey="MaBS";
    protected $fillable = [
        'TenBS', 'HocVi','gioitinh','MaKhoa','MaPhong',
    ];


    
    
}
