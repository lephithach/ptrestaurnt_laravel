<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonModel extends Model
{
    use HasFactory;

    protected $table = 'hoadon';
    protected $primaryKey = 'mahoadon';
    public $timestamps = false;
}
