@extends('client.include.layout')
@section('root')
<h2 class="product-header font-bold text-center text-header">Danh sách món ăn</h2>
<div class="product py-2">
    <div class="grid xl:grid-cols-4 2xl:grid-cols-5 gap-6">
    @if (count($monAnList) > 0)
        @foreach ($monAnList as $monAn)
        <div class="product-container" data-id="{{ $monAn['mamon'] }}">
            <div class="product-image">
                <img src="{{ asset("storage/images/products/{$monAn['hinh']}") }}" alt="product">
            </div>
            <div class="product-title">{{ $monAn['tenmon'] }}</div>
            <div class="product-price">{{ number_format($monAn['dongia'], 0, ",", ".") }}</div>
            @if (!session()->get('userClient'))
                <a href="{{ route('client.dangnhap') }}">ĐĂNG NHẬP</a>
            @else
                <a href="#" class="btn-addcart">THÊM VÀO GIỎ</a>
            @endif
        </div>
        @endforeach
    @else
        <h3 class="text-center">Danh sách món ăn hiện chưa có</h3>
    @endif
    </div>
</div>

<input type="text" name="_token" id="_token" value="{{ csrf_token() }}" hidden>

@vite(['resources/js/client/cart.js'])
@endsection