<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProdukSizeController;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\PemesananController as UserPemesananController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\User\PesananSayaController as UserPesananSayaController;
use App\Http\Controllers\User\PemesananDetailController as UserPemesananDetailController;
use App\Http\Controllers\User\DetailProdukController;
use App\Http\Controllers\User\CategoryController as UserCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['admin'])->group(function () {

Route::get('/dashboard',[DashboardController::class ,'index']);
Route::get('/produk',[ProdukController::class ,'index']);
Route::get('/produk/tambah-produk',[ProdukController::class ,'tambahProduk']);
Route::post('/produk/tambah-produk',[ProdukController::class ,'store']);
Route::get('/hapusproduk/{id}',[ProdukController::class ,'delete']);
Route::get('/edit/{slug}',[ProdukController::class ,'update']);
Route::post('/edit/{id}',[ProdukController::class ,'updateProduk']);
Route::get('/kategori',[CategoryController::class ,'index']);
Route::get('/tambah-kategori',[CategoryController::class ,'tambahKategori']);
Route::post('/tambah-kategori',[CategoryController::class ,'tambahDataKategori']);
Route::get('/hapus-data-kategori/{id}',[CategoryController::class ,'hapusDataKategori']);
Route::get('/edit-kategori/{slug}',[CategoryController::class ,'updateCategory']);
Route::post('/edit-kategori/{id}',[CategoryController::class ,'update']);
Route::get('/pengguna',[PenggunaController::class ,'index']);
Route::get('/pengguna/tambah-pengguna',[PenggunaController::class ,'tambahPengguna']);
Route::post('/pengguna/tambah-pengguna',[PenggunaController::class ,'tambahDataPengguna']);
Route::get('/pengguna/{id}',[PenggunaController::class ,'hapusPengguna']);
Route::get('/edit-pengguna/{id}',[PenggunaController::class ,'editPengguna']);
Route::post('/edit-pengguna/{id}',[PenggunaController::class ,'editDataPengguna']);
Route::get('/order',[OrderController::class ,'index']);
Route::get('/order-konfirmasi/{id}',[OrderController::class ,'konfirmasiOrder']);
Route::get('/order-batalkan/{id}',[OrderController::class ,'batalkanOrder']);
Route::post('/logout',[LogoutController::class ,'logout']);
Route::get('/coba', [CobaController::class, 'index']);
Route::post('/coba/{id}', [CobaController::class, 'update']);
Route::post('/profile/ubah-admin', [ProfileController::class, 'update']);
    Route::post('/profile/ubah-password-admin', [ProfileController::class, 'updatePassword']);
    Route::get('/profile-admin', [ProfileController::class, 'index']);
Route::get('/detail-stok/{id}', [ProdukController::class, 'stokUkuran']);
Route::get('/produk-size/{id}', [ProdukSizeController::class, 'index']);
Route::get('/tambah-produk-size/{id}', [ProdukSizeController::class, 'create']);
Route::post('/produk-size/{id}', [ProdukSizeController::class, 'store']);
Route::get('/edit-produk-size/{id}', [ProdukSizeController::class, 'edit']);
Route::post('/update-produk-size/{id}', [ProdukSizeController::class, 'update']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    Route::get('/keranjang/{slug}', [KeranjangController::class, 'delete']);
    Route::post('/logout',[LogoutController::class ,'logout']);
    Route::post('/detail-produk/{slug}', [DetailProdukController::class, 'storeProduk']);
    Route::post('/profile/ubah', [UserProfileController::class, 'update']);
    Route::post('/profile/ubah-password', [UserProfileController::class, 'updatePassword']);
    Route::get('/profile', [UserProfileController::class, 'index']);
    Route::post('/get-shipping-cost', [userPemesananController::class, 'getShippingCost']);
    Route::get('/pemesanan/{slug}', [UserPemesananController::class, 'index']);
    Route::post('/pemesanan/{slug}', [UserPemesananController::class, 'store']);
    Route::get('/pesanan-saya', [UserPesananSayaController::class, 'index']);
    Route::post('/pesanan-saya', [UserPesananSayaController::class, 'detailPesanan']);

});

    Route::get('/detail-produk/{slug}', [DetailProdukController::class, 'index']);
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/produk', [HomeController::class, 'search']);
    Route::get('/kategori/{slug}', [UserCategoryController::class,  'index']);
    Route::get('/detail-produk/{slug}', [DetailProdukController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/test', [AuthController::class, 'login']);

    //transkasi



