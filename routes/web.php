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

Route::get('/', function () {
    return view('home');
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
Route::get('/detail-wisata', function () {
    return view('detail-wisata');
});
Route::get('/create-blog', function () {
    return view('create-blog');
});
Route::get('/wisata-desa', function () {
    return view('wisata-desa');
});
Route::get('/pengalaman-wisata-detail', function () {
    return view('pengalaman-wisata-detail');
});
Route::post('/create-blog', [BlogController::class, 'UploadImage']);
