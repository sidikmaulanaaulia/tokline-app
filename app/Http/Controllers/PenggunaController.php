<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PenggunaController extends Controller
{
    public function show(){
        $data = User::orderBy('id', 'desc')->get();

        return view('admin.dashboard.pengguna',compact('data'));
    }

    public function create(){
        return view('admin.dashboard.tambahPengguna');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required|min:6|max:100',
            'password' => 'required|min:6|max:100',
            'email' => 'required|email:dns|max:255',
            'alamat' => 'required|min:6|max:100',
            'nomor_telepon' => 'required|min:6|max:100',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']); // Mengenkripsi password sebelum disimpan
        $result = User::create($validatedData);
        if($result){
            return redirect('/pengguna/tambah-pengguna')->with('success','Berhasil Menambahkan Data');

        }else{
            return redirect('/pengguna/tambah-pengguna')->with('error','Gagal Menambahkan Data');
        }
    }

    public function edit($id){
        $data = User::find($id);
        return view('admin.dashboard.editPengguna',compact('data'));

    }

    public function update(Request $request,$id){
        $data = User::find($id);
        $validatedData = $request->validate([
            'nama' => 'required|min:6|max:100',
            'email' => 'required|email:dns|max:255',
            'alamat' => 'required|min:6|max:100',
            'nomor_telepon' => 'required|min:6|max:100',

        ]);

       $result = $data->update($validatedData);
        if($result){
            return redirect("/edit-pengguna/{$id}")->with('success','Data Berhasil Di Tambahkan');
        }else{
            return redirect("/edit-pengguna/{$id}")->with('error','Data Berhasil Di Tambahkan');
        }
    }

    public function destroy($id){
        $request = User::find($id);
        $result = $request->delete();
        if($result){
            return response()->json(['message' => 'Pengguna berhasil dihapus'], 200);
        }else{
            return response()->json(['message' => 'Pengguna gagal'], 404);
        }

}
}
