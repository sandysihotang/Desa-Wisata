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

//Authentication
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/forgot-password', [LoginController::class, 'forgotPassword']);
Route::get('/reset-password', [LoginController::class, 'resetPassword']);
Route::get('/login/{provide}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provide}/callback', [LoginController::class, 'handleProviderCallback']);

// ADMIN
Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'indexAdmin']);
    Route::get('/kelola-profil', function () {
        return view('admin.kelola-profil');
    });

    Route::get('/kelola-artikel', function () {
        return view('admin.kelola-artikel');
    });
    Route::get('/tambah-artikel', function () {
        return view('admin.tambah-artikel');
    });
    Route::get('/detail-artikel', function () {
        return view('admin.detail-artikel');
    });
    Route::get('/konfirmasi-artikel', function () {
        return view('admin.konfirmasi-artikel');
    });

    Route::get('/kelola-pesanan', function () {
        return view('admin.kelola-pesanan');
    });
    Route::get('/kelola-pesanan', function () {
        return view('admin.kelola-pesanan');
    });

    Route::get('/kelola-user', function () {
        return view('admin.kelola-user');
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
    Route::get('/backup', function () {
        return view('admin.backup');
    });
});

// END



// PENGUNJUNG
Route::middleware(['pengunjung', 'auth'])->group(function () {
    Route::get('/create-blog', function () {
        return view('create-blog');
    });
    Route::post('/save-blog', [PengalamanWisataController::class, 'saveBlog']);
    Route::post('/create-blog', [BlogController::class, 'UploadImage']);
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

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


Route::get('/galeri-foto', [App\Http\Controllers\GaleriDesaController::class, 'viewKategori']);

Route::get('/galeri-berdasarkan-aktivitas/{kategori}', [App\Http\Controllers\GaleriDesaController::class, 'viewSubKategori']);

Route::get('/detail-foto/{subKategori}', [App\Http\Controllers\GaleriDesaController::class, 'viewDetail']);

Route::get('/fasilitas-pariwisata', function () {
    return view('fasilitas-pariwisata');
});

Route::get('/detail-paket-wisata', function () {
    return view('detail-paket-wisata');
});

Route::get('/riwayat-pemesanan/{id}', [App\Http\Controllers\PaketWisataController::class, 'riwayatPesanan']);

Route::get('/berita', [App\Http\Controllers\BeritaDesaController::class, 'index']);

Route::get('/berita-detail/{berita}', [App\Http\Controllers\BeritaDesaController::class, 'viewBerita']);




