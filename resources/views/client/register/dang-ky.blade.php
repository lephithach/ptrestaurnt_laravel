<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Restaurant | Đăng ký</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css'])
</head>
<body>
    <div class="container-register flex justify-center">
        <section class="register">
            <p class="brand-name">PT Restaurant</p>
            <hr class="mt-4">
            <h3 class="text-center text-2xl font-bold mt-4">ĐĂNG KÝ</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->get('status'))
                <div class="alert alert-{{ session()->get('status') }}">
                    <p>{{ session()->get('message') }}</p>
                </div>
            @endif
            <form action="{{ route('client.dangky.store') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 gap-0 lg:grid-cols-2 lg:gap-2">
                    <section class="left">
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input class="c-input" type="text" name="sdt" id="sdt" placeholder="Số điện thoại" autocomplete="off" value="{{ old('sdt') }}" />
                        </div>
        
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input class="c-input" type="password" name="password" id="password" placeholder="Mật khẩu" value="{{ old('password') }}" />
                        </div>

                        <div class="form-group">
                            <label for="rePassword">Nhập lại mật khẩu</label>
                            <input class="c-input" type="password" name="rePassword" id="rePassword" placeholder="Nhập lại mật khẩu" value="{{ old('rePassword') }}" />
                        </div>
                    </section>
                    
                    <section class="right">
                        <div class="form-group">
                            <label for="ho">Họ</label>
                            <input class="c-input" type="text" name="ho" id="ho" placeholder="Nguyễn Văn" value="{{ old('ho') }}" />
                        </div>

                        <div class="form-group">
                            <label for="ten">Tên</label>
                            <input class="c-input" type="text" name="ten" id="ten" placeholder="A" value="{{ old('ten') }}" />
                        </div>
                        
                        <div class="form-group">
                            <label for="gioitinh">Giới tính</label>
                            <select class="c-input" name="gioitinh" id="gioitinh">
                                <option value="">--Chọn giới tính--</option>
                                <option value="0" @selected(old('gioitinh') == "0")>Nam</option>
                                <option value="1" @selected(old('gioitinh') == "1")>Nữ</option>
                                <option value="2" @selected(old('gioitinh') == "2")>Khác</option>
                            </select>
                        </div>
        
                        <div class="form-group">
                            <label for="ngaysinh">Ngày sinh</label>
                            <input class="c-input" type="date" name="ngaysinh" id="ngaysinh" value="{{ old('ngaysinh') }}" />
                        </div>   
                    </section>
                </div>

                <div class="form-group">
                    <input class="btn-primary" type="submit" name="btn-submit" id="btn-submit" value="Đăng ký" />
                </div>

                <div class="form-group">
                    <p><a href="{{ route('client.dangnhap') }}">Bạn đã có tài khoản?</a></p>
                </div>
            </form>
        </section>
    </div>
</body>
</html>