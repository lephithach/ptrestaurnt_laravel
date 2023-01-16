<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegisterModel extends Model
{
    use HasFactory;

    protected $table = 'clientuser';
    protected $primaryKey = 'sdt';
    public $timestamps = true;

    protected $hidden = ['password'];
    protected $fillable = ['sdt', 'password', 'ho', 'ten', 'ngaysinh', 'gioitinh'];
}
