<?php


//admin
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\PemesananController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\ProdukSizeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UpdatePasswordController;

//authicate
use App\Http\Controllers\Authenticate\RegisterController;
use App\Http\Controllers\Authenticate\LogoutController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Authenticate\ForgotController;

//user
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\KeranjangController;
use App\Http\Controllers\User\DetailProdukController;
use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\PemesananController as UserPemesananController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\User\PesananSayaController as UserPesananSayaController;
use App\Http\Controllers\User\PemesananDetailController as UserPemesananDetailController;
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
//dashboard
Route::get('/dashboard',[DashboardController::class ,'show'])->name('dashboard.show');
//produk
Route::get('/produk',[ProdukController::class ,'show'])->name('produk.show');
Route::get('/produk-create',[ProdukController::class ,'create'])->name('produk.create');
Route::post('/produk-store',[ProdukController::class ,'store'])->name('produk.store');
Route::delete('/produk-delete/{id}',[ProdukController::class ,'destroy'])->name('produk.destroy');
Route::get('/produk-edit/{slug}',[ProdukController::class ,'edit'])->name('produk.edit');
Route::post('/produk-update/{id}',[ProdukController::class ,'update'])->name('produk.update');

//kategori
Route::get('/kategori',[CategoryController::class ,'show'])->name('kategori.show');
Route::get('/kategori-create',[CategoryController::class ,'create'])->name('kategori.create');
Route::post('/kategori-store',[CategoryController::class ,'store'])->name('kategori.store');
Route::get('/edit-kategori/{slug}',[CategoryController::class ,'edit'])->name('kategori.edit');
Route::post('/edit-kategori/{slug}',[CategoryController::class ,'update'])->name('kategori.update');
Route::delete('/kategori-delete/{id}',[CategoryController::class ,'destroy'])->name('kategori.destroy');

//pengguna

Route::get('/pengguna',[PenggunaController::class ,'show'])->name('pengguna.show');
Route::get('/pengguna-create',[PenggunaController::class ,'create'])->name('pengguna.create');
Route::post('/pengguna-store',[PenggunaController::class ,'store'])->name('pengguna.store');
Route::get('/pengguna-edit/{id}',[PenggunaController::class ,'edit'])->name('pengguna.edit');
Route::post('/pengguna-update/{id}',[PenggunaController::class ,'update'])->name('pengguna.update');
Route::delete('/pengguna-delete/{id}',[PenggunaController::class ,'destroy'])->name('pengguna.destroy');

//order
Route::get('/order',[OrderController::class ,'show'])->name('order.show');
Route::post('/order-konfirmasi/{id}',[OrderController::class ,'konfirmasiOrder'])->name('order.konfirmasi');
Route::post('/order-cancel/{id}',[OrderController::class ,'batalkanOrder'])->name('order.cancel');

//authenticate
Route::post('/logout',[LogoutController::class ,'logout'])->name('logout');

Route::post('/profile/ubah-admin', [ProfileController::class, 'update']);
Route::post('/profile/ubah-password-admin', [ProfileController::class, 'updatePassword']);
Route::get('/profile-admin', [ProfileController::class, 'index']);
Route::get('/detail-stok/{id}', [ProdukController::class, 'stokUkuran']);

//stok size produk
Route::get('/produk-size/{id}', [ProdukSizeController::class, 'show'])->name('produkSize.show');
Route::get('/tambah-produk-size/{id}', [ProdukSizeController::class, 'create'])->name('produkSize.create');
Route::post('/produk-size/{id}', [ProdukSizeController::class, 'store'])->name('produkSize.store');
Route::get('/edit-produk-size/{id}', [ProdukSizeController::class, 'edit'])->name('produkSize.edit');
Route::post('/update-produk-size/{id}', [ProdukSizeController::class, 'update'])->name('produkSize.update');

});

Route::middleware(['auth'])->group(function () {
    //keranjang
    Route::get('/keranjang', [KeranjangController::class, 'show'])->name('keranjang.show');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    //deatail produk
    Route::post('/detail-produk/{slug}', [DetailProdukController::class, 'store'])->name('detail.store');
    //profile user
    Route::post('/profile/ubah', [UserProfileController::class, 'update']);
    Route::post('/profile/ubah-password', [UserProfileController::class, 'updatePassword']);
    Route::get('/profile', [UserProfileController::class, 'index']);

    //ongkir
    Route::post('/get-shipping-cost', [userPemesananController::class, 'getShippingCost']);
    //pesanan
    Route::get('/pesanan-saya', [UserPesananSayaController::class, 'show'])->name('pesanan.show');
    Route::post('/pesanan-saya', [UserPesananSayaController::class, 'detailPesanan'])->name('pesanan.detailPesanan');

    Route::get('/pemesanan/{slug}', [UserPemesananController::class, 'show'])->name('pemesanan.show');
    Route::post('/pemesanan/{slug}', [UserPemesananController::class, 'store'])->name('pemesanan.store');
    Route::post('/logout',[LogoutController::class ,'logout'])->name('logout');

});
    //guest
    Route::get('/detail-produk/{slug}', [DetailProdukController::class, 'index'])->name('detail.show');
    Route::get('/', [HomeController::class, 'show'])->name('home.show');
    Route::post('/produk', [HomeController::class, 'search'])->name('search');
    Route::get('/kategori/{slug}', [UserCategoryController::class,  'index']);
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    //for got password
    Route::get('/forgot-password',[ForgotController::class,'request'])->middleware('guest')->name('password.request');
    Route::post('/forgot-password',[ForgotController::class,'email'])->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}',[ForgotController::class,'reset'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password',[ForgotController::class,'update'])->middleware('guest')->name('password.update');



