<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiMonModel extends Model
{
    use HasFactory;
    protected $table = 'loaimon';
    // protected $primaryKey = 'maloai';
    public $timestamps = false;

    public function monAn() {
        return $this->hasMany(MonAnModel::class, 'maloai', 'maloai');
    }

    public function anhLoaiMon() {
        return $this->hasOne(MonAnModel::class, 'maloai', 'maloai');
    }

    public function scopeMonAn($query) {
        return $query->join(MonAnModel::class, 'maloai', 'maloai');
    }
}
