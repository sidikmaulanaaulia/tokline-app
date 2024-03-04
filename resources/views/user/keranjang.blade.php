@extends('layout.header')

@section('container')
    {{-- alert check alamat --}}
    <div class="row mt-4">
        <div class=" ">
            @foreach ($keranjangs as $item)
                <div class="d-flex">
                    <div>
                        <img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                            class="card-img-top" alt="...">
                    </div>
                    <div>
                        <h5 class="card-title">{{ $item->produk->nama_produk }}</h5>
                        <p class="card-text">Rp{{ $item->produk->harga }}</p>
                        <p class="card-text">Size: {{ $item->size }}</p>
                        <p class="card-text">Quantity: {{ $item->quantity }}</p>
                        <a href="/pemesanan/{{ $item->produk->slug }}" class="btn btn-primary">Checkout</a>
                        <a href="/keranjang/{{ $item->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif

    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
