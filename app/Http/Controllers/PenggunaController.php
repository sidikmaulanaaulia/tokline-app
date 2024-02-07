<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PenggunaController extends Controller
{
    public function index(){
        $data = User::all();
        return view('admin.dashboard.pengguna',compact('data'));
    }

    public function tambahPengguna(){
        return view('admin.dashboard.tambahPengguna');
    }

    public function tambahDataPengguna(Request $request){
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

    public function editPengguna($id){
        $data = User::find($id);
        return view('admin.dashboard.editPengguna',compact('data'));

    }

    public function editDataPengguna(Request $request,$id){
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

    public function hapusPengguna($id){
        $request = User::find($id);
        $result = $request->delete();
        if($result){
            return redirect('/pengguna')->with('success','data berhasil di hapus');
        }else{
            return redirect('/pengguna')->with('error','data berhasil di hapus');
        }
        
}
}
