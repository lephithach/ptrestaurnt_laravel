<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiMonModel;

class MonAnController extends Controller
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
        $request->validate([
            'tenmon' => ['required', 'max:100'],
            'loaimon' => ['required'],
            'dongia' => ['required', 'regex:/^-?\d+$/', 'min:4'],
        ], [
            'tenmon.required' => 'Tên món ăn không được để trống',
            'tenmon.max' => 'Tên món ăn không được dài hơn :max',
            'loaimon.required' => 'Loại món ăn không được để trống',
            'dongia.required' => 'Đơn giá không được để trống',
            'dongia.regex' => 'Đơn giá phải là số',
            'dongia.min' => 'Đơn giá phải lớn hơn :min ký tự',
        ]);

        // $request = $request->except('_token');
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
