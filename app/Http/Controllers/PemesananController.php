<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\produk;
use App\Models\User;


class PemesananController extends Controller
{
    public function index(){
        $pemesanan = Pemesanan::with('produk','user')->get();
        return view('admin.dashboard.pemesanan',compact('pemesanan'));
    }
}
