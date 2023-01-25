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
    <h2 class="product-header font-bold text-center text-header">Món ăn mới</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
        @foreach ($monAnMoiList as $monAnMoi)
            @include('client.include.product', [$monAn = $monAnMoi])
        @endforeach
    </div>
</section>

<section class="category py-2">
    <h2 class="category-header font-bold text-center text-header">Loại món ăn nổi bật</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6 mt-3">
        @foreach ($loaiMonNoiBatList as $loaiMonNoiBat)
        <div class="category-container">
            <div class="category-image">
                <img
                    src="{{
                        !empty($loaiMonNoiBat->anhLoaiMon['hinh'])
                            ? asset("storage/images/products/{$loaiMonNoiBat->anhLoaiMon['hinh']}")
                            : asset("storage/images/products/PT Restaurant.jpg")
                        }}"
                    alt="product"
                />
            </div>

            <div class="category-showmore">
                <div class="category-title">{{ $loaiMonNoiBat->tenloai }}</div>
                <a href="{{ route('client.danhsachmonan', ['loaimon' => $loaiMonNoiBat->maloai]) }}" class="btn-showmore">XEM NGAY</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection