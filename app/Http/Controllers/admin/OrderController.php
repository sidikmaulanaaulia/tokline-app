<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function show(){
        $data = Order::with('produk')->orderBy('id', 'desc')
        ->get();
        return view('admin.dashboard.order', compact('data'));
    }

    public function konfirmasiOrder($id){
        $order = Order::find($id);
        $order->update(['status_pesanan' => 'Dikirim']);
        return redirect()->route('order.show')->with('success','Status Dikirim');

    }
    public function batalkanOrder($id){
        $order = Order::find($id);
        $order->update(['status_pesanan' => 'Di Batalkan']);
        return redirect()->route('order.show')->with('success','Status Di Batalkan');

    }

}
