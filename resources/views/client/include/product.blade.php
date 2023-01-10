<div class="product-container" data-id="{{ $monAn['mamon'] }}">
    <div class="product-image cursor-pointer">
        <img src="{{ asset("storage/images/products/{$monAn['hinh']}") }}" alt="product">
    </div>
    
    <div class="product-content p-2">
        <div class="product-title">{{ $monAn['tenmon'] }}</div>
        <div class="flex justify-between w-full">
            <div class="star-vote text-yellow-400">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-half"></i>
            </div>
            <div class="product-price">{{ number_format($monAn['dongia'], 0, ",", ".") }}</div>
        </div>
    </div>
    {{-- @if (!session()->get('userClient'))
        <a href="{{ route('client.dangnhap') }}">ĐĂNG NHẬP</a>
    @else
        <a href="#" class="btn-addcart">THÊM VÀO GIỎ</a>
    @endif --}}
    {{-- <a href="#" class="btn-addcart">THÊM VÀO GIỎ</a> --}}
</div>