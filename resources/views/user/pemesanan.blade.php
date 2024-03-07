@extends('layout.header')

@section('container')

    <div class="container mt-5">
        <form action="{{ route('pemesanan.store',$produk->id) }}" method="POST" >
            @csrf
            <div class="">
                <div>
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                    <input type="hidden" name="size" value="{{ $keranjang->size }}">
                </div>
                <div>
                    <img style="width: 8rem;" src="{{ asset('storage/uploads/' . $produk->gambar) }}" class="card-img-top"
                        alt="...">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama_pembeli" class="form-control" id="nama"
                        placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group col-md-6">
                    <label for="no_telepone">No Telepone</label>
                    <input type="text" class="form-control" name="no_telepone" id="NoTelepone"
                        placeholder="Masukkan No Telepone Anda">
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat Anda">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="destination">Kota</label>
                    <select name="destination" id="destination">
                        @foreach ($cities as $item)
                            <option value="{{ $item['city_id'] }}">{{ $item['city_name'] }}</option> @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden"
        id="weight"  value="{{ $produk->berat }}">
        <div class="form-group w-25">
            <label for="courier">Pilih Pengiriman:</label>
            <select name="courier" class="form-control" id="courier">
                <option>Pilih Pengiriman</option>
                <option value="jne">JNE</option>
                <option value="pos">POS</option>
                <option value="tiki">TIKI</option>
            </select>
        </div>
        <div class="card mt-4 col-lg-4 col-md-6 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">Ringkasan Belanja</h5>

                <ul class="list-group">
                    <li class="list-group-item">
                        Ongkir: Rp. <span id="shipping-cost-result"></span>
                    </li>
                    <li class="list-group-item">
                        Produk:<span>{{ $produk->nama_produk }}</span>
                    </li>
                    <li class="list-group-item">
                        Ukuran: <span>{{ $keranjang->size }}</span>
                    </li>
                    <li class="list-group-item">
                        Estimasi: <span id="display_etd"></span>
                        <input type="hidden" id="etd" name="etd" value="">
                    </li>
                    <li class="list-group-item">
                        Quantity: {{ $keranjang->quantity }}
                        <input type="hidden" name="quantity" value="{{ $keranjang->quantity }}">
                    </li>
                    <li class="list-group-item">
                        Total Harga Produk: Rp.{{ $produk->harga * $keranjang->quantity }}
                    </li>
                    <li class="list-group-item">
                        Total Harga (termasuk ongkir): Rp. <span id="display_total_harga"></span>
                        <input type="hidden" id="input_total_harga" name="total_harga" value="">
                    </li>
                    <input type="hidden" name="status" value="Unpaid">
                </ul>
            </div>
        </div>

    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
    <!-- Include jQuery -->
    </form>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Your custom script -->
    <script>
        // Use jQuery instead of $ to avoid conflicts with other libraries
        jQuery(document).ready(function($) {
            // Event handler for courier selection change
            $('#courier').change(function() {
                updateShippingCost();
            });

            // Function to update shipping cost
            function updateShippingCost() {
                var destination = $('#destination').val();
                var weight = $('#weight').val();
                var courier = $('#courier').val();

                // Perform AJAX request to get shipping cost
                $.ajax({
                    url: '/get-shipping-cost', // Replace with the correct route or URL
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        destination: destination,
                        weight: weight,
                        courier: courier
                    },
                    success: function(response) {
                        var shippingCost = response.cost;
                        var etd = response.etd;
                        $("#display_etd").text(etd);
                        $("#etd").val(etd);
                        // Access the cost property and display it
                        $('#shipping-cost-result').html(shippingCost);
                        var productPrice = {{ $produk->harga * $keranjang->quantity }};
                        var total = productPrice + shippingCost;
                        $("#display_total_harga").text(total);
                        $("#input_total_harga").val(total);

                        // Display the total price
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                });
            }
        });

    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @endsection
