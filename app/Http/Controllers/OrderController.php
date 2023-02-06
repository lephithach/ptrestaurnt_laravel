<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\{
    MonAnModel,
    LoaiMonModel,
    HoaDonModel,
    OrderTempModel,
};

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $soban = $request->input('soBan');

        return OrderTempModel::join("monan", "monan.mamon", "=", "ordertemp.mamon")
            ->where(['soban' => $soban])
            ->get(['monan.mamon', 'tenmon', 'soluong', 'dongia']);
            // ->toArray();
        // return OrderTempModel::with('tenmon')
        //     ->where(['soban' => $soban])
        //     ->get();
            // ->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiMon = LoaiMonModel::all();
        $monAn = MonAnModel::select('*')->get();

        return view('admin.donhang.tao-don-hang', compact('monAn', 'loaiMon'));
    }

    public function search(Request $request) {
        $maloai = trim($request->maloai);
        $searchInput = $request->searchInput;

        $query = MonAnModel::select('*')
            ->where('tenmon', 'LIKE', '%' . $searchInput . '%');

        if($maloai != 'all') {
           $query->where('maloai', $maloai);
        }

        // get database
        $data = $query->get();

        // fix link image
        foreach($data as $key => $newData) {
            $newData['hinh'] =  "http://{$request->getHttpHost()}/storage/images/products/{$data[$key]['hinh']}";
        }

        return $data;
    }

    public function order(Request $request) {
        $soban = $request->soBan;
        $mamon = $request->maMon;
        $dongia = $request->donGia;
        $soluong = $request->soLuong ?? 1;

        switch ($request->action) {
            case "add":
                // check mamon có tồn tại hay không
                $checkExits = OrderTempModel::select('soluong')
                    ->where(['mamon' => $mamon, 'soban' => $soban])
                    ->get()
                    ->toArray();
                    
                if(count($checkExits) == 0) {
                    $result = OrderTempModel::insert([
                        'soban' => $soban,
                        'mamon' => $mamon,
                        'dongia_cthd' => $dongia,
                        'soluong' => $soluong,
                    ]);

                    if($result) {
                        return [
                            'status' => 'success',
                            'message' => 'Thêm thành công',
                        ];
                    }
                } else {
                    // Lấy số lượng trước đó
                    $soluong = $checkExits[0]['soluong'] + 1;

                    $result = OrderTempModel::where(['mamon' => $mamon, 'soban' => $soban])
                        ->update(['soluong' => $soluong]);

                    if($result) {
                        return [
                            'status' => 'success',
                            'message' => 'Cập nhật thành công',
                        ];
                    }
                }

                break;

            default: break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = OrderTempModel::select('soban', 'mamon', DB::raw('sum(dongia_cthd) as dongia'), DB::raw('sum(soluong) as soluong'))
            ->groupBy(['soban', 'mamon'])
            ->get()
            ->toArray();

        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $mamon = $request->input('maMon');
        $soban = $request->input('soBan');
        $soluong = $request->input('soLuong');

        $result = OrderTempModel::where(['soban' => $soban, 'mamon' => $mamon])
            ->update(['soluong' => $soluong]);

        if($result) {
            return [
                'status' => 'success',
                'message' => 'Cập nhật thành công',
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mamon = $request->input('maMon');
        $soban = $request->input('soBan');

        $result = OrderTempModel::where(['soBan' => $soban, 'mamon' => $mamon])
            ->delete();

        if($result) {
            return [
                'status' => 'success',
                'message' => 'Xoá món ăn thành công',
            ];
        }
    }
}
