@extends('layout.header')
@section('container')
    <div class="container d-flex flex-wrap justify-content-center gap-5 fs-3 mt-3">
        @foreach ($category as $item)
            <a class="h4" id="main" href="/kategori/{{ $item->slug }}">{{ $item->nama_kategori }}</a>
        @endforeach
    </div>

    <div class="container-fluid mt-3">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/images/banner.jpg" class="d-block w-100" alt="0">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/banner-transaction.jpg" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="assets/images/main.png" class="d-block w-100" alt="2">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row d-flex flex-wrap justify-content-center gap-4 p-4 mt-3">
        <div class="col-12 fs-3 fw-bold">
            REKOMENDASI KAMI
        </div>
        @foreach ($data as $item)
            <div class="card" style="width: 16rem;">
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
