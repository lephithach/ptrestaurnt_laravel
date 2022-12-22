@extends('client.include.layout')
@section('root')
<h3 class="product-header font-bold text-xl text-center">DANH SÁCH MÓN ĂN</h3>
<div class="product py-2">
    <div class="grid xl:grid-cols-4 2xl:grid-cols-5 gap-6">
        @foreach ($monAnList as $monAn)
        <div class="product-container">
            <div class="product-image">
                <img src="{{ asset("storage/images/products/{$monAn->hinh}") }}" alt="product">
            </div>
            <div class="product-title">{{ $monAn->tenmon }}</div>
            <div class="product-price">{{ number_format($monAn->dongia, 0, ",", ".") }}</div>
            <a href="#" class="btn-addcart">THÊM VÀO GIỎ</a>
        </div>
        @endforeach
    </div>
</div>
@endsection