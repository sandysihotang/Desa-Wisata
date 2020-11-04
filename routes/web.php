<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Auth\LoginController;

Route::get('/login/{provide}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provide}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('home-page');
});

Route::get('/kategori-wisata', function () {
    return view('kategori-wisata');
});

Route::get('/paket-wisata', function () {
    return view('paket-wisata');
});

Route::get('/detail-paket-wisata', function () {
    return view('detail-paket-wisata');
});

Route::get('/booking-wisata', function () {
    return view('booking-paket-wisata');
});

Route::get('/pengalaman-wisata', function () {
    return view('pengalaman-wisata');
});

Route::get('/login', function () {
    return view('authentication.login');
});

Route::get('/register', function () {
    return view('authentication.register');
});

Route::get('/forgot-password', function () {
    return view('authentication.lupa-password');
});

Route::get('/reset-password', function () {
    return view('authentication.reset-password');
});

Route::get('/create-blog', function () {
    return view('create-blog');
});

Route::get('/wisata-desa-detail', function () {
    return view('wisata-desa-detail');
});

Route::get('/pengalaman-wisata-detail', function () {
    return view('pengalaman-wisata-detail');
});

Route::get('/galeri-foto', function () {
    return view('galeri-foto');
});

Route::get('/galeri-berdasarkan-aktivitas', function () {
    return view('galeri-berdasarkan-aktivitas');
});

Route::get('/detail-foto', function () {
    return view('detail-foto');
});

Route::get('/fasilitas-pariwisata', function () {
    return view('fasilitas-pariwisata');
});

Route::get('/detail-paket-wisata', function () {
    return view('detail-paket-wisata');
});

Route::get('/riwayat-pemesanan', function () {
    return view('riwayat-pemesanan');
});

Route::post('/create-blog', [BlogController::class, 'UploadImage']);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin
Route::get('/home-admin', function () {
    return view('admin.home-admin');
});

Route::get('/kelola-artikel', function () {
    return view('admin.kelola-artikel');
});





Route::get('/tambah-user', function () {
    return view('admin.tambah-user');
});

Route::get('/tambah-menu', function () {
    return view('admin.tambah-menu');
});

Route::get('/tambah-submenu', function () {
    return view('admin.tambah-submenu');
});

Route::get('/admin', function () {
    return view('admin.home-admin');
});

Route::get('/tambah-menu', function () {
    return view('admin.tambah-menu');
});

Route::get('/tambah-submenu', function () {
    return view('admin.tambah-submenu');
});
