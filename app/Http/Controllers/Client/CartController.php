<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CartModel;
use DB;
use Session;

class CartController extends Controller
{
    public function getCart() {
        $sdt = 0 . Session::get('userClient')[0]['sdt'];

        $giohang = CartModel::where('sdt', $sdt)
            ->join('monan', 'monan.mamon', '=', 'cart.mamon')
            ->select('monan.tenmon', 'monan.mamon', DB::raw('sum(soluong) as soluong'), 'monan.dongia', 'monan.hinh')
            ->groupBy('monan.tenmon', 'monan.mamon', 'cart.mamon', 'monan.dongia', 'monan.hinh')
            ->get()
            ->toArray();

        return view('client.gio-hang', compact('giohang'));
    }

    public function addCart($id) {
        if(!Session::has('userClient')) {
            return [
                'status' => 'warning',
                'message' => 'Vui lòng đăng nhập để sử dụng chức năng này!',
            ];
        } else {
            $sdt = 0 . Session::get('userClient')[0]['sdt'];
    
            $result = CartModel::insert([
                'sdt' => $sdt,
                'mamon' => $id,
                'soluong' => 1
            ]);
    
            if($result){
                return [
                    'status' => 'success',
                    'message' => 'Thêm giỏ hàng thành công.',
                ];
            } else {
                return [
                    'status' => 'danger',
                    'message' => 'Thêm giỏ hàng thất bại.',
                ];
            }
        }
    }
}
