<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Produk;
use App\Models\User;

class PemesananDetailController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $data = Order::with('produk')->where('user_id',$userId)->get();

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
                'order_id' => rand(),
                'gross_amount' => $data->total,
            ),
            'customer_details' => array(
                'produk' => $data->produk->nama_produk,
                'first_name' => $data->nama_pembeli,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('pemesananDetail',['token' => $snapToken,'data' => $data]);
}


}
