@extends('admin.layout.header')
@section('container')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <h3 class="card-title text-center">Data Kategori produk</h3>
        <a class="btn btn-primary" href="{{ route('kategori.create') }}"><span class="material-icons">
            playlist_add
          </span></a>
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
                                        <th>Kategori</th>
                                        <th>Dekripsi Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->dekripsi_kategori }}</td>
                                            <td>
                                                <form class="delete-form" action="{{ route('kategori.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-confirm">
                                                        <span class="material-icons">
                                                            delete
                                                        </span></button>
                                                </form>

                                                <a class="btn btn-success btn-sm text-white"
                                                    href="{{ route('kategori.edit',$item->slug) }}"><span class="material-icons">
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

@endsection
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
