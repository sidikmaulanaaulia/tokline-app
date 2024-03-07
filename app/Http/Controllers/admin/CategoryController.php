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
    $result = $kategori->save();
    if($result){
        return redirect()->route('kategori.create')->with('success','sukses');
    }else{
        return redirect()->route('kategori.create')->with('error','error');
    }

}


public function edit($slug){
    $data = Category::where('slug', $slug)->first();
    return view('admin.dashboard.editKategori', compact('data'));

}

public function update(Request $request, $slug)
{
    $data = Category::findBySlug($slug);

    $validatedData = $request->validate([
        'nama_kategori' => 'required',
        'deskripsi_kategori' => 'required',
    ]);

    $slug_baru = Str::slug($request->nama_kategori); // pastikan Anda telah mengimpor namespace untuk Str
    $data->update(['slug' => $slug_baru]);
    $result = $data->update($request->all());
    if ($result) {
        return redirect()->route('kategori.edit',$slug_baru)->with('success','sukses');
    }else{
        return redirect()->route('kategori.edit',$slug_baru)->with('error','error');
    }

}


public function destroy($id){
    $data = Category::find($id);
    $data->delete();
    return response()->json(['success' => 'data berhasil di hapus'],200);

}

}
