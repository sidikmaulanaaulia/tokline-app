<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Produk_size;
use App\Models\Produk;

class PesananSayaController extends Controller
{
    public function index(){
        $id_user = Auth::id();
        $belumBayar = Order::where('user_id', $id_user)
              ->where('status', 'Unpaid')
              ->orderBy('id', 'desc')
              ->get();
        $orderDikirim = Order::where('user_id', $id_user)
              ->where('status_pesanan', 'Dikirim')->where('status' , 'Paid')
              ->orderBy('id', 'desc')
              ->get();

        $orderDiproses = Order::where('user_id', $id_user)
              ->where('status_pesanan', 'Diproses')->where('status' , 'Paid')
              ->orderBy('id', 'desc')
              ->get();

        $orderDibatalkan = Order::where('user_id', $id_user)
              ->where('status_pesanan', 'Dibatalkan')
              ->orderBy('id', 'desc')
              ->get();

        return view('test',compact('belumBayar','orderDikirim','orderDibatalkan','orderDiproses'));
    }

    public function detailPesanan(Request $request)

    {
        $order = Order::where('id',$request->order_id)->first();
            // data midtrans
            \Midtrans\Config::$serverKey = 'SB-Mid-server-vpCkWvgdbtycldmhcMMxVHFa';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order->id,
                    'gross_amount' => $order->total,
                ),
                'customer_details' => array(
                    'nama' => $order->nama_pembeli,
                    'no_hp' => $order->no_hp,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('pesananDetail',['token' => $snapToken,'order' => $order]);
    }

    public function callback(Request $request)

{
    $serverKey = 'SB-Mid-server-vpCkWvgdbtycldmhcMMxVHFa';
    $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
if ($hashed == $request->signature_key) {
    $order = Order::where('id',$request->order_id)->first();
    $produkSize = Produk_size::where('produk_id',$order->produk_id)->first();
    if ($order->size == "S"){
        $result =  $order->quantity - $produkSize->size_s;
        $produkSize->update(['size_s' => $result]);
        $order->update(['status' => 'Paid','status_pesanan' => 'Diproses']);
    }
    if ($order->size == "M"){
        $result =  $order->quantity - $produkSize->size_m;
        $produkSize->update(['size_m' => $result]);
        $order->update(['status' => 'Paid','status_pesanan' => 'Diproses']);

    }
    if ($order->size == "L"){
        $result =  $order->quantity - $produkSize->size_l;
        $produkSize->update(['size_l' => $result]);
        $order->update(['status' => 'Paid','status_pesanan' => 'Diproses']);

    }
    if ($order->size == "Xl"){
        $result =  $order->quantity - $produkSize->size_xl;
        $produkSize->update(['size_xl' => $result]);
        $order->update(['status' => 'Paid','status_pesanan' => 'Diproses']);
    }
} else {
    return response()->json(['message' => 'data gagal']);
}
}


}
