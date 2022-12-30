<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRegisterModel extends Model
{
    use HasFactory;

    protected $table = 'clientuser';
    protected $primaryKey = 'sdt';
    public $timestaps = true;
}
