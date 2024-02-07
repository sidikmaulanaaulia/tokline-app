@extends('admin.layout.header')

@section('container')

@if($produkSize)

<div class="container">
    <h1>Stok Produk</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ukuran S</th>
                <th>Ukuran M</th>
                <th>Ukuran L</th>
                <th>Ukuran XL</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $produkSize->size_s }}</td>
                    <td>{{ $produkSize->size_m }}</td>
                    <td>{{ $produkSize->size_l }}</td>
                    <td>{{ $produkSize->size_xl }}</td>
                </tr>
        </tbody>
    </table>
</div>

<a class="btn btn-warning " href="/edit-produk-size/{{ $produkSize->produk_id }}">edit</a>
@else


<div class="container">
    <h1>Stok Produk</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Ukuran S</th>
                <th>Ukuran M</th>
                <th>Ukuran L</th>
                <th>Ukuran XL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><h1>Belom Ada Stok</h1></td>
            </tr>
        </tbody>
    </table>
</div>
<a class="btn btn-primary " href="/tambah-produk-size/{{ $produk->id }}">Tambah</a>

@endif
@endsection
