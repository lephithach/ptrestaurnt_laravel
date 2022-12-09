@extends('admin.include.layout')
@section('root')
<div class="grid grid-cols-[30%_70%] gap-4">
    <section>
        <h3 class="text-xl font-bold mb-3">TẠO MÃ LOẠI</h3>

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <ul class="c-message-error">
                    @foreach ($errors->all() as $error)
                        <li class="font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
        @endif

        @if(session()->get('status'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif
    
        <div class="form">
            <form action="{{ route('monan.store') }}" method="post">
                @csrf
    
                <div class="form-group c-form-group-flex-col">
                    <label for="maloai">Mã loại</label>
                    <input type="text" name="maloai" id="maloai" placeholder="Mã món" class="c-input" autocomplete="off" value="{{ old('maloai') ?? null }}" />
                </div>
    
                <div class="form-group c-form-group-flex-col">
                    <label for="tenloai">Tên loại món</label>
                    <input type="text" name="tenloai" id="tenloai" placeholder="Tên món" class="c-input" autocomplete="off" value="{{ old('tenloai') ?? null }}" />
                </div>
    
                <div class="form-group c-form-group-flex-col">
                    <input class="bg-sky-700 text-white px-4 py-3 rounded cursor-pointer" type="submit" value="Thêm" />
                </div>
            </form>
        </div>
    </section>

    <section>
        <h3 class="text-xl font-bold mb-3">DANH SÁCH MÃ MÓN ĂN</h3>

        <div class="relative overflow-x-auto">
            <table class="table-fixed w-full">
                <thead>
                    <th>#</th>
                    <th>Mã Loại</th>
                    <th>Tên Loại</th>
                    <th>Tổng số món ăn</th>
                </thead>
    
                <tbody>
                    @if ($data != null)
                    @foreach (json_decode($data) as $key => $item)
                    <tr class="text-center">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->maloai }}</td>
                        <td>{{ $item->tenloai }}</td>
                        <td>&nbsp;</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">Chưa có dữ liệu</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>
@endsection