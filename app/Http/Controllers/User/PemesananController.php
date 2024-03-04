<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\Order;
use App\Models\Keranjang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;


class PemesananController extends Controller
{
    public function show($slug){

        $user = Auth::user();
        $produk = Produk::where('slug', $slug)->first();
        $produk_id = $produk->id;
        $keranjang = Keranjang::where('produk_id', $produk_id)->first();
        $response = Http::withHeaders([
            'key' => 'aca75271d45a42757fb47477a60c5087'
            ])->get('https://api.rajaongkir.com/starter/city');

            $cities = $response['rajaongkir']['results'];
        return view('user.pemesanan' , compact('produk','keranjang','cities'));
    }

    public function getShippingCost(Request $request)
{
    $response = Http::withHeaders([
        'key' => 'aca75271d45a42757fb47477a60c5087'
    ])->post('https://api.rajaongkir.com/starter/cost', [
        'origin' => 5,
        'destination' => $request->destination,
        'weight' => $request->weight,
        'courier' => $request->courier,
    ]);

    $rajaongkirResults = $response['rajaongkir']['results'];

    $firstCourier = $rajaongkirResults[0];
    $firstService = $firstCourier['costs'][0]['cost'][0];

    $shippingCost = $firstService['value'];
    $etd = $firstService['etd'];

    return response()->json(['cost' => $shippingCost , 'etd' => $etd]);

}


public function store(Request $request)
{
    $user_id = Auth::id();
    $keranjang = Keranjang::where('produk_id',$request->produk_id)->where('user_id',$user_id)->first();
    $keranjang->delete();
    $data = $request->validate([
        'produk_id' => 'required',
        'nama_pembeli' => 'required|string|max:255',
        'alamat' => 'required|min:10',
        'no_telepone' => 'required|max:12',
        'courier' => 'required',
        'etd' => 'required',
        'quantity' => 'required',
        'total_harga' => 'required',
    ]);
    $order = new Order;
    $order->kode_order = 'ORD-' . strtoupper(Str::random(8));
    $order->produk_id = $request->produk_id;
    $order->tgl_pesanan = Carbon::now();
    $order->quantity = $request->quantity;
    $order->nama_pembeli = $request->nama_pembeli;
    $order->alamat = $request->alamat;
    $order->size = $request->size;
    $order->etd = $request->etd;
    $order->ekpedisi = $request->courier;
    $order->no_hp = $request->no_telepone;
    $order->total = $request->total_harga;
    $order->status = $request->status;
    $order->user_id = $user_id;

    $order->save();

    return redirect('/pesanan-saya');
}


}
