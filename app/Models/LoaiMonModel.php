<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiMonModel extends Model
{
    use HasFactory;
    protected $table = 'loaimon';
    protected $primaryKey = 'maloai';
    public $timestamp = false;
}
