@extends('admin.layout.header')

@section('container')
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'error',
    });
</script>
@endif

    <h3 class="card-title text-center mt-3">Form Tambah Kategori</h3>
    <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('kategori.show') }}">Kembali</a>
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">Kategori</label>
                        <input type="text" class="form-control form-control-sm" name="nama_kategori"
                            id="formGroupExampleInput1" placeholder="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Dekskripsi Kategori</label>
                        <input type="text" class="form-control form-control-sm " name="deskripsi_kategori"
                            id="formGroupExampleInput2" placeholder="Deskripsi Kategori" required>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
        </div>
    </form>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
