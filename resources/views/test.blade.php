<!-- Tampilan menggunakan Blade template engine -->
@extends('layout.header')
@section('container')
<div class="container mt-5">
    <h2 class="mb-4">Riwayat Pesanan</h2>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="belumBayar-tab" data-bs-toggle="tab" href="#belumBayar" role="tab"
                aria-controls="belumBayar" aria-selected="true">Belum Bayar</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="diproses-tab" data-bs-toggle="tab" href="#diproses" role="tab"
                aria-controls="diproses" aria-selected="false">Diproses</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="dikirim-tab" data-bs-toggle="tab" href="#dikirim" role="tab"
                aria-controls="dikirim" aria-selected="false">Dikirim</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="dibatalkan-tab" data-bs-toggle="tab" href="#dibatalkan" role="tab"
                aria-controls="dibatalkan" aria-selected="false">DiBatalkan</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content mt-3">
        <!-- Tab 1: Belum Bayar -->
        <div class="tab-pane fade show active" id="belumBayar" role="tabpanel" aria-labelledby="belumBayar-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id Order</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Nama Penerima</th>
                        <th>Estimasi</th>
                        <th>Ekspedisi</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. HP</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <!-- Tampilkan data pesanan yang belum dibayar -->
                @foreach($belumBayar as $item)
                <form action="/pesanan-saya" method="POST">
                    @csrf
                <tr>
                    <td><img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                        class="card-img-top" alt="..."></td>
                        <td>{{ $item->kode_order }}</td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->etd }}-Hari</td>
                    <td>{{ $item->ekpedisi }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>Rp.{{ $item->total }}</td>
                    <td>
                        @if ($item->status == 'Unpaid')
                        <p class="card-text">Status Pembayaran: <span class="badge badge-danger">{{ $item->status }}</span></p>
                        @else
                        <p class="card-text">Status Pembayaran: <span class="badge badge-success">{{ $item->status }}</span></p>
                        @endif
                    </td>
                    <td>
                        @if ($item->status_pesanan == 'Di Proses')
                        <p class="card-text">Status Pesanan: <span class="badge badge-warning">{{ $item->status_pesanan }}</span></p>
                        @else
                        <p class="card-text">Status Pesanan: <span class="badge badge-success">{{ $item->status_pesanan }}</span></p>
                        @endif
                        <input type="hidden" name="order_id" value="{{$item->id}}">
                    </td>
                    <td><button type="submit" class="btn btn-primary">Bayar</button></td>
                </tr>
            </form>
                @endforeach
            </table>
        </div>


        {{-- di proses  --}}
        <div class="tab-pane fade show active" id="diproses" role="tabpanel" aria-labelledby="diproses-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id Order</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Nama Penerima</th>
                        <th>Estimasi</th>
                        <th>Ekspedisi</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. HP</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <!-- Tampilkan data pesanan yang di proses -->
                @foreach($orderDiproses as $item)
                <form action="/pesanan-saya" method="POST">
                    @csrf
                <tr>
                    <td><img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                        class="card-img-top" alt="..."></td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->etd }}-Hari</td>
                    <td>{{ $item->ekpedisi }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        <p class="card-text">Status Pembayaran: <span class="badge badge-success">{{ $item->status }}</span></p>
                    </td>
                    <td>
                        <p class="card-text">Status Pesanan: <span class="badge badge-warning">{{ $item->status_pesanan }}</span></p>
                        <input type="hidden" name="order_id" value="{{$item->id}}">
                    </td>
                </tr>
            </form>
                @endforeach
            </table>
        </div>


        <!-- Tab 3: Dikirim -->
        <div class="tab-pane fade" id="dikirim" role="tabpanel" aria-labelledby="dikirim-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id Order</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Nama Penerima</th>
                        <th>Estimasi</th>
                        <th>Ekspedisi</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. HP</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <!-- Tampilkan data pesanan yang sudah dikirim -->
                @foreach($orderDikirim as $item)
                <tr>
                    <td><img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                        class="card-img-top" alt="..."></td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->etd }}-Hari</td>
                    <td>{{ $item->ekpedisi }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        <p class="card-text">Status Pembayaran: <span class="badge badge-success">{{ $item->status }}</span></p>
                    </td>
                    <td>
                        <p class="card-text">Status Pesanan: <span class="badge badge-info">{{ $item->status_pesanan }}</span></p>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>


          <!-- Tab 2: di batalakan -->
          <div class="tab-pane fade" id="dibatalkan" role="tabpanel" aria-labelledby="dibatalkan-tab">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id Order</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Nama Penerima</th>
                        <th>Estimasi</th>
                        <th>Ekspedisi</th>
                        <th>Alamat Pengiriman</th>
                        <th>No. HP</th>
                        <th>Total Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Status Pesanan</th>
                    </tr>
                </thead>
                <!-- Tampilkan data pesanan yang sudah diterima -->
                @foreach($orderDibatalkan as $item)
                <tr>
                    <td><img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                        class="card-img-top" alt="..."></td>
                    <td>{{ $item->produk->nama_produk }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->etd }}-Hari</td>
                    <td>{{ $item->ekpedisi }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->total }}</td>
                    <td>
                        @if ($item->status == 'Unpaid')
                        <p class="card-text">Status Pembayaran: <span class="badge badge-danger">{{ $item->status }}</span></p>
                        @else
                        <p class="card-text">Status Pembayaran: <span class="badge badge-success">{{ $item->status }}</span></p>
                        @endif
                    </td>
                    <td>
                        @if ($item->status_pesanan == 'Di Proses')
                        <p class="card-text">Status Pesanan: <span class="badge badge-warning">{{ $item->status_pesanan }}</span></p>
                        @else
                        <p class="card-text">Status Pesanan: <span class="badge badge-success">{{ $item->status_pesanan }}</span></p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
