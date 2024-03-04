@extends('layout.header')
@section('container')

    <div class="row gap-5 justify-content-center p-4 mt-3">
        @if ($searchTerm)
            @if ($data->isEmpty())
                <div class="container border p-3 shadow p-3 mb-5 bg-body-tertiary rounded">
                    <div class="p-5">
                        <h4>Opps,Produk tidak ditemukan</h4>
                        <p>coba kata kunci lain atau cek rekomendasi di bawah ini</p>
                    </div>
                </div>
                <h4>Rekomendasi Untukmu</h4>
                @foreach ($produk as $item)
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
            @else
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
            @endif
        @endif
    </div>
@endsection
