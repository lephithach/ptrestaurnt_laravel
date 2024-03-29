<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    MonAnModel,
    LoaiMonModel
};
use DB;

class MonAnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = MonAnModel::join('loaimon', 'monan.maloai', '=', 'loaimon.maloai')->paginate(10);

        return view('admin.monan.danh-sach-mon-an', compact('productList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maLoaiList = LoaiMonModel::All();
        return view('admin.monan.tao-mon-an', compact('maLoaiList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'tenmon' => ['required', 'max:100'],
            'maloai' => ['required'],
            'dongia' => ['required', 'regex:/^-?\d+$/', 'min:4'],
            'hinh' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
        ], [
            'tenmon.required' => 'Tên món ăn không được để trống',
            'tenmon.max' => 'Tên món ăn không được dài hơn :max',
            'maloai.required' => 'Loại món ăn không được để trống',
            'dongia.required' => 'Đơn giá không được để trống',
            'dongia.regex' => 'Đơn giá phải là số',
            'dongia.min' => 'Đơn giá phải lớn hơn :min ký tự',
            'hinh.required' => 'Hình ảnh không được để trống',
            'hinh.image' => 'Hình ảnh không đúng định dạng',
            'hinh.mimes' => 'Hình ảnh chỉ chấp nhận đuôi jpeg,png,jpg',
            'hinh.max' => 'Hình ảnh không được quá :max KB, vui lòng thử lại',
        ]);
        
        // Upload Images
        $pathInit = 'public/images/products';
        $image = $request->file('hinh');
        $imageName = $image->getClientOriginalName();
        // Check exist
        // if(file_exists("./storage/images/products/{$imageName}")) {
        //     // delete file exist
        //     unlink("./storage/images/products/{$imageName}");
        // }
        $request->file('hinh')->storeAs($pathInit, $imageName);
        
        // Filter data input request
        $dataInput = $request->except('_token');
        $dataInput['hinh'] = $imageName;

        // Store database
        $result = MonAnModel::insert($dataInput);

        if($result) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Thêm món ăn thành công'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Thêm món ăn thất bại'
            ]);
        }
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

    public function getName(Request $request) {
        if(!$request->tenmon) return [];

        return MonAnModel::where('tenmon', 'like', "%{$request->tenmon}%")
            ->get(['tenmon', 'maloai'])->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maLoaiList = LoaiMonModel::all();
        $monAn = MonAnModel::find($id);

        return view('admin.monan.cap-nhat-mon-an', compact('maLoaiList', 'monAn'));
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
        // Validation
        $request->validate([
            'tenmon' => ['required', 'max:100'],
            'maloai' => ['required'],
            'dongia' => ['required', 'regex:/^-?\d+$/', 'min:4'],
        ], [
            'tenmon.required' => 'Tên món ăn không được để trống',
            'tenmon.max' => 'Tên món ăn không được dài hơn :max',
            'maloai.required' => 'Loại món ăn không được để trống',
            'dongia.required' => 'Đơn giá không được để trống',
            'dongia.regex' => 'Đơn giá phải là số',
            'dongia.min' => 'Đơn giá phải lớn hơn :min ký tự',
        ]);

        if($request->hasFile('hinh')) {
            $request->validate([
                'hinh' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'],
            ], [
                'hinh.required' => 'Hình ảnh không được để trống',
                'hinh.image' => 'Hình ảnh không đúng định dạng',
                'hinh.mimes' => 'Hình ảnh chỉ chấp nhận đuôi jpeg,png,jpg',
                'hinh.max' => 'Hình ảnh không được quá :max KB, vui lòng thử lại',
            ]);
            // Upload Images
            $pathInit = 'public/images/products';
            $image = $request->file('hinh');
            $imageName = $image->getClientOriginalName();
            // Check exist
            // if(file_exists("./storage/images/products/{$imageName}")) {
            //     // delete file exist
            //     unlink("./storage/images/products/{$imageName}");
            // }
            $request->file('hinh')->storeAs($pathInit, $imageName);
        }
        
        // Filter data input request
        $dataInput = $request->except('_token');
        if($request->hasFile('hinh')) {
            $dataInput['hinh'] = $imageName;
        }

        $result = MonAnModel::where('mamon', $id)->update($dataInput);

        if($result) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Cập nhật thành công'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Cập nhật thất bại, vui lòng kiểm tra lại'
            ]);
        }
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
