@extends('layout.header')

@section('container')
    <div class="container d-flex justify-content-center flex-wrap gap-5 fs-3 mt-2">
        @foreach ($daftar_kategori as $item)
            <a id="main" class="h4" href="/kategori/{{ $item->slug }}">{{ $item->nama_kategori }}</a>
        @endforeach
    </div>

    <div class="row d-flex flex-wrap justify-content-center gap-4 p-4 mt-3">
        <div class="col-12 fs-3 fw-bold">
            DAFTAR PRODUK
        </div>
        @foreach ($data as $item)
        <div class="card" style="width: 18rem;">
            <a class="text-decoration-none text-black" href="/detail-produk/{{ $item->slug }}">
                <img src="{{ asset('storage/uploads/' . $item->gambar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_produk }}</h5>
                    <p class="card-text text-danger">Rp{{ $item->harga }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
@endsection
