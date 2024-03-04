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

    <h3 class="card-title text-center mt-3">EDIT PRODUK</h3>
    <form action="{{ route('produk.update',$produk->id) }}" method="post" enctype="multipart/form-produk">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('produk.show') }}">Kembali</a>
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $produk->nama_produk }}"
                            name="nama_produk" id="formGroupExampleInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Dekskripsi</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $produk->dekripsi }}"
                            name="dekripsi" id="formGroupExampleInput2" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Harga</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $produk->harga }}"
                            name="harga" id="formGroupExampleInput3" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">Berat</label>
                        <input type="number" class="form-control form-control-sm " value="{{ $produk->berat }}"
                            name="berat" id="formGroupExampleInput5">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput5" class="form-label">Gambar</label>
                        <input type="file" class="form-control form-control-sm " value="{{ $produk->gambar }}"
                            name="gambar" id="formGroupExampleInput5">
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput6" class="form-label">Kategori</label>
                        <select name="category_id" id="formGroupExampleInput6">
                            <option value="{{ $produk->category->id }}">{{ $produk->category->nama_kategori }}</option>
                            @foreach ($category as $item)
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
