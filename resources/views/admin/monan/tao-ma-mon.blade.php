@extends('admin.include.layout')
@section('root')

{{-- Modal --}}
@include('admin.include.modal.modal-start')
<div>
    <h3 class="text-2xl font-bold text-center my-2">SỬA MÃ LOẠI</h3>

    <div class="form">
        <form id="form-update-maloai" action="/" method="post">
            @csrf

            <div class="form-group c-form-group-flex-col">
                <label for="maloai">Mã loại</label>
                <input type="text" name="maloai" id="maloai" placeholder="Mã loại" class="c-input" autocomplete="off" value="{{ old('maloai') ?? null }}" />
                <span class="text-sm italic text-red-500 erorr"></span>
            </div>

            <div class="form-group c-form-group-flex-col">
                <label for="tenloai">Tên loại</label>
                <input type="text" name="tenloai" id="tenloai" placeholder="Tên loại" class="c-input" autocomplete="off" value="{{ old('tenloai') ?? null }}" />
                <span class="text-sm italic text-red-500 erorr"></span>
            </div>

            <div class="form-group c-form-group-flex-col">
                <input type="button" id="btn-delete" name="btn-delete" value="Xoá" class="btn-danger" />
                <input class="btn-primary" type="submit" value="Cập nhật" />
            </div>
        </form>
    </div>
</div>

@include('admin.include.modal.modal-end')
        
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
        <h3 class="text-xl font-bold mb-3">TẠO MÃ LOẠI</h3>

        {{-- @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <ul class="c-message-error">
                    @foreach ($errors->all() as $error)
                        <li class="font-medium">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>            
        @endif --}}
    
        <div class="form">
            <form action="{{ route('loaimon.store') }}" method="post">
                @csrf
    
                <div class="form-group c-form-group-flex-col">
                    <label for="maloai">Mã loại</label>
                    <input type="text" name="maloai" id="maloai" placeholder="Mã loại" class="c-input @error('maloai') is-invalid @enderror" autocomplete="off" value="{{ old('maloai') ?? null }}" />
                </div>
    
                <div class="form-group c-form-group-flex-col">
                    <label for="tenloai">Tên loại</label>
                    <input type="text" name="tenloai" id="tenloai" placeholder="Tên loại" class="c-input @error('tenloai') is-invalid @enderror" autocomplete="off" value="{{ old('tenloai') ?? null }}" />
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
                    <th>Số món</th>
                    <th>&nbsp;</th>
                </thead>
    
                <tbody>
                    @if (!empty(json_decode($data)))
                    @foreach (json_decode($data) as $key => $item)
                    <tr class="text-center">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->maloai }}</td>
                        <td>{{ $item->tenloai }}</td>
                        <td>&nbsp;</td>
                        {{-- <td><a href="{{ route('loaimon.edit', [$item->maloai]) }}"><i class="bi bi-pencil-fill"></i></a></td> --}}
                        <td>
                            <i class="bi bi-pencil-fill icon-edit cursor-pointer" data-maloai="{{ $item->maloai }}"></i>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">Chưa có dữ liệu</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </section>
</div>

{{-- <script>
    const elList = document.querySelectorAll('.icon-edit');

    elList.forEach((el) => {
        el.onclick = (e) => {
            let maLoai = e.target.getAttribute('data-maloai');
            openModal();
            console.log(maLoai);

            fetch(`/loai-mon/${maLoai}/edit`)
                .then((response) => response.json())
                .then((data) => console.log(data));
        }
    });
</script> --}}

@endsection