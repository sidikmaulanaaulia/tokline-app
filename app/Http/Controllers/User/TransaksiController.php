<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        return view('admin.dahsboard.coba');
    }

    public function simpanProduk(Request $request ,$slug){
        //tambah quantyty jika penngguna sudah menambahkan produk yang sama sbelumnya
        //jika pengguna melebihi stok maka tidak bisa
        //jika pengguna menambahkan produk
        if ($request->input('action') == 'buy_now') {

       } elseif ($request->input('action') == 'add_to_cart') {
           // Proses masukkan ke keranjang
       }
        $produkSize = Produk_size::where('produk_id',$request->produk_id)->first();
        $keranjang = Keranjang::where('produk_id',$request->produk_id)->where('size',$request->size)->first();

        if ($request->size == "S" && $request->quantity <= $produkSize->size_s){
           if ($keranjang){
               $ukuranDipilih = $keranjang->quantity + $request->quantity;
           if ($ukuranDipilih > $produkSize->size_s) {
               return redirect("detail-produk/{$slug}")->with('error', 'Anda sudah memiliki beberapa di keranjang');
           }else{
               $total= $request->quantity + $keranjang->quantity;
               $keranjang->update(['quantity' => $total]);
               return redirect("detail-produk/{$slug}")->with('success','Berhasil Ditambahkan');
           }
       }else{
           $user_id = Auth::id();
           $data = $request->all();
           $data['user_id'] = $user_id;
           $result = Keranjang::create($data);
           return redirect("detail-produk/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

       }

        }elseif($request->size == "M" && $request->quantity < $produkSize->size_m){

           if ($keranjang){
               $ukuranDipilih = $keranjang->quantity + $request->quantity;
           if ($ukuranDipilih > $produkSize->size_m) {
               return redirect("detail-produk/{$slug}")->with('error', 'Anda sudah memiliki beberapa di keranjang');
           }
       }else{
           $user_id = Auth::id();
           $data = $request->all();
           $data['user_id'] = $user_id;
           $result = Keranjang::create($data);
           return redirect("pemesanan/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

       }

        }elseif($request->size == "L" && $request->quantity < $produkSize->size_l){
           if ($keranjang){
               $ukuranDipilih = $keranjang->quantity + $request->quantity;
           if ($ukuranDipilih > $produkSize->size_l) {
               return redirect("detail-produk/{$slug}")->with('error', 'Anda sudah memiliki beberapa di keranjang');
           }else{
               $total= $request->quantity + $keranjang->quantity;
               $keranjang->update(['quantity' => $total]);
               return redirect("detail-produk/{$slug}")->with('success','Berhasil Ditambahkan');
           }
       }else{
           $user_id = Auth::id();
           $data = $request->all();
           $data['user_id'] = $user_id;
           $result = Keranjang::create($data);
           return redirect("pemesanan/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

       }

        }elseif($request->size == "Xl" && $request->quantity < $produkSize->size_xl){
           if ($keranjang){
               $ukuranDipilih = $keranjang->quantity + $request->quantity;
           if ($ukuranDipilih > $produkSize->size_xl) {
               return redirect("detail-produk/{$slug}")->with('error', 'Anda sudah memiliki beberapa di keranjang');
           }else{
               $total= $request->quantity + $keranjang->quantity;
               $keranjang->update(['quantity' => $total]);
               return redirect("detail-produk/{$slug}")->with('success','Berhasil Ditambahkan');
           }
       }else{
           $user_id = Auth::id();
           $data = $request->all();
           $data['user_id'] = $user_id;
           $result = Keranjang::create($data);
           return redirect("pemesanan/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

       }
        }else{
           return redirect("detail-produk/{$slug}")->with('success', 'data tidak di temukan');
        }

}
}


