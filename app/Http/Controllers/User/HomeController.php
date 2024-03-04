<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $data = Produk::limit(12)->get();
        $category = Category::all();
        return view('user.index',compact('data','category'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $produk = Produk::limit(12)->get();
        $data = Produk::where('nama_produk', 'like', '%'.$searchTerm.'%')->get();
        return view('user.searchProduk', compact('data', 'searchTerm','produk'));
    }
}
