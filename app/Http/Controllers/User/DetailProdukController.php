<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\produk_size;
use App\Models\Category;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;


class DetailProdukController extends Controller
{
public function index($slug)
{
    $produk = Produk::where('slug', $slug)->first();

    if (!$produk) {
        return abort(404);
    }

    $kategori = $produk->category;

    if (!$kategori) {
        return abort(404);
    }

    $produkTerkait = Produk::where('category_id', $kategori->id)
        ->where('slug', '<>', $slug) // Exclude the current product
        ->get();

        $produkSize = Produk_size::where('produk_id' , $produk->id)->first();

    return view('detailProduk', compact('user.produk', 'produkTerkait','produkSize'));


}


    public function storeProduk(Request $request ,$slug){
        //proses beli langsung
         if ($request->input('action') == 'buy_now') {
            $produkSize = Produk_size::where('produk_id',$request->produk_id)->first();
            $keranjang = Keranjang::where('produk_id',$request->produk_id)->where('size',$request->size)->where('user_id',$user_id)->first();

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
               return redirect("pemesanan/{$slug}");

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
               return redirect("pemesanan/{$slug}")->with('success', 'berhasil ');

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
               return redirect("pemesanan/{$slug}")->with('success', 'berhasil ');

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
               return redirect("pemesanan/{$slug}")->with('success', 'berhasil ');

           }
            }else{
               return redirect("detail-produk/{$slug}")->with('success', 'data tidak di temukan');
            }


        } elseif ($request->input('action') == 'add_to_cart') {
            // Proses masukkan ke keranjang

         $produkSize = Produk_size::where('produk_id',$request->produk_id)->first();
         $user_id = Auth::id();
         $keranjang = Keranjang::where('produk_id',$request->produk_id)->where('size',$request->size)->where('user_id',$user_id)->first();

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
            return redirect("detail-produk/{$slug}")->with('success', 'berhasil');

        }

         }elseif($request->size == "M" && $request->quantity < $produkSize->size_m){

            if ($keranjang){
                $ukuranDipilih = $keranjang->quantity + $request->quantity;
            if ($ukuranDipilih > $produkSize->size_m) {
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
            return redirect("detail-produk/{$slug}")->with('success', 'berhasil ');

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
            return redirect("detail-produk/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

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
            return redirect("detail-produk/{$slug}")->with('success', 'berhasil memasukkan ke keranjang');

        }
         }else{
            return redirect("detail-produk/{$slug}")->with('success', 'data tidak di temukan');
         }
        }

}
}


