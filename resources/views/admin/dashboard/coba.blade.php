@extends('admin.layout.header')

@section('container')
        <label for="">nama produk</label>
        @foreach ($produk as $item )

        <h1>{{ $item->nama_produk }}</h1>
        <label for="">size s:</label>
        <input type="text" name="size_s" value="{{ $item->produk_size->size_s }}">
        <label for="">size m:</label>
        <input type="text" name="size_m" value="{{ $item->produk_size->size_m }}">
        <label for="">size xl:</label>
        <input type="text" name="size_xl" value="{{ $item->produk_size->size_xl }}">
        <h1>Stok:{{ $item->produk_size->size_s + $item->produk_size->size_m + $item->produk_size->size_xl}}</h1>
        @endforeach
        <button type="submit" name="submit"> ubah</button>
@endsection
