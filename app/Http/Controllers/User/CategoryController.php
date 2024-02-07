<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produk;

class CategoryController extends Controller
{
    public function index($slug){
        $daftar_kategori = Category::all();
        $category = Category::where('slug', $slug)->first();
        $data = $category->produk;
        return view('kategori' , compact('data','daftar_kategori'));

    }
}
