@extends('layout.header')

@section('container')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif
    @if (session('error2'))
        <script>
            Swal.fire({
                title: 'Oops...',
                text: '{{ session('error2') }}',
            });
        </script>
    @endif
    <div class="row p-2 gap-3">
        <div class="card col-md-4 content-center" style="width: 20rem;">
            <img src="{{ asset('storage/uploads/' . $produk->gambar) }}" class="card-img-top" alt="...">
        </div>

        <div class="col-md-4">
            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
            <p class="card-text">Rp{{ $produk->harga }}</p>
            <form>
                <div>
                    <p>{{ $produk->dekripsi }}</p>
                </div>
            </form>
        </div>
        <div class="col-md-4 border pt-5 pr-3 pl-3">
            <form method="POST" action="/detail-produk/{{ $produk->slug }}">
                @csrf
                <p class="fs-4 opacity-50">Silahkan Pilih Variant</p>
                @if ($produkSize)
                @isset($produkSize)
                <p class="fs-5">Stok :{{ $produkSize->size_s + $produkSize->size_m + $produkSize->size_l + $produkSize->size_xl}}</p>
                @endisset
                @else
                <p>Stok:0</p>
                @endif
                <hr>
                <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                <p class="fs-5 opacity-50">Subtotal:</p>
                <p class="fs-5 text-danger">Rp.{{ $produk->harga }}</p>
                <div class="form-group">
                    <label for="sizeSelect">Pilih Ukuran:</label>
                    <select  name="size" class="form-control w-25" id="sizeSelect" >
                        @isset($produkSize->size_s)
                        <option value="S">S</option>
                    @endisset
                    @isset($produkSize->size_m)
                        <option value="M">M</option>
                    @endisset
                    @isset($produkSize->size_l)
                        <option value="L">L</option>
                    @endisset
                    @isset($produkSize->size_xl)
                        <option value="Xl">XL</option>
                    @endisset
                    </select>
                </div>
                <div class="input-group " style="width:120px">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="minusButton">-</button>
                    </div>
                    <input type="text" class="form-control text-center w-25" name="quantity" value="0" id="quantity" readonly>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="plusButton">+</button>
                    </div>
                  </div>
                <div class="p-3 text-center">
                    <button type="submit" class="btn btn-primary w-50" name="action" value="buy_now">Beli Sekarang</button>
                    <button type="submit" class="btn btn-danger w-50 mt-3" name="action" value="add_to_cart">Masukan Keranjang</button>

                </div>
            </form>
        </div>
    </div>

    <div class="d-flex flex-wrap gap-3 p-5 mt-5">
        @foreach ($produkTerkait as $item)
            <div class="card" style="width: 18rem;">
                <a class="text-decoration-none text-black" href="/detail-produk/{{ $item->slug }}">
                    <img src="{{ asset('storage/uploads/' . $item->gambar) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text text-danger">Rp{{ $item->harga }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

<script>
    $(document).ready(function(){
      var quantity = 0;

      $('#plusButton').click(function(){
        quantity++;
        $('#quantity').val(quantity);
      });

      $('#minusButton').click(function(){
        if(quantity > 0){
          quantity--;
          $('#quantity').val(quantity);
        }
      });
    });
  </script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
