<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class PenggunaController extends Controller
{
    public function show(){
        $data = User::all();
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
           return redirect()->route('pengguna.create')->with('success','Sukses');

        }else{
            return redirect()->route('pengguna.create')->with('error','Gagal');
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
            return redirect()->route('pengguna.edit',$id)->with('success','sukses');
        }else{
            return redirect()->route('pengguna.edit',$id)->with('error','Gagal');
        }
    }

    public function destroy($id){
        $request = User::find($id);
        $result = $request->delete();
        if($result){
            return response()->json(['success'=>'sukses'],200);
        }else{
            return response()->json(['error'=>'error'],400);
        }

}
}
