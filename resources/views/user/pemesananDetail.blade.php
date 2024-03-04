@extends('layout.header')
@section('container')

<div class="card" style="width: 16rem;">
        <div class="card-body">
            <img style="width: 10rem;" src="{{ asset('storage/uploads/' . $order->produk->gambar) }}"
                            class="card-img-top" alt="...">
            <h5 class="card-title">{{ $order->produk->nama_produk }}</h5>
            <h5 class="card-title">{{ $order->nama_pembeli }}</h5>
            <h5 class="card-title">{{ $order->alamat }}</h5>
            <h5 class="card-title">{{ $order->ekpedisi }}</h5>
            <h5 class="card-title">{{ $order->no_hp }}</h5>
            <h5 class="card-title">{{ $order->status }}</h5>
            <p class="card-text text-danger">Rp{{ $order->total }}</p>
            <button class="btn btn-primary" id="pay-button">Bayar</button>
        </div>
</div>
<script type="text/javascript">
   // Sesuaikan URL callback sesuai dengan konfigurasi Anda
   var payButton = document.getElementById('pay-button');
payButton.addEventListener('click', function () {
  window.snap.pay('{{$token}}', {
    onSuccess: function (result) {
      // Lakukan sesuatu jika pembayaran sukses
      window.location.href = '/pesanan-saya/{{ $order->id }}'
      console.log('Pembayaran sukses:', result);
      // Redirect atau tindakan lainnya
    },
    onPending: function (result) {
      // Lakukan sesuatu jika pembayaran masih tertunda
      console.log('Pembayaran tertunda:', result);
      // Redirect atau tindakan lainnya
    },
    onError: function (result) {
      // Lakukan sesuatu jika pembayaran
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
