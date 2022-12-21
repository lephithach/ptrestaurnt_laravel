@extends('client.include.layout')
@section('root')
{{-- grid lg:grid-cols-2 gap-5 --}}
<section class="about py-2 grid lg:grid-cols-2 gap-10">
    <div class="my-3 xl:my-0 about-content">
        <p class="text-center xl:text-left title">Sơ lược về nhà hàng</p>
        <p class="content">Nhà hàng PT Restaurant tự hào khi được trở thành một trong những điểm hẹn lý tưởng của những doanh nhân thành đạt, những bạn trẻ năng động hay những bữa cơm gia đình ấm cúng sau mỗi ngày làm việc căng thẳng. Không gian nơi đây được trang trí và thiết kế đầy ấn tượng nổi bật với tông màu ấm. Cảm giác ấy đến từ không gian nổi bật với lối thiết kế kiến trúc Đông Dương hài hòa với những món ăn biểu tượng của món ngon Việt Nam hiện đại và ẩm thực phương Tây.</p>
        <a class="mx-auto xl:mx-0 btn-readmore" href="{{ route('client.gioithieu') }}">Đọc thêm</a>
    </div>

    <div class="about-picture">
        <img src="{{ asset('storage/images/banner/theatrer-bar.jpeg') }}" alt="picture">
    </div>            
</section>

<section class="product py-2">
    {{-- <div class="product-header">
        <div class="line">
            <span class="spacer"></span>
            <h3>SẢN PHẨM MỚI</h3>
            <span class="spacer"></span>
        </div>
    </div> --}}
    <h3 class="product-header font-bold text-xl text-center">SẢN PHẨM MỚI</h3>
    <div class="grid xl:grid-cols-4 gap-6">
        @for ($i = 0; $i < 4; $i++)
        <div class="product-container">
            <div class="product-image">
                <img src="{{ asset('storage/images/products/cua_nuong_moi.jpg') }}" alt="product">
            </div>
            <div class="product-title">Cua Cà Mau</div>
            <div class="product-price">500.000</div>
            <a href="#" class="btn-addcart">THÊM VÀO GIỎ</a>
        </div>
        @endfor
    </div>
</section>

<section class="category py-2">
    <h3 class="category-header font-bold text-xl text-center my-2">LOẠI MÓN ĂN NỔI BẬT</h3>
    <div class="grid xl:grid-cols-4 gap-6">
        @for ($i = 0; $i < 4; $i++)
        <div class="category-container">
            <div class="category-image">
                <img src="{{ asset('storage/images/products/cua_nuong_moi.jpg') }}" alt="product">
            </div>

            <div class="category-showmore">
                <div class="category-title">Cua Cà Mau</div>
                <a href="#" class="btn-addcart">XEM NGAY</a>
            </div>
        </div>
        @endfor
    </div>
</section>
@endsection