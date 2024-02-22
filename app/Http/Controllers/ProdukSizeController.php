<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\produk_size;

class ProdukSizeController extends Controller

{

    public function show($id){
        $produkSize = Produk_size::where('produk_id',$id)->first();
        $produk = Produk::findOrFail($id);
        return view('admin.dashboard.produkSize', compact('produkSize','produk'));
    }
    public function create($id)
    {
        $produk = produk::findOrFail($id);
        return view('admin.dashboard.tambahProdukSize', compact('produk'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'size_s' => 'required|integer|min:0',
            'size_m' => 'required|integer|min:0',
            'size_l' => 'required|integer|min:0',
            'size_xl' => 'required|integer|min:0',
        ]);

        $produk_size = new Produk_size();
        $produk_size->produk_id  = $id;
        $produk_size->size_s  = $request->size_s;
        $produk_size->size_m  = $request->size_m;
        $produk_size->size_l  = $request->size_l;
        $produk_size->size_xl  = $request->size_xl;

        $produk_size->save();

        return redirect('/produk')->with('success', 'Ukuran berhasil ditambahkan.');
    }


    public function edit($id)

    {
        $produkSize =  $produkSize = Produk_size::where('produk_id',$id)->first();

        return view('admin.dashboard.editProdukSize', compact('produkSize'));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            'size_s' => 'required|integer|min:0',
            'size_m' => 'required|integer|min:0',
            'size_l' => 'required|integer|min:0',
            'size_xl' => 'required|integer|min:0',
        ]);

        $produkSize = produk_size::findOrFail($id);
        $produk_id = $produkSize->produk_id;
        $produkSize->update($data);
        return redirect("produk-size/{$produk_id}")->with('success','Berhasil di Ubah');

    }

    public function destroy($productId, $sizeId)
    {
        $product = Product::findOrFail($productId);
        $size = ProductSize::findOrFail($sizeId);
        $size->delete();

        return redirect()->route('products.edit', $productId)->with('success', 'Ukuran berhasil dihapus.');
    }
}
