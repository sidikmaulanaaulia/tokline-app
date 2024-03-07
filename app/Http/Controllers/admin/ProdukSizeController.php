<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        $result = $produk_size->save();
        if ($result) {
            return redirect()->route('produkSize.show',$id)->with('success','sukses');
        }else{
            return redirect()->route('produkSize.show',$id)->with('error','gagal');
        }

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
        return redirect()->route('produkSize.edit',$produk_id)->with('success','sukses');

    }

    public function destroy($productId, $sizeId)
    {
        $product = Product::findOrFail($productId);
        $size = ProductSize::findOrFail($sizeId);
        $size->delete();

        return redirect()->route('products.edit', $productId)->with('success', 'Ukuran berhasil dihapus.');
    }
}
