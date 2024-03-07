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
                            <a href="{{ route('pemesanan.show',$item->produk->slug)}}"  class="btn btn-primary btn-sm">Checkout</a>
                            <form class="delete-form" action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm mt-2 delete-confirm">
                                    Delete</button>
                            </form>
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
        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('error') }}',
                });
            </script>
        @endif

    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(function(form) {
            var deleteButton = form.querySelector('.delete-confirm');

            deleteButton.addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah anda ingin menghapus?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = form.getAttribute('action');
                        var xhr = new XMLHttpRequest();
                        xhr.open('DELETE', url, true);
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                window.location.reload();
                            } else {
                                console.error(xhr.responseText);
                            }
                        };
                        xhr.send();
                    }
                });
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
