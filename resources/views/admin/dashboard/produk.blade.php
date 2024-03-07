@extends('admin.layout.header')
@section('container')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <h3 class="card-title text-center">Data Produk</h3>
        <a class="btn btn-primary" href="{{ route('produk.create') }}"><span class="material-icons">
                playlist_add
            </span></a>
        @if (session('success'))
            <div class="alert alert-success w-25 mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Datatable</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td>{{ $item->dekripsi }}</td>
                                            <td>{{ $item->category->nama_kategori }}</td>
                                            <td>{{ $item->harga }}</td>
                                            <td>
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('produkSize.show',$item->id)}}">Lihat</a>
                                            </td>
                                            <td><img src="{{ asset('storage/uploads/' . $item->gambar) }}" width="100"
                                                    height="100"></td>
                                            <td>
                                                <form class="delete-form" action="{{ route('produk.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-confirm">
                                                        <span class="material-icons">
                                                            delete
                                                        </span></button>
                                                </form>
                                                <a class="btn btn-success btn-sm text-white mt-3"
                                                    href="{{ route('produk.edit', $item->slug) }}"> <span
                                                        class="material-icons">
                                                        <span class="material-icons">
                                                            update
                                                        </span></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
@endsection
