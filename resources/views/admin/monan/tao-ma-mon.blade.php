@extends('admin.include.layout')
@section('root')
    <h3 class="text-xl font-bold">TẠO MÃ MÓN ĂN</h3>

    <div class="form">
        <form action="{{ route('monan.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="mamon">Mã món</label>
                <input type="text" name="mamon" id="mamon" value="Mã món" class="py-2 px-1 border rounded" />
            </div>
        </form>
    </div>
@endsection