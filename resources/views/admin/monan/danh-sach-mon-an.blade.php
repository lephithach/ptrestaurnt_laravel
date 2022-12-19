@extends('admin.include.layout')
@section('root')
<section>
    <h3 class="text-xl font-bold mb-3">DANH SÁCH MÓN ĂN</h3>

    <div class="relative overflow-x-auto">
        <table class="table-fixed w-full">
            <thead>
                <th class="w-[10%]">#</th>
                <th class="w-[25%]">Tên món</th>
                <th class="w-[15%]">Loại món</th>
                <th class="w-[5%]">Ảnh</th>
                <th class="w-[20%]">Đơn giá</th>
                <th class="w-[25%]">&nbsp;</th>
            </thead>
            <tbody>
                @if (!empty($productList))
                @foreach ($productList as $key => $product)
                <tr class="text-center">
                    <td>{{ $key+1 }}</td>
                    <td class="text-left">{{ $product->tenmon }}</td>
                    <td>{{ $product->maloai }}</td>
                    <td>
                        <img src="{{ asset("/storage/images/products/{$product->hinh}") }}" alt="{{ $product->tenmon }}" width="30px" height="30px">
                    </td>
                    <td>{{ number_format($product->dongia) }}</td>
                    <td class="btn-function">
                        <i class="bi bi-pencil-fill icon-edit cursor-pointer text-blue-500" data-maloai="{{ $product->mamon }}"></i>
                        <i class="bi bi-trash3-fill icon-delete cursor-pointer text-red-500" data-maloai="{{ $product->mamon }}"></i>
                    </td>
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

    <div class="paginate mt-4">
        @if (count($productList) > 0)
            {{ $productList->links('admin.include.pagination.custom') }}
        @endif
    </div>
</section>
@endsection