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
        $monAnMoiList = MonAnModel::join('loaimon', 'loaimon.maloai', '=', 'monan.maloai')->offset(0)->limit(6)->get();
        $loaiMonNoiBatList = LoaiMonModel::with('anhLoaiMon')->offset(0)->limit(6)->get();
        return view('client.home', compact('monAnMoiList', 'loaiMonNoiBatList'));
    }

    public function GioiThieu() {
        $metaTitle = 'Giới thiệu về nhà hàng';
        return view('client.gioi-thieu', compact('metaTitle'));
    }

    public function DanhSachMonAn(Request $request) {
        $metaTitle = 'Danh sách món ăn';
        $monAnList = MonAnModel::join('loaimon', 'loaimon.maloai', '=', 'monan.maloai')
                    ->where('hienthi', '1');
        
        if($request->has('sortby')) {
            switch($request->input('sortby')) {
                case 'price-asc':
                    $monAnList = $monAnList->orderBy('dongia', 'asc');
                    break;
                case 'price-desc':
                    $monAnList = $monAnList->orderBy('dongia', 'desc');
                    break;
                case 'name-asc':
                    $monAnList = $monAnList->orderBy('tenmon', 'asc');
                    break;
                case 'name-desc':
                    $monAnList = $monAnList->orderBy('tenmon', 'desc');
                    break;
                default: break;
            }

        }
        if($request->has('loaimon') && $request->input('loaimon') != null) {
            $monAnList = $monAnList->where('monan.maloai', '=', $request->input('loaimon'));
        }
       
        $monAnList = $monAnList->get()->toArray();
        $loaiMon = LoaiMonModel::all()->toArray();

        return view('client.danh-sach-mon-an', compact('metaTitle', 'monAnList', 'loaiMon'));
    }

    public function ChiTietMonAn($id) {
        $metaTitle = 'Món ăn...';

        return view('client.chi-tiet-mon-an', compact('metaTitle'));
    }
}
