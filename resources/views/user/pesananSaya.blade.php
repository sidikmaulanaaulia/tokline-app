@extends('layout.header')
@section('container')
    <div class="container mt-4">
        <div class="container mt-5">
            <h2 class="mb-4"> Pesanan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>size</th>
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
                <tbody>
                    @foreach($data as $item)
                    <form action="/pesanan-detail" method="POST">
                    <tr>
                        <td><img style="width: 10rem;" src="{{ asset('storage/uploads/' . $item->produk->gambar) }}"
                            class="card-img-top" alt="..."></td>
                        <td>{{ $item->produk->nama_produk }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->size }}</td>
                        <td>{{ $item->Ukuran }}</td>
                        <td>{{ $item->nama_pembeli }}</td>
                        <td>{{ $item->etd }}</td>
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
                        <input type="hidden" name="order_id" value="{{$item->id}}">
                        <td><button type="submit" name="submit" class="btn btn-primary"></button></td>
                    </tr>
                </form>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
