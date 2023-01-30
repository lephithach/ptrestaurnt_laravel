@extends('admin.include.layout')
@section('root')
<div class="grid grid-cols-[70%_30%] gap-2 donhang">
    <div class="col-left">
        <section class="filter">
            <input type="text" class="c-input" name="search" id="search" placeholder="Tìm kiếm món ăn" autocomplete="off" />

            <div class="tab-filter mt-2">
                <div class="tab-item active" tabindex="0" data-maloai="all">
                    <p>Tất cả</p>
                </div>

                @foreach ($loaiMon as $key => $item)
                    <div class="tab-item" tabindex="{{ $key+1 }}" data-maloai="{{ $item->maloai }}">
                        <p>{{ $item->tenloai }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    
        <hr class="mt-0">
    
        <section class="monan">
            @foreach ($monAn as $item)
                <div class="items" data-mamon="{{ $item->mamon }}" data-maloai="{{ $item->maloai }}">
                    <img src="{{ asset("storage/images/products/{$item->hinh}") }}" alt="{{ $item->tenmon }}" />
                    <p>{{ $item->tenmon }}</p>
                </div>
            @endforeach
        </section>
    </div>

    <div class="col-right">
        <section class="ban-container flex flex-row gap-5">
            <div class="form-group">
                <label for="ban">Bàn số</label>
                <select name="ban" id="ban" class="c-input">
                    <option value="#">01</option>
                    <option value="#">02</option>
                    <option value="#">03</option>
                </select>
            </div>
    
            <div class="form-group">
                <label for="loaiban">Loại bàn</label>
                <input type="text" class="c-input max-w-[170px]" value="Standard" disabled readonly />
            </div>
        </section>

        <hr class="mt-2">

        <section class="bill my-2">
            <table>
                <thead>
                    <tr>
                        <th class="w-[50%]">Tên món</th>
                        <th class="w-[10%]">SL</th>
                        <th class="w-[30%]">Thành tiền</th>
                        <th class="w-[5%]">&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @for ($i = 0; $i < 12; $i++)
                        <tr>
                            <td class="text-left">Royal Salute 21YO Signature Blend Red New Year (700ml)</td>
                            <td class="text-center"><input class="w-full" type="number" value="1" /></td>
                            <td class="text-right">3.500.000</td>
                            <td class="text-center"><i class="bi bi-x-square-fill icon-delete cursor-pointer text-red-500"></i></td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </section>

        <section class="total my-2 flex flex-col gap-2">
            <div class="form-group flex justify-between items-center">
                <label for="tongtien">Tổng tiền</label>
                <input type="text" class="c-input text-right" name="tongtien" id="tongtien" value="3.500.000" disabled readonly />
            </div>

            <div class="form-group flex justify-between items-center">
                <label for="phuthu">Phụ thu</label>
                <input type="text" class="c-input text-right" name="phuthu" id="phuthu" value="3.500.000" />
            </div>

            <div class="form-group flex justify-between items-center">
                <label for="khachdua">Khách đưa</label>
                <input type="text" class="c-input text-right" name="khachdua" id="khachdua" value="3.500.000" />
            </div>

            <div class="form-group flex justify-between items-center">
                <label for="trakhach">Trả khách</label>
                <input type="text" class="c-input text-right" name="trakhach" id="trakhach" value="3.500.000" disabled readonly />
            </div>
        </section>

        <section class="btn-function">
            <button class="btn-primary">Lưu (F1)</button>
            <button class="btn-success">Thanh toán (F2)</button>
            <button class="btn-danger">Huỷ (F3)</button>
        </section>
    </div>
</div>

@vite(['resources/js/handle-tao-don-hang.js'])
@endsection