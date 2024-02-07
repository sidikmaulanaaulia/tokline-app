@extends('admin.layout.header')
@section('container')
    <div class="container-fluid">
        <h3> Selamat Datang {{ auth()->user()->nama }} </h3>
        <div class="container-fluid mt-3">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            <div class="row">
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-bookmark-plus"></i>
                            </h1>
                            <h6 class="text-white">Produk</h6>
                            <h6 class="text-white">{{ $totalProduk }}</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-chart-bar"></i>
                            </h1>
                            <h6 class="text-white">Kategori</h6>
                            <h6 class="text-white">{{ $totalCategory }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-account"></i>
                            </h1>
                            <h6 class="text-white">Pengguna</h6>
                            <h6 class="text-white">{{ $totalPengguna }}</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-2 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">
                                <i class="mdi mdi-cart"></i>
                            </h1>
                            <h6 class="text-white">Order</h6>
                            <h6 class="text-white">{{ $totalOrder }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-md-flex align-items-center">
                        <div>
                          <h4 class="card-title">Data Penjualan</h4>
                          <h5 class="card-subtitle">1 Bulan Terakhir</h5>
                        </div>
                      </div>
                      <div class="row">
                        <!-- column -->
                        <div class="col-lg-9">
                          <div class="flot-chart">
                            <div
                              class="flot-chart-content"
                              id="flot-line-chart"
                            ></div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="row">
                            <div class="col-6">
                              <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-account fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1">{{ $totalPengguna }}</h5>
                                <small class="font-light">Total Users</small>
                              </div>
                            </div>
                            <div class="col-6 mt-3">
                              <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-cart fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1">{{ $totalOrder }}</h5>
                                <small class="font-light">Total Shop</small>
                              </div>
                            </div>
                            <div class="col-6 mt-3">
                              <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-tag fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1">{{ $totalOrder }}</h5>
                                <small class="font-light">Total Orders</small>
                              </div>
                            </div>
                            <div class="col-6 mt-3">
                              <div class="bg-dark p-10 text-white text-center">
                                <i class="mdi mdi-table fs-3 mb-1 font-16"></i>
                                <h5 class="mb-0 mt-1">100</h5>
                                <small class="font-light">Pending Orders</small>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- column -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

             <h3>Data Produk Terlaris</h3>
             <div class="card" style="width: 10rem;">
                 <a class="text-decoration-none text-black" href="/detail-produk/{{ $produkLarisDetail->slug }}">
                     <img src="{{ asset('storage/uploads/' . $produkLarisDetail->gambar) }}" class="card-img-top" alt="...">
                     <div class="card-body">
                         <h5 class="card-title">{{ $produkLarisDetail->nama_produk }}</h5>
                         <p class="card-text text-danger">Rp{{ $produkLarisDetail->harga }}</p>
                     </div>
                 </a>
             </div>
        </div>
    </div>
@endsection
