<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientViewController extends Controller
{
    public function TrangChu() {
        return view('client.home');
    }

    public function GioiThieu() {
        return view('client.gioi-thieu');
    }
}
