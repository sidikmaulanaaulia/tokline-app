<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Produk;
use App\Models\Produk_size;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function show(){
        $data = Produk::with('category','produk_size')->orderBy('id', 'desc')->get();
        return view('admin.dashboard.produk' , compact('data'));

    }

    public function create(){
        $data = Category::get()->all();
        return view('admin.dashboard.tambahProduk',compact('data'));
    }


public function store(Request $request) {
    $data = $request->validate([
        'nama_produk' => 'required|max:255',
        'dekripsi' => 'required',
        'harga' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|integer',
    ]);

    if ($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $path = $image->storeAs('uploads', $imageName);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->dekripsi = $request->dekripsi;
        $produk->harga = $request->harga;
        $produk->berat = $request->berat;
        $produk->gambar = $imageName; // Simpan nama file gambar ke dalam database
        $produk->category_id = $request->category_id;
        $produk->save();

        return redirect('produk/tambah-produk')->with('success','Data Berhassil Di Tambahkan ');
    } else {
        return redirect('produk/tambah-produk')->with('error','Data Berhassil Di Tambahkan ');
    }
}

public function destroy($id){
    $data = Produk::find($id);
    $imagePath = public_path('storage/uploads/' . $data->gambar); // Path gambar di storage
    if (file_exists($imagePath)) {
        unlink($imagePath); // Menghapus gambar dari penyimpanan
    }
    $data->delete();
    return redirect('/produk')->with('success','Data Berhasil Di Delete');
}

public function edit($slug){
    $produk = Produk::where('slug',$slug)->first();
    $category = Category::all();
    return view('admin.dashboard.editProduk', compact('produk','category'));
}

public function update(Request $request, $id){
    $produk = Produk::find($id);
    $slug = $produk->slug;

    if($request->hasFile('gambar')) {
        $image = $request->file('gambar');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/uploads/', $imageName);

        // Hapus gambar lama jika ada
        if($produk->image_path) {
            Storage::delete('public/uploads/' . $produk->image_path);
        }

        // Update path gambar di database
        $produk->image_path = $imageName;
    }else{
        $request['gambar'] = $produk->gambar;
    }

    $data = $request->all();

    $result = $produk->update($data);
    if($result){

        return redirect("/edit/{$slug}")->with('success', 'Data berhasil diperbarui');
    }else{

        return redirect("/edit/{$slug}")->with('error', 'Data gagal');
    }

}



public function stokUkuran($id){
    $produk_size = Produk_size::find($id)->first();
    return view('admin.dashboard.detailStok', compact('produk_size'));

}



}
