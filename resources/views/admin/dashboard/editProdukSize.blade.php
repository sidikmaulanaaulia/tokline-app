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
<form action="{{ route('produkSize.update',$produkSize->id) }}" method="POST">
    @csrf
    <div class="mb-3">
        <div>
            <label for="size_s">Ukuran S:</label>
            <input type="number" name="size_s" id="size_s" min="0" value="{{ $produkSize->size_s }}" required>
        </div>

        <div>
            <label for="size_m">Ukuran M:</label>
            <input type="number" name="size_m" id="size_m" min="0" value="{{ $produkSize->size_m }}" required>
        </div>

        <div>
            <label for="size_l">Ukuran L:</label>
            <input type="number" name="size_l" id="size_l" min="0" value="{{ $produkSize->size_l }}" required>
        </div>

        <div>
            <label for="size_xl">Ukuran XL:</label>
            <input type="number" name="size_xl" id="size_xl" min="0" value="{{ $produkSize->size_xl }}" required>
        </div>
    </div>
    <button class="btn btn-success text-white" type="submit" >Ubah</button>
</form>

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
