@extends('client.include.layout')
@section('root')
<h2 class="text-xl font-bold text-center text-header">GIỎ HÀNG</h2>

<div class="relative overflow-x-auto">
    <table class="table-fixed w-full">
        <thead>
            <th class="w-[10%]">#</th>
            <th class="w-[25%]">Tên món</th>
            <th class="w-[5%]">Ảnh</th>
            <th class="w-[15%]">SL</th>
            <th class="w-[20%]">Đơn giá</th>
            <th class="w-[20%]">Thành tiền</th>
            {{-- <th class="w-[5%]">&nbsp;</th> --}}
        </thead>
        <tbody>
            @if (!empty($giohang))
            @foreach ($giohang as $key => $product)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td class="text-left">{{ $product->tenmon }}</td>
                <td>
                    <img class="mx-auto" src="{{ asset("/storage/images/products/{$product->hinh}") }}" alt="{{ $product->tenmon }}" width="30px" height="30px">
                </td>
                <td>{{ $product->soluong }}</td>
                <td>{{ number_format($product->dongia, 0, ",", ".") }}</td>
                <td>{{ number_format($product->soluong * $product->dongia, 0, ",", ".") }}</td>
                {{-- <td class="btn-function">
                    <a href="{{ route('monan.edit', [$product->mamon]) }}">
                        <i class="bi bi-pencil-fill icon-edit cursor-pointer text-blue-500" data-maloai="{{ $product->mamon }}"></i>
                    </a>
                    <a href="#">
                        <i class="bi bi-trash3-fill icon-delete cursor-pointer text-red-500" data-maloai="{{ $product->mamon }}"></i>
                    </a>
                </td> --}}
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Chưa có dữ liệu</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection