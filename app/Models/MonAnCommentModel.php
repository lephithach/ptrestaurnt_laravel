<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAnCommentModel extends Model
{
    use HasFactory;

    protected $table = "monancomment";
    protected $primaryKey = "id_comment";
    // public $timestamps = true;

    public function monAn() {
        return $this->hasOne(MonAnModel::class, 'mamon', 'mamon');
    }

    public function sdt() {
        return $this->hasOne(ClientRegisterModel::class, 'sdt', 'sdt');
    }
}
