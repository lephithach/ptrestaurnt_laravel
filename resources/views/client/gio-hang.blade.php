@extends('client.include.layout')
@section('root')
<h2 class="text-xl font-bold text-center text-header">GIỎ HÀNG</h2>

<div class="relative overflow-x-auto">
    <table class="table-fixed w-full" id="cart">
        <thead>
            <th class="w-8 md:w-[5%]">#</th>
            <th class="w-40 md:w-[30%]">Tên món</th>
            <th class="w-8 md:w-[5%]">Ảnh</th>
            <th class="w-8 md:w-[5%]">SL</th>
            <th class="w-24 md:w-[15%]">Đơn giá</th>
            <th class="w-24 md:w-[15%]">Thành tiền</th>
            <th class="w-8 md:w-[5%]">Xoá</th>
        </thead>
        <tbody>
            @if (count($giohang) > 0)
                @php
                    $total = ['soluong' => 0, 'thanhtien' => 0];
                @endphp

            {{-- Foreach --}}
            @foreach ($giohang as $key => $product)
                @php
                    $total['thanhtien'] += $product['soluong'] * $product['dongia'];
                    $total['soluong'] += $product['soluong'];
                @endphp

            <tr class="text-center" data-idrow="{{ $product['mamon'] }}">
                <td>{{ $key+1 }}</td>
                <td class="text-left">{{ $product['tenmon'] }}</td>
                <td>
                    <img class="mx-auto" src="{{ asset("/storage/images/products/{$product['hinh']}") }}" alt="{{ $product['tenmon'] }}" width="30px" height="30px">
                </td>
                <td>
                    {{-- <span class="btn-tru"><i class="bi bi-dash"></i></span> --}}
                    <input
                        type="number"
                        data-id="{{ $product['mamon'] }}"
                        value="{{ $product['soluong'] }}"
                        name="soluong"
                        class="soluong"
                        id="soluong"
                    />
                    {{-- <span class="btn-cong"><i class="bi bi-plus"></i></span> --}}
                </td>
                <td class="dongia" data-dongia="{{ $product['dongia'] }}">
                    {{ number_format($product['dongia'], 0, ",", ".") }}
                </td>
                <td class="thanhtien" data-thanhtien="{{ $product['soluong'] * $product['dongia'] }}">
                    {{ number_format($product['soluong'] * $product['dongia'], 0, ",", ".") }}
                </td>
                <td class="btn-function">
                    <span class="btn-delete" data-maloai="{{ $product['mamon'] }}" title="Xoá món {{ $product['tenmon'] }}">
                        <i class="bi bi-x-square-fill icon-delete cursor-pointer text-red-500"></i>
                    </span>
                </td>
            </tr>
            @endforeach

            <tr>
                {{-- line --}}
                <td colspan="7"><hr></td>
            </tr>
            <tr class="text-center font-bold text-green-700">
                <td colspan="2">Tổng</td>
                {{-- <td>&nbsp;</td> --}}
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;</td>
                <td class="tongtien">{{ number_format($total['thanhtien'], 0, ",", ".") }}</td>
            </tr>

            @else
            <tr>
                <td colspan="6" class="text-center">Giỏ hàng trống, vui lòng chọn món ăn <a href="{{ route('client.danhsachmonan') }}">TẠI ĐÂY</a></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="text-right">
    <label for="ban">Chọn bàn</label>
    <select name="ban" id="ban" class="c-input">
        <option value="#" data-pricetable="150000">Standard</option>
        <option value="#" data-pricetable="300000">Classic</option>
        <option value="#" data-pricetable="500000">Premium</option>
        <option value="#" data-pricetable="200000">Couple</option>
    </select>
    <button class="btn-secondary btn-sm">ĐẶT BÀN</button>
</div>

@vite(['resources/js/client/cart.js'])

<script>
    // setTimeout(() => {
    //     location.reload();
    // }, 60000);
</script>
@endsection