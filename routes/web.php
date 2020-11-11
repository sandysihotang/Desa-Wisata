<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PengalamanWisataController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/login', [LoginController::class,'showLoginForm']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('authentication.register');
});
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login/{provide}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provide}/callback', [LoginController::class, 'handleProviderCallback']);

Route::post('/save-blog',[PengalamanWisataController::class, 'saveBlog']);

Route::get('/kategori-wisata', function () {
    return view('kategori-wisata');
});
// PENGUNJUNG

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('home-page');
// });

// Profil

Route::get('/tentang/{data}', [App\Http\Controllers\ProfilDesaController::class, 'viewTentang']);
Route::get('/lokasi/{data}', [App\Http\Controllers\ProfilDesaController::class, 'viewLokasi']);
Route::get('/potensi/{data}', [App\Http\Controllers\ProfilDesaController::class, 'viewPotensi']);
Route::get('/kelembagaan/{data}', [App\Http\Controllers\ProfilDesaController::class, 'viewKelembagaan']);

//Fasilitas
Route::get('/fasilitas-pariwisata/{data}', [App\Http\Controllers\FasilitasDesaController::class, 'viewPariwisata']);
Route::get('/fasilitas-umum/{data}', [App\Http\Controllers\FasilitasDesaController::class, 'viewUmum']);
Route::get('/aksesibilitas/{data}', [App\Http\Controllers\FasilitasDesaController::class, 'viewAksesibilitas']);

Route::get('/kategori-wisata/{kategori}', [App\Http\Controllers\KategoriWisataController::class, 'viewKategori']);

Route::get('/paket-wisata', [App\Http\Controllers\PaketWisataController::class, 'index']);

Route::get('/detail-paket-wisata/{paket}', [App\Http\Controllers\PaketWisataController::class, 'viewPaket']);


Route::get('/booking-wisata', function () {
    return view('booking-paket-wisata');
});

Route::get('/pengalaman-wisata', function () {
    return view('pengalaman-wisata');
});

Route::get('/wisata-desa-detail/{objek}', [App\Http\Controllers\ObjekWisataController::class, 'viewObjek']);

Route::get('/pengalaman-wisata-detail/{pengalaman}', [App\Http\Controllers\PengalamanWisataController::class, 'viewPengalaman']);



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

Route::get('/berita', [App\Http\Controllers\BeritaDesaController::class, 'index']);

Route::get('/berita-detail/{berita}', [App\Http\Controllers\BeritaDesaController::class, 'viewBerita']);


// ADMIN

Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'indexAdmin']);

Route::get('/kelola-profil', function () {
    return view('admin.kelola-profil');
});

Route::get('/kelola-artikel', function () {
    return view('admin.kelola-artikel');
});

Route::get('/detail-artikel', function () {
    return view('admin.detail-artikel');
});

Route::get('/kelola-pesanan', function () {
    return view('admin.kelola-pesanan');
});

Route::get('/kelola-user', function () {
    return view('admin.kelola-user');
});

Route::get('/konfirmasi-artikel', function () {
    return view('admin.konfirmasi-artikel');
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

Route::get('/backup', function () {
    return view('admin.backup');
});

// END

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



Route::post('/create-blog', [BlogController::class, 'UploadImage']);

//Auth::routes();



