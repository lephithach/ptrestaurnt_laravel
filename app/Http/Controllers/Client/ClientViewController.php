<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    MonAnModel,
    LoaiMonModel,
};

class ClientViewController extends Controller
{
    public function TrangChu() {
        $monAnMoiList = MonAnModel::select('*')->offset(0)->limit(5)->get();
        $loaiMonNoiBatList = LoaiMonModel::select('*')->offset(0)->limit(5)->get();
        return view('client.home', compact('monAnMoiList', 'loaiMonNoiBatList'));
    }

    public function GioiThieu() {
        $metaTitle = 'Giới thiệu về nhà hàng';
        return view('client.gioi-thieu', compact('metaTitle'));
    }

    public function DanhSachMonAn() {
        $metaTitle = 'Danh sách món ăn';
        $monAnList = MonAnModel::join('loaimon', 'loaimon.maloai', '=', 'monan.maloai')
                    ->where('hienthi', '1')
                    ->get()
                    ->toArray();
        return view('client.danh-sach-mon-an', compact('metaTitle', 'monAnList'));
    }

    public function ChiTietMonAn($id) {
        $metaTitle = 'Món ăn...';

        return view('client.chi-tiet-mon-an', compact('metaTitle'));
    }
}
