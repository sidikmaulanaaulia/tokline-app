<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function show(){
        $data = Category::all();
        return view('admin.dashboard.category', compact('data'));
    }

    public function create(){
        return view('admin.dashboard.tambahKategori');
    }

  public function store(Request $request){
    $validatedData = $request->validate([
        'nama_kategori' => 'required',
        'deskripsi_kategori' => 'required',
    ]);

    $kategori = new Category();
    $kategori->nama_kategori = $validatedData['nama_kategori']; // Menggunakan $validatedData
    $kategori->deskripsi_kategori = $validatedData['deskripsi_kategori']; // Menggunakan $validatedData
    $kategori->save();

    return redirect('/tambah-kategori')->with('success', 'Data Berhasil Ditambahkan');
}


public function edit($slug){
    $data = Category::where('slug', $slug)->first();
    return view('admin.dashboard.editKategori', compact('data'));

}

public function update(Request $request, $id)
{
    $category = Category::find($id);

    // Validasi dan pengolahan lainnya
    $validatedData = $request->validate([
        'nama_kategori' => 'required',
        'deskripsi_kategori' => 'required',
    ]);

    $newSlug = Str::slug($request->input('nama_kategori'));
    $count = 1;
    while (Category::where('slug', $newSlug)->where('id', '<>', $id)->exists()) {
        $newSlug = Str::slug($request->input('nama_kategori')) . '-' . $count;
        $count++;
    }

    $category->nama_kategori = $request->input('nama_kategori');
    $category->slug = $newSlug;
    // Setel atribut lainnya sesuai kebutuhan

    $category->save();

    return redirect("edit-kategori/{$newSlug}")->with('success', 'Data berhasil diperbarui');
}


public function destroy($id){
    $data = Category::find($id);
    $data->delete();
    return redirect('/produk/kategori')->with('success','Data Berhasil Di Hapus');

}

}
