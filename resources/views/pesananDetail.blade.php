@extends('layout.header')
@section('container')

    <div class="card mt-4 col-lg-4 col-md-6 col-sm-12">
        <div class="card-body">
            <h5 class="card-title">Detail Pesanan</h5>

            <ul class="list-group">
                <li class="list-group-item">
                    Id Order:{{ $order->kode_order }}
                </li>
                <li class="list-group-item">
                    Nama Produk:{{ $order->produk->nama_produk }}
                </li>
                <li class="list-group-item">
                    Nama Pembeli:{{ $order->nama_pembeli }}
                </li>
                <li class="list-group-item">
                    Quantity : {{ $order->quantity }}
                </li>
                <li class="list-group-item">
                    Alamat:{{ $order->alamat }}
                </li>
                <li class="list-group-item">
                    Ekspedisi:{{ $order->ekpedisi }}
                </li>
                <li class="list-group-item">
                    Estimasi:{{ $order->etd }}
                </li>
                <li class="list-group-item">
                    Total Harga:{{ $order->total }}
                </li>
                <li class="list-group-item">
                    Status: <span class="badge badge-danger">{{ $order->status }}</span>
                </li>
                <button class="btn btn-primary " id="pay-button">Bayar Sekarang</button>
            </ul>
        </div>
    </div>

    <script type="text/javascript">
        // Sesuaikan URL callback sesuai dengan konfigurasi Anda
        var payButton = document.getElementById('pay-button');
     payButton.addEventListener('click', function () {
       window.snap.pay('{{$token}}', {
         onSuccess: function (result) {
           // Lakukan sesuatu jika pembayaran sukses
           window.location.href = '/pesanan-saya'
           console.log('Pembayaran sukses:', result);
           // Redirect atau tindakan lainnya
         },
         onPending: function (result) {
           // Lakukan sesuatu jika pembayaran masih tertunda
           console.log('Pembayaran tertunda:', result);
           // Redirect atau tindakan lainnya
         },
         onError: function (result) {
           // Lakukan sesuatu jika pembayaran gagal
           console.log('Pembayaran gagal:', result);
           // Redirect atau tindakan lainnya
         },
         onClose: function () {
           // Lakukan sesuatu ketika popup ditutup
           console.log('Popup ditutup');
           // Redirect atau tindakan lainnya setelah popup ditutup
         },
       });
     });


       </script>

@endsection
