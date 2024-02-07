@extends('admin.layout.header')

@section('container')
    <h3 class="card-title text-center mt-3">Form Tambah Kategori</h3>
    <form action="/tambah-kategori" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="/kategori">Kembali</a>
            @if (session('success'))
                <div class="alert alert-success w-25 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-success w-25 mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
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
