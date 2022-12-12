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
                <input type="text" name="maloai" id="maloai" placeholder="Mã món" class="c-input" autocomplete="off" value="{{ old('maloai') ?? null }}" />
            </div>

            <div class="form-group c-form-group-flex-col">
                <label for="tenloai">Tên loại món</label>
                <input type="text" name="tenloai" id="tenloai" placeholder="Tên món" class="c-input" autocomplete="off" value="{{ old('tenloai') ?? null }}" />
            </div>

            <div class="form-group c-form-group-flex-col">
                <input class="bg-sky-700 text-white px-4 py-3 rounded cursor-pointer" type="submit" value="Cập nhật" />
            </div>
        </form>
    </div>
</div>

@include('admin.include.modal.modal-end')

<div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 {{ session()->get('status') ? 'show' : null }}" role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>

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
            <form action="{{ route('loaimon.store') }}" method="post">
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

<script>
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
</script>

@endsection