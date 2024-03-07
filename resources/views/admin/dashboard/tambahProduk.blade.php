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

<h3 class="card-title text-center mt-3">TAMBAH PRODUK</h3>
<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="/produk">Kembali</a>
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm" name="nama_produk"
                            id="formGroupExampleInput1" placeholder="Nama Produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Dekskripsi</label>
                        <input type="text" class="form-control form-control-sm " name="dekripsi"
                            id="formGroupExampleInput2" placeholder="Dekripsi" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Harga</label>
                        <input type="text" class="form-control form-control-sm " name="harga"
                            id="formGroupExampleInput3" placeholder="Harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Berat</label>
                        <input type="text" class="form-control form-control-sm" name="berat"
                            id="formGroupExampleInput3" placeholder="berat" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">Gambar</label>
                        <input type="file" class="form-control form-control-sm " name="gambar"
                            id="formGroupExampleInput5" placeholder="Gambar" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Kategori</label>
                        <select name="category_id" id="formGroupExampleInput3">
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" name="submit"
                        class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
                </div>
            </div>
        </div>
        </div>
    </form>
    @endsection
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
