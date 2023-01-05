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

        // $giohang = CartModel::where('sdt', $sdt)
        //     ->join('monan', 'monan.mamon', '=', 'cart.mamon')
        //     ->select('monan.tenmon', 'monan.mamon', DB::raw('sum(soluong) as soluong'), 'monan.dongia', 'monan.hinh')
        //     ->groupBy('monan.tenmon', 'monan.mamon', 'cart.mamon', 'monan.dongia', 'monan.hinh')
        //     ->get()
        //     ->toArray();

        $giohang = CartModel::where('sdt', $sdt)
            ->join('monan', 'monan.mamon', '=', 'cart.mamon')
            ->get()
            ->toArray();

        return view('client.gio-hang', compact('giohang'));
    }

    public function addCart($id) {
        if(!Session::has('userClient')) {
            return [
                'status' => 'warning',
                'message' => 'Vui lòng đăng nhập để sử dụng chức năng này!',
                'link' => route('client.dangnhap'),
            ];
        } else {
            $sdt = 0 . Session::get('userClient')[0]['sdt'];
            $soluong = 1;

            // Check exist mamon
            $getSL = CartModel::where('sdt', $sdt)->where('mamon', $id)->get('soluong')->toArray();

            // If exist maon on table cart
            if(count($getSL) != 0) {
                // Update SoLuong
                $result = CartModel::where('sdt', $sdt)
                    ->where('mamon', $id)
                    ->update(['soluong' => $getSL[0]['soluong'] + 1]);
            } else {
                // Insert mamon
                $result = CartModel::insert([
                    'sdt' => $sdt,
                    'mamon' => $id,
                    'soluong' => $soluong
                ]);
            }
    
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

    public function updateCart($id, $soluong = 1) {
        $sdt = 0 . Session::get('userClient')[0]['sdt'];

        if($soluong > 0) {
            $result = CartModel::where(['sdt' => $sdt, 'mamon' => $id])
                ->update(['soluong' => $soluong]);

            if($result) {
                return [
                    'status' => 'success',
                    'message' => 'Cập nhật giỏ hành thành công'
                ];
            }
        } else {
            $result = CartModel::where(['sdt' => $sdt, 'mamon' => $id])
                ->delete();

                // reload ....
            if($result) {
                return [
                    'status' => 'success',
                    'message' => 'Cập nhật giỏ hành thành công'
                ];
            }
        }        
    }
}
