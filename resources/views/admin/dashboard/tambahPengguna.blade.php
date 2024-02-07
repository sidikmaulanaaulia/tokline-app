@extends('admin.layout.header')

@section('container')
 <h3 class="card-title text-center mt-3">TAMBAH PENGGUNA</h3>
  <form action="/pengguna/tambah-pengguna" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container mt-2">
      <a class="btn btn-primary" href="/pengguna">Kembali</a>
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
            <label for="formGroupExampleInput1" class="form-label">Nama</label>
            <input type="text" class="form-control form-control-sm" name="nama" id="formGroupExampleInput1" placeholder="Nama" required>
          </div>         
          <div class="mb-3">
            <label for="formGroupExampleInput0" class="form-label">Password</label>
            <input type="password" class="form-control form-control-sm" name="password" id="formGroupExampleInput1" placeholder="Password" required>
          </div>         
          <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Email</label>
            <input type="email" class="form-control form-control-sm " name="email" id="formGroupExampleInput2" placeholder="Email" required>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput3" class="form-label">Alamat</label>
            <input type="text" class="form-control form-control-sm " name="alamat" id="formGroupExampleInput3" placeholder="Alamat" required>
          </div>
          <div class="mb-3">
            <label for="formGroupExampleInput4" class="form-label">No Telephone</label>
            <input type="text" class="form-control form-control-sm " name="nomor_telepon" id="formGroupExampleInput4" placeholder="No Telephone" required>
          </div>
          <button type="submit" name="submit" class="btn btn-success btn-sm border text-white rounded-5">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection