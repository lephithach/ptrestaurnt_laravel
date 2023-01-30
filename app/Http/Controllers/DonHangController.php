<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\{
    MonAnModel,
    LoaiMonModel,
    HoaDonModel
};

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // dùng local storage :))
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
