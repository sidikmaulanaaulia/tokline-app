<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk_size;
use App\Models\Produk;

class CobaController extends Controller
{
    public function index()
    {
        $produk = Produk::with('produk_size')->get();
        return view('admin.dashboard.coba', compact('produk'));
    }


    public function update(Request $request,$id){
        $produk_size  = Produk_size::find($id);
        $data = $request->all();
        $produk_size->update($data);

        return redirect('/coba');


    }
}
