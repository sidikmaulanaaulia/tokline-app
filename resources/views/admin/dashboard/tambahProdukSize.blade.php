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

<div class="container">
    <form action="{{ route('produkSize.store',$produk->id) }}" method="POST">
        @csrf
                <div class="mb-3">
                    <label for="size_s" class="col-sm-3 col-form-label">Size S</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-25" name="size_s" id="size_s" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="size_m" class="col-sm-3 col-form-label">Size M</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-25" name="size_m" id="size_m" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="size_l" class="col-sm-3 col-form-label">Size L</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-25" name="size_l" id="size_l" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="size_xl" class="col-sm-3 col-form-label">Size XL</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control w-25" name="size_xl" id="size_xl" required>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
