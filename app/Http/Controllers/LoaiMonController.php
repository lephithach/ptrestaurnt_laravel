<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiMonModel;

class LoaiMonController extends Controller
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
        $data = LoaiMonModel::select('*')->paginate(10);
        return view('admin.monan.tao-ma-mon', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'maloai' => ['required', 'regex:/^[a-zA-Z_-]{3,10}$/', 'min:3', 'max:10'],
            'tenloai' => ['required', 'min:3']
        ], [
            'maloai.required' => 'Mã loại không được để trống',
            'maloai.regex' => 'Mã loại phải là chuỗi và phải viết liền',
            'maloai.min' => 'Mã loại phải lớn hơn :min ký tự',
            'maloai.max' => 'Mã loại không quá :max ký tự',
            'tenloai.required' => 'Tên loại không được để trống',
            'tenloai.min' => 'Tên loại phải lớn hơn :min ký tự',
        ]);
        
        $dataInput = $request->except('_token');
        $dataInput['maloai'] = strtoupper($request['maloai']);
        $dataInput['tenloai'] = ucwords($request['tenloai']);

        $result = LoaiMonModel::insert($dataInput);

        if($result) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Thêm thành công'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Thêm thất bại'
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Trả JSON về view để update bằng Javascript
        $get = LoaiMonModel::where('maloai', $id)->get()->toJson();
        return $get;
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
        $request->validate([
            'maloai' => ['required', 'regex:/^[a-zA-Z_-]{3,10}$/', 'min:3', 'max:10'],
            'tenloai' => ['required', 'min:3']
        ], [
            'maloai.required' => 'Mã loại không được để trống',
            'maloai.regex' => 'Mã loại phải là chuỗi',
            'maloai.min' => 'Mã loại phải lớn hơn :min ký tự',
            'maloai.max' => 'Mã loại không quá :max ký tự',
            'tenloai.required' => 'Tên loại không được để trống',
            'tenloai.min' => 'Tên loại phải lớn hơn :min ký tự',
        ]);
        
        $dataInput = $request->except('_token');
        $dataInput['maloai'] = strtoupper($request['maloai']);
        $dataInput['tenloai'] = ucwords($request['tenloai']);

        $result = LoaiMonModel::where('maloai', $id)->update($dataInput);
        
        if($result) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Cập nhật thành công'
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
        $request = new Request();

        $result = LoaiMonModel::where('maloai', $id)->delete();

        if($result) {
            return json_encode([
                'status' => 'success',
                'message' => 'Xoá thành công'
            ]);
        }
    }
}
