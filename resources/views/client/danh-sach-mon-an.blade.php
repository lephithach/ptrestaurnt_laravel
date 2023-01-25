@extends('client.include.layout')
@section('root')
<h2 class="product-header font-bold text-center text-header">Danh sách món ăn</h2>

<div class="filter">
    <label for="sortby">Sắp xếp theo</label>
    <select name="sortby" id="sortby" class="c-input">
        <option value="">Mặc định</option>
        <option value="price-asc" @selected(request()->input('sortby') == 'price-asc')>Giá tăng dần</option>
        <option value="price-desc" @selected(request()->input('sortby') == 'price-desc')>Giá giảm dần</option>
        <option value="name-asc" @selected(request()->input('sortby') == 'name-asc')>A-Z</option>
        <option value="name-desc" @selected(request()->input('sortby') == 'name-desc')>Z-A</option>
    </select>

    <label for="loaimon">Loại món</label>
    <select name="loaimon" id="loaimon" class="c-input">
            <option value="">Tất cả</option>
        @foreach ($loaiMon as $loaiMon)
            <option value="{{ $loaiMon['maloai'] }}" @selected(request()->input('loaimon') == $loaiMon['maloai'])>{{ $loaiMon['tenloai'] }}</option>
        @endforeach
    </select>
</div>

<div class="product py-2">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
    @if (count($monAnList) > 0)
        @foreach ($monAnList as $monAn)
            @include('client.include.product', [$monAn])
        @endforeach
    @else
        <h3 class="text-center">Danh sách món ăn hiện chưa có</h3>
    @endif
    </div>
</div>

{{-- http://www.thelog.com.vn/Home/DineWineDetail?name=a%20la%20carte --}}

@vite(['resources/js/client/cart.js'])
@endsection