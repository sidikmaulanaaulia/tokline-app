<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
            $user = User::where('id', $user->id)->first();
            return view('admin.dashboard.profile',compact('user'));
        }
    }

   public function update(Request $request)
{
    // validasi
    $data = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'alamat' => 'required|string|max:255',
        'nomor_telepon' => 'required',
        'jenis_kelamin' => 'required|string|max:10',
        'tanggal_lahir' => 'required|date',
    ]);

    // Perbarui data user berdasarkan ID
    $user_id = auth()->user()->id; // Ambil ID pengguna yang sedang login
    $user = User::findOrFail($user_id); // Pastikan ID pengguna ditemukan

    // Perbarui data pengguna
   $result =  $user->update($data);
   if($result){
       return response()->json(['message' => 'Data pengguna berhasil diperbarui'], 200);

   }else{
    return response()->json(['message' => 'Data pengguna berhasil diperbarui'], 200);

   }

    // Mengembalikan pesan sukses
}


    public function updatePassword(Request $request){
        //validasi
        $data = $request->validate([
            'current_password' => 'required|min:5|max:100',
            'new_password' => 'required|min:5|max:100',
            'confirm_password' => 'required|min:5|max:100',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            if($request->new_password == $request->confirm_password){
                $user = User::findOrFail(auth()->user()->id); // Pastikan ID pengguna ditemukan
                $user->update(['password' => Hash::make($request->new_password)]);
                return response()->json(['message' => 'Password berhasil diperbarui']);

            }
        }
         return response()->json(['message' => 'Gagal memperbarui password'], 422);

    }

    
}
