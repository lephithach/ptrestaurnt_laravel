<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAnModel extends Model
{
    use HasFactory;

    protected $table = 'monan';
    protected $primaryKey = 'mamon';
    public $timestamps = false;

    public function loaiMon() {
        return $this->hasOne(LoaiMonModel::class, 'maloai', 'maloai');
    }

    public function comment() {
        return $this->hasMany(MonAnCommentModel::class, 'mamon', 'mamon');
    }
}
