<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonAnModel extends Model
{
    use HasFactory;

    protected $table = 'monan';
    protected $primaryKey = 'mamon';
    public $timestamp = false;
}
