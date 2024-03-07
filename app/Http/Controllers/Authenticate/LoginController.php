<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('authenticat.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        if (auth()->user()->level === 'admin') {
             return redirect()->route('dashboard.show');
        } else {
             return redirect()->route('home.show');
        }
    }


        return back()->with('error','Login Gagal');
    }
}
