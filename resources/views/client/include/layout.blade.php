<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Restaurant</title>
    @vite(['resources/css/app.css', 'resources/scss/index.css'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
</head>
<body>
    <div class="container mx-auto">
        <nav class="navbar px-4">
            <section class="logo-container">
                <p class="brand-name">PT Restaurant</p>
            </section>

            <section class="menu-container">
                <ul class="menu">
                    <li class="menu-item active"><a class="menu-link" href="./">Trang chủ</a></li>
                    <li class="menu-item"><a class="menu-link" href="#">Giới thiệu</a></li>
                    <li class="menu-item"><a class="menu-link" href="#">Danh sách món ăn</a></li>
                    <li class="menu-item"><a class="menu-link" href="#">Góp ý</a></li>
                </ul>
            </section>

            <section class="call-now">
                <a href="tel:+84929626424">Gọi ngay</a>
            </section>
        </nav>

        <section class="banner">
            <img class="img" src="{{ asset('storage/images/banner/image-nha-hang.jpg') }}" alt="banner">
        </section>

        <section class="about py-2 grid lg:grid-cols-2 gap-5 xl:mx-44">
            <div class="about-content">
                <p class="title">Sơ lược về nhà hàng</p>
                <p class="content">Nhà hàng PT Restaurant tự hào khi được trở thành một trong những điểm hẹn lý tưởng của những doanh nhân thành đạt, những bạn trẻ năng động hay những bữa cơm gia đình ấm cúng sau mỗi ngày làm việc căng thẳng. Không gian nơi đây được trang trí và thiết kế đầy ấn tượng nổi bật với tông màu ấm. Cảm giác ấy đến từ không gian nổi bật với lối thiết kế kiến trúc Đông Dương hài hòa với những món ăn biểu tượng của món ngon Việt Nam hiện đại và ẩm thực phương Tây.</p>
                <a class="btn-readmore" href="#">Đọc thêm</a>
            </div>

            <div class="about-picture">
                <img src="{{ asset('storage/images/banner/image-nha-hang-2-768px.jpg') }}" alt="picture">
            </div>            
        </section>

        <section class="product grid grid-cols-3 gap-6 py-2 xl:mx-44">
            <div class="product-container">
                <div class="product-image">
                    <img src="{{ asset('storage/images/products/cua_nuong_moi.jpg') }}" alt="product">
                </div>
                <div class="product-title">Cua Cà Mau</div>
                <div class="product-price">500.000</div>
            </div>
            <div class="product-container">
                <div class="product-image">
                    <img src="{{ asset('storage/images/products/cua_nuong_moi.jpg') }}" alt="product">
                </div>
                <div class="product-title">Cua Cà Mau</div>
                <div class="product-price">500.000</div>
            </div>
            <div class="product-container">
                <div class="product-image">
                    <img src="{{ asset('storage/images/products/cua_nuong_moi.jpg') }}" alt="product">
                </div>
                <div class="product-title">Cua Cà Mau</div>
                <div class="product-price">500.000</div>
            </div>
        </section>

        <section class="content">   
            @yield('root')
        </section>
    </div>
</body>
</html>