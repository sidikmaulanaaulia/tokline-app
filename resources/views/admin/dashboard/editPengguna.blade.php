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
    <h3 class="card-title text-center mt-3">EDIT PENGGUNA</h3>
    <form action="{{ route('pengguna.update',$data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('pengguna.show') }}">Kembali</a>
            <div class="row p-4 border rounded-5">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="formGroupExampleInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $data->nama }}"
                            name="nama" id="formGroupExampleInput1" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $data->email }}"
                            name="email" id="formGroupExampleInput2" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">Alamat</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $data->alamat }}"
                            name="alamat" id="formGroupExampleInput3" required>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput3" class="form-label">No Telephone</label>
                        <input type="text" class="form-control form-control-sm " value="{{ $data->nomor_telepon }}"
                            name="nomor_telepon" id="formGroupExampleInput3" required>
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
