@extends('client.include.layout')
@section('root')
<h2 class="product-header font-bold text-center text-header">Danh sách món ăn</h2>
<div class="product py-2">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">
    @if (count($monAnList) > 0)
        @foreach ($monAnList as $monAn)
            @include('client.include.product', [$monAn])
        @endforeach
    @else
        <h3 class="text-center">Danh sách món ăn hiện chưa có</h3>
    @endif
    </div>
</div>

{{-- http://www.thelog.com.vn/Home/DineWineDetail?name=a%20la%20carte --}}

<input type="text" name="_token" id="_token" value="{{ csrf_token() }}" hidden>

@vite(['resources/js/client/cart.js'])
@endsection