@extends('client.include.layout')
@section('root')
<h2 class="text-xl font-bold text-center text-header">GIỎ HÀNG</h2>

<div class="relative overflow-x-auto">
    <table class="table-fixed w-full" id="cart">
        <thead>
            <th class="w-[10%]">#</th>
            <th class="w-[25%]">Tên món</th>
            <th class="w-[5%]">Ảnh</th>
            <th class="w-[15%]">SL</th>
            <th class="w-[20%]">Đơn giá</th>
            <th class="w-[20%]">Thành tiền</th>
            <th class="w-[5%]">&nbsp;</th>
        </thead>
        <tbody>
            @if (count($giohang) > 0)
            @foreach ($giohang as $key => $product)
            <tr class="text-center" data-idrow="{{ $product['mamon'] }}">
                <td>{{ $key+1 }}</td>
                <td class="text-left">{{ $product['tenmon'] }}</td>
                <td>
                    <img class="mx-auto" src="{{ asset("/storage/images/products/{$product['hinh']}") }}" alt="{{ $product['tenmon'] }}" width="30px" height="30px">
                </td>
                <td>
                    <input
                        type="number"
                        data-id="{{ $product['mamon'] }}"
                        value="{{ $product['soluong'] }}"
                        name="soluong"
                        class="soluong"
                        id="soluong"
                    />
                </td>
                <td class="dongia" data-dongia="{{ $product['dongia'] }}">{{ number_format($product['dongia'], 0, ",", ".") }}</td>
                <td class="thanhtien">{{ number_format($product['soluong'] * $product['dongia'], 0, ",", ".") }}</td>
                <td class="btn-function">
                    <a href="#">
                        <i class="bi bi-trash3-fill icon-delete cursor-pointer text-red-500" data-maloai="{{ $product['mamon'] }}"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Giỏ hàng trống, vui lòng chọn món ăn <a href="{{ route('client.danhsachmonan') }}">TẠI ĐÂY</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@vite(['resources/js/client/cart.js'])
@endsection