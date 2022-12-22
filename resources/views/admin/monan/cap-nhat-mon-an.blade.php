@extends('admin.include.layout')
@section('root')

<div class="container-toast">
    @if(session()->get('status'))
    @include('admin.include.toast', ['status' => session()->get('status'), 'message' => session()->get('message')])
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            @include('admin.include.toast', ['status' => 'danger','message' => $error])
        @endforeach
    @endif
</div>

{{-- End toast --}}
<div class="grid grid-cols-[30%_70%] gap-4">
    <section>
        <h3 class="text-xl font-bold mb-3">CẬP NHẬT MÓN ĂN</h3>

        <div class="form">
            <form action="{{ route('monan.update', [$monAn->mamon]) }}" method="post" enctype="multipart/form-data">
                @csrf
    
                <div class="form-group c-form-group-flex-col">
                    <label for="tenmon">Tên món ăn</label>
                    <input type="text" name="tenmon" id="tenmon" placeholder="Tên món ăn" class="c-input @error('tenmon') is-invalid @enderror" autocomplete="off" value="{{ old('tenmon') ?? $monAn->tenmon }}" />
                </div>

                <div class="form-group c-form-group-flex-col">
                    <label for="maloai">Loại món ăn</label>
                    <select name="maloai" id="maloai" class="c-input @error('maloai') is-invalid @enderror">
                        <option value="">--Chọn loại món ăn--</option>
                        @foreach ($maLoaiList as $value)
                            <option value="{{ $value->maloai }}" @selected(old('maloai') || $monAn->maloai == $value->maloai)>{{ $value->tenloai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group c-form-group-flex-col">
                    <label for="dongia">Đơn giá</label>
                    <input type="text" name="dongia" id="dongia" placeholder="Đơn giá" class="c-input @error('dongia') is-invalid @enderror" autocomplete="off" value="{{ old('dongia') ?? $monAn->dongia }}" />
                </div>

                <div class="form-group c-form-group-flex-col">
                    <label for="hienthi">Tuỳ chọn</label>
                    <select name="hienthi" id="hienthi" class="c-input @error('hienthi') is-invalid @enderror">
                            <option value="1" @selected($monAn->hienthi == 1)>Hiển thị</option>
                            <option value="0" @selected($monAn->hienthi == 0)>Ẩn</option>
                    </select>
                </div>

                <div class="form-group c-form-group-flex-col">
                    <label for="hinh">Hình ảnh món</label>
                    <input type="file" name="hinh" id="hinh" accept="image/png, image/jpeg, image/jpg" class="c-input @error('hinh') is-invalid @enderror" autocomplete="off" value="{{ old('hinh') ?? null }}" />
                </div>
    
                <div class="form-group c-form-group-flex-col">
                    <input class="bg-sky-700 text-white px-4 py-3 rounded cursor-pointer" type="submit" value="Cập nhật" />
                </div>
            </form>
        </div>
    </section>
    
    <section>
        <h3 class="text-xl font-bold mb-3">XEM TRƯỚC KẾT QUẢ</h3>

        <div class="preview-product">
            <p class="product-name">{{ $monAn->tenmon }}</p>
            <img src="{{ asset("storage/images/products/{$monAn->hinh}") }}" alt="hinh-anh" class="product-image" id="product-image" />
            <p class="product-price">{{ number_format($monAn->dongia, 0, ",", ".") }}</p>
        </div>
    </section>
</div>
@endsection