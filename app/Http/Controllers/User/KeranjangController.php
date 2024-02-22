<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\User;

class KeranjangController extends Controller
{

  public function show()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Mengambil data keranjang pengguna beserta produk menggunakan relasi
            $keranjangs = Keranjang::with('produk')->where('user_id', $user->id)->get();
            return view('keranjang', compact('keranjangs'));
        }
    }

    public function destroy($id){
        $data = Keranjang::find($id);
         $data->delete();
         return redirect("/keranjang")->with('success','1 Produk Telah Di hapus');

    }





}
