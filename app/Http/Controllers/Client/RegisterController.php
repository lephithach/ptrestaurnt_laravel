<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientRegisterModel;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.register.dang-nhap');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.register.dang-ky');
    }

    public function login(Request $request) {
        $request->validate([
            'sdt' => ['required', 'numeric', 'digits:10'],
            'password' => ['required'],
        ], [
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'sdt.digits' => 'Số điện thoại không đúng',
            'password.required' => 'Mật khẩu không được để trống',
        ]);
        
        $getUserLogin = ClientRegisterModel::where('sdt', '=', $request->sdt)
            ->where('password', '=', md5($request->password))
            ->get(['sdt', 'ho', 'ten', 'ngaysinh', 'gioitinh'])
            ->toArray();
        
        if(empty($getUserLogin)) {
            return redirect()->back()->withErrors([
                'Tài khoản hoặc mật khẩu không đúng'
            ])->withInput();
        } else {
            Session::put('userClient', $getUserLogin);

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Đăng nhập thành công',
            ]);
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
        $request->validate([
            'sdt' => ['required', 'numeric', 'digits:10', 'unique:clientuser,sdt'],
            'password' => ['required'],
            'rePassword' => ['required'],
            'ho' => ['required', 'max:20'],
            'ten' => ['required', 'max:20'],
            'gioitinh' => ['required', 'numeric', 'digits:1'],
            'ngaysinh' => ['required'],
        ], [
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'sdt.digits' => 'Số điện thoại không đúng',
            'sdt.unique' => 'Số điện thoại này đã đăng ký tài khoản',
            'password.required' => 'Mật khẩu không được để trống',
            'rePassword.required' => 'Nhập lại mật khẩu không được để trống',
            'ho.required' => 'Họ không được để trống',
            'ten.required' => 'Tên không được để trống',
            'gioitinh.required' => 'Giới tính không được để trống',
            'gioitinh.numeric' => 'Giới tính không hợp lệ',
            'gioitinh.digits' => 'Giới tính không hợp lệ',
            'ngaysinh.required' => 'Ngày sinh không được để trống',
        ]);

        // https://laravel.com/docs/9.x/validation
        // withErrors

        // check match password
        if($request->password != $request->rePassword) {
            return redirect()->back()->withErrors([
                'Mật khẩu không khớp, vui lòng kiểm tra lại'
            ])->withInput();
        } else {
            $dataForm = $request->except(['_token', 'rePassword', 'btn-submit']);
            // Encode password
            $dataForm['password'] = md5($request->password);
    
            if(ClientRegisterModel::insert($dataForm)) {
                return redirect()->back()->with([
                    'status' => 'success',
                    'message' => 'Đăng ký tài khoản thành công',
                ]);
            } else {
                return redirect()->back()->with([
                    'status' => 'danger',
                    'message' => 'Đăng ký tài khoản thất bại',
                ])->onlyInput('sdt');
            }
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
