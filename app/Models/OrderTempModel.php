<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTempModel extends Model
{
    use HasFactory;

    protected $table = 'ordertemp';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function tenmon() {
        return $this->hasOne(MonAnModel::class, 'mamon', 'mamon');
    }
}
