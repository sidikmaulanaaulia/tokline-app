<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function index(){
        return view('authenticat.register');
    }

public function store(Request $request): RedirectResponse
{
    $request->validate([
        'username' => 'required|min:5|max:255',
        'email' => 'required|email:dns|max:255',
        'password' => 'required|min:5|max:100',
        'confirm_password' => 'required|min:5|max:100',
    ]);

    if($request->password == $request->confirm_password){
        $user = new User;
        $user->nama = $request->username;
        $user->email = $request->email;
        $passwordHased =  Hash::make($request['password']);
        $user->password = $passwordHased;
        $result = $user->save();

        if($result){
            return redirect("/register")->with('success','Berhasil Daftar');
        }else{
            return redirect("/register")->with('error','Gagal Daftar');
        }

}
    }




}
