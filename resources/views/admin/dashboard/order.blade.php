@extends('admin.layout.header')
@section('container')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <h3 class="card-title text-center">Data Order</h3>
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Datatable</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Quantity</th>
                                        <th>Nama Pembeli</th>
                                        <th>Alamat</th>
                                        <th>Ekspedisi</th>
                                        <th>No hp</th>
                                        <th>Total</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->produk->nama_produk }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->nama_pembeli }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->ekpedisi }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>Rp.{{ $item->total }}</td>
                                            <td>Rp.{{ $item->tgl_pesanan }}</td>
                                            @if ($item->status == 'Unpaid')
                                            <td>
                                                <p class="card-text text-danger">{{ $item->status }}</p>
                                            </td>
                                            @else
                                            <td>
                                                <p class="card-text text-success">{{ $item->status }}</p>
                                            </td>
                                            @endif
                                            @if ($item->status_pesanan == 'Diproses')
                                            <td>
                                                <p class="card-text text-warning">{{ $item->status_pesanan }}</p>
                                            </td>
                                            @else
                                            <td>
                                                <p class="card-text text-info">{{ $item->status_pesanan }}</p>
                                            </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="/order-konfirmasi/{{ $item->id }}">Konfirmasi Pesanan</a>
                                                <a class="btn btn-danger btn-sm mt-3" href="/order-batalkan{{ $item->id }}">Batalkan Pesanan</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    </div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
