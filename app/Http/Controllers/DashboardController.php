<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $totalProduk = Produk::count();
        $totalCategory = Category::count();
        $totalPengguna = User::count();
        $totalOrder = Order::count();

        $produkLaris = Order::groupBy('produk_id')
    ->selectRaw('produk_id, sum(produk_id) as total_penjualan')
    ->orderByDesc('total_penjualan')
    ->first();

    $produkLarisId = $produkLaris->produk_id;
    $totalPenjualan = $produkLaris->total_penjualan;
    $produkLarisDetail = Produk::find($produkLarisId);

        return view('admin.dashboard.index',compact( 'totalProduk','totalCategory','totalOrder','totalPengguna','produkLarisDetail'));

    }
}
