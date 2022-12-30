<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientRegisterModel;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.register.dang-ky');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'sdt' => ['required', 'numeric', 'digits:10'],
            'password' => ['required'],
            'ho' => ['required', 'max:20'],
            'ten' => ['required', 'max:20'],
            'gioitinh' => ['required', 'numeric', 'digits:1'],
            'ngaysinh' => ['required'],
        ], [
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'sdt.digits' => 'Số điện thoại không đúng',
            'password.required' => 'Mật khẩu không được để trống',
            'ho.required' => 'Họ không được để trống',
            'ten.required' => 'Tên không được để trống',
            'gioitinh.required' => 'Giới tính không được để trống',
            'gioitinh.numeric' => 'Giới tính không hợp lệ',
            'gioitinh.digits' => 'Giới tính không hợp lệ',
            'ngaysinh.required' => 'Ngày sinh không được để trống',
        ]);
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
