<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login/{provide}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provide}/callback', [LoginController::class, 'handleProviderCallback']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/kategori-pengalaman', [PengalamanWisataController::class, 'getKategori']);

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

Route::get('/pengalaman-wisata', [PengalamanWisataController::class, 'index']);

Route::get('/wisata-desa-detail/{objek}', [App\Http\Controllers\ObjekWisataController::class, 'viewObjek']);


Route::get('/pengalaman-wisata-detail/{pengalaman}', [App\Http\Controllers\PengalamanWisataController::class, 'viewPengalaman']);
Route::get('/detail-artikel-member/{id}', [PengalamanWisataController::class, 'getArticleDetail']);


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


// ADMIN
Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'indexAdmin']);
    Route::get('/kelola-profil', function () {
        return view('admin.kelola-profil');
    });
    Route::get('/all-articles', [PengalamanWisataController::class, 'getAllArticles']);
    Route::get('/kelola-artikel', [PengalamanWisataController::class, 'kelolaArtikel']);
    Route::get('/detail-artikel/delete/{id}', [PengalamanWisataController::class, 'deleteArtikel']);
    Route::get('/edit-artikel/{id}', function () {
        return view('admin.edit-artikel');
    });
    Route::get('/edit-artikel-approve/{id}', function () {
        return view('admin.edit-artikel-approve');
    });
    Route::get('/tambah-artikel', function () {
        return view('admin.tambah-artikel');
    });
    Route::post('/save-blog-admin', [PengalamanWisataController::class, 'saveBlog']);
    Route::post('/tambah-artikel', [BlogController::class, 'UploadImage'])->name('tambah-artikel');
    Route::post('/tambah-artikel/url', [BlogController::class, 'UploadImageURL']);

    Route::post('/edit-artikel/{id}', [PengalamanWisataController::class, 'updateArtikel']);
    Route::get('/detail-artikel/{id_article}', function () {
        return view('admin.detail-artikel');
    });
    Route::get('/lihat-artikel/{id_article}', function () {
        return view('admin.lihat-artikel');
    });
    Route::get('/detail-artikel-view/{id}', [PengalamanWisataController::class, 'getArticleDetail']);

    Route::post('/approve-artikel', [PengalamanWisataController::class, 'approveArtkel']);

    Route::get('/kelola-pesanan', function () {
        return view('admin.kelola-pesanan');
    });

    Route::post('/tambah-user', [RegisterController::class, 'tambahUser']);

    Route::get('/user-data', [RegisterController::class, 'getUserData']);
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
});

// END

Route::middleware(['pengunjung', 'auth'])->group(function () {
    Route::get('/create-blog', function () {
        return view('create-blog');
    });
    Route::post('/save-blog', [PengalamanWisataController::class, 'saveBlog']);
    Route::post('/create-blog', [BlogController::class, 'UploadImage'])->name('create-blog');
});





