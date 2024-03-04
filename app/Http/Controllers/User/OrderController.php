<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function transaksi(){

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
                'gross_amount' => 90000,
            ),
            'customer_details' => array(
                'first_name' => 'aulia',
                'last_name' => 'pratama',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.transaksi',['token' => $snapToken]);
            }


            public function callback(Request $request){
                $serverKey = 'SB-Mid-server-vpCkWvgdbtycldmhcMMxVHFa';

                $hased = hash("sha512",$request->order_id.$request->status.$request->code_code.$request->gross_amount.$serverKey);
                if($hased){
                    if($request->transaction_status == 'capture'){
                        $order = Order::find(2);
                        $order->update(['status' => 'Paid']);

                    }

                }else{
                    return response()->json(['masalah' =>$hased]);
                }

            }
}
