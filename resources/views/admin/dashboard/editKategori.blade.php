@extends('admin.layout.header')

@section('container')
    <h3 class="card-title text-center mt-3">EDIT KATEGORI</h3>
    <form action="/edit-kategori/{{ $data->id }}" method="post" enctype="multipart/form-data">
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
                        <label for="formGroupExampleInput1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $data->nama_kategori }}"
                            name="nama_kategori" id="formGroupExampleInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Dekskripsi</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $data->deskripsi_kategori }}"
                            name="deskripsi_kategori" id="formGroupExampleInput2" required>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
@endsection
