@extends('admin.layout.header')
@section('container')
    <div class="container-fluid">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'error',
                });
            </script>
        @endif
        <h3 class="card-title text-center">Data Pengguna</h3>
<<<<<<< HEAD
        <a class="btn btn-primary" href="/pengguna/tambah-pengguna"><span class="material-icons">
=======
        <a class="btn btn-primary" href="{{ route('pengguna.create') }}"><span class="material-icons">
>>>>>>> modi
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>
                                                <a class="btn btn-success btn-sm text-white"
                                                    href="{{ route('pengguna.edit', $item->id) }}"><span
                                                        class="material-icons">
                                                        update
<<<<<<< HEAD
                                                </a>
                                                <form class="delete-form" action="/pengguna/{{ $item->id }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger delete-confirm">Delete</button>
                                                </form>
=======
                                                    </span></a>
                                                    <form class="delete-form" action="{{ route('pengguna.destroy', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm delete-confirm">
                                                            <span class="material-icons">
                                                                delete
                                                            </span></button>
                                                    </form>
>>>>>>> modi
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                    </tr>
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
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
=======
    <script>
        document.addEventListener('DOMContentLoaded', function() {
>>>>>>> modi
            var deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(function(form) {
                var deleteButton = form.querySelector('.delete-confirm');

<<<<<<< HEAD
                deleteButton.addEventListener('click', function () {
=======
                deleteButton.addEventListener('click', function() {
>>>>>>> modi
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
<<<<<<< HEAD
                            xhr.onload = function () {
=======
                            xhr.onload = function() {
>>>>>>> modi
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
<<<<<<< HEAD

=======
>>>>>>> modi
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
