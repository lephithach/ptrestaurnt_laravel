<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Restaurant | Đăng nhập</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css'])
</head>
<body>
    <div class="container-register flex justify-center">
        <section class="register">
            <p class="brand-name">PT Restaurant</p>
            <hr class="mt-4">
            <h3 class="text-center text-2xl font-bold mt-4">ĐĂNG NHẬP</h3>
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
            <form action="{{ route('client.dangnhap.login') }}" method="post">
                @csrf
                <div class="grid grid-cols-1 gap-0 lg:grid-cols-1 lg:gap-2">
                    <div class="form-group">
                        <label for="sdt">Số điện thoại</label>
                        <input class="c-input" type="text" name="sdt" id="sdt" placeholder="Số điện thoại" autocomplete="off" value="{{ old('sdt') }}" />
                    </div>
    
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input class="c-input" type="password" name="password" id="password" placeholder="Mật khẩu" value="{{ old('password') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <input class="btn-primary" type="submit" name="btn-submit" id="btn-submit" value="Đăng nhập" />
                </div>

                <div class="form-group">
                    <p><a href="{{ route('client.dangky') }}">Bạn chưa có tài khoản?</a></p>
                    <p><a href="">Bạn quên mật khẩu?</a></p>
                </div>
            </form>
        </section>
    </div>
</body>
</html>