<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartModel;
use DB;

class CartController extends Controller
{
    public function getCart() {
        $giohang = CartModel::where('sdt', '0929626424')
            ->join('monan', 'monan.mamon', '=', 'cart.mamon')
            ->select('monan.tenmon', 'monan.mamon', DB::raw('sum(soluong) as soluong'), 'monan.dongia', 'monan.hinh')
            ->groupBy('monan.tenmon', 'monan.mamon', 'cart.mamon', 'monan.dongia', 'monan.hinh')
            ->get();

        return view('client.gio-hang', compact('giohang'));
    }

    public function addCart($id) {
        $result = CartModel::insert([
            'sdt' => '0929626424',
            'mamon' => $id,
            'soluong' => 1
        ]);

        if($result){
            return [
                'status' => 'success',
                'message' => 'Thêm giỏ hàng thành công',
            ];
        } else {
            return [
                'status' => 'danger',
                'message' => 'Thêm giỏ hàng thất bại',
            ];
        }
    }

    
}
