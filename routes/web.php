<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FasilitasDesaController;
use App\Http\Controllers\PengalamanWisataController;
use App\Http\Controllers\GaleriDesaController;
use App\Http\Controllers\ObjekWisataController;
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


//DAPAT DIAKSES TANPA LOGIN

// Profil
Route::get('/profil-desa/{data}', [App\Http\Controllers\ProfilDesaController::class, 'view']);

//Fasilitas
Route::get('/fasilitas-desa/{data}', [App\Http\Controllers\FasilitasDesaController::class, 'view']);
Route::get('/detail-fasilitas/{id}', [FasilitasDesaController::class, 'getFasilitas']);
// Route::get('/fasilitas-pariwisata', function () {
//     return view('fasilitas-pariwisata');
// });

Route::get('/kategori-wisata/{kategori}', [App\Http\Controllers\KategoriWisataController::class, 'viewKategori']);

Route::get('/paket-wisata', [App\Http\Controllers\PaketWisataController::class, 'index']);

Route::get('/detail-paket-wisata/{paket}', [App\Http\Controllers\PaketWisataController::class, 'viewPaket']);

Route::get('/pengalaman-wisata', [PengalamanWisataController::class, 'index']);

Route::get('/wisata-desa-detail/{objek}', [App\Http\Controllers\ObjekWisataController::class, 'viewObjek']);
Route::get('/detail-wisata/{id}', [ObjekWisataController::class, 'getWisataDetail']);

Route::get('/pengalaman-wisata-detail/{pengalaman}', [App\Http\Controllers\PengalamanWisataController::class, 'viewPengalaman']);

Route::get('/berita', [App\Http\Controllers\BeritaDesaController::class, 'index']);

Route::get('/berita-detail/{berita}', [App\Http\Controllers\BeritaDesaController::class, 'viewBerita']);

Route::get('/galeri-foto', [App\Http\Controllers\GaleriDesaController::class, 'viewKategori']);

Route::get('/galeri-berdasarkan-aktivitas/{kategori}', [App\Http\Controllers\GaleriDesaController::class, 'viewSubKategori']);

Route::get('/detail-foto/{subKategori}', [App\Http\Controllers\GaleriDesaController::class, 'viewDetail']);



Route::get('/detail-paket-wisata', function () {
    return view('detail-paket-wisata');
});

// PENGUNJUNG
Route::middleware(['pengunjung', 'auth'])->group(function () {
    Route::get('/create-blog', function () {
        return view('create-blog');
    });
    Route::post('/save-blog', [PengalamanWisataController::class, 'saveBlog']);
    Route::get('/kategori-pengalaman', [PengalamanWisataController::class, 'getKategori']);
    Route::post('/create-blog', [BlogController::class, 'UploadImage'])->name('create-blog');
});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/booking-wisata', function () {
    return view('booking-paket-wisata');
});

Route::get('/detail-artikel-member/{id}', [PengalamanWisataController::class, 'getArticleDetail']);

Route::get('/riwayat-pemesanan/{id}', [App\Http\Controllers\PaketWisataController::class, 'riwayatPesanan']);

// ADMIN
Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'indexAdmin']);
    Route::get('/kelola-profil', function () {
        return view('admin.kelola-profil');
    });

    //Kelola Pengalaman Wisata
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

    // PENTING BUAT UPLOAD GAMBAR PAKAI CONTENT BUILDER
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

    //Kelola Pesanan Paket Wisata
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

    //Kelola FOTO
    Route::get('/kelola-kat-galeri', [GaleriDesaController::class, 'kelolaKategori']);
    Route::get('/tambah-kat-galeri', [GaleriDesaController::class, 'tambahKategori']);
    Route::post('/save-kat-galeri', [GaleriDesaController::class, 'saveKat']);
    Route::get('/{kategori}/edit-kat-galeri', [GaleriDesaController::class, 'editKategori']);
    Route::patch('/save-kat-galeri/{kategori}', [GaleriDesaController::class, 'saveEditKat']);
    Route::delete('/hapus-kat-galeri/{kategori}', [GaleriDesaController::class, 'hapusKategori']);

    Route::get('/kelola-galeri', [GaleriDesaController::class, 'kelolaGaleri']);
    Route::get('/kelola-galeri/{kategori}', [GaleriDesaController::class, 'kelolaGaleri']);
    Route::get('/tambah-foto', [GaleriDesaController::class, 'tambahFoto']);
    Route::post('save-new-galeri', [GaleriDesaController::class, 'saveGaleri']);
    Route::get('/detail-galeri/{galeri}', [GaleriDesaController::class, 'viewGaleriByAdmin']);
    Route::get('/{galeri}/edit-galeri', [GaleriDesaController::class, 'editGaleri']);
    Route::patch('/save-galeri/{galeri}', [GaleriDesaController::class, 'saveEditGaleri']);
    Route::delete('/hapus-galeri/{galeri}', [GaleriDesaController::class, 'hapusGaleri']);

    //Kelola Objek Wisata
    Route::get('/kelola-kat-wisata', [ObjekWisataController::class, 'kelolaKategori']);
    Route::get('/tambah-kat-wisata', [ObjekWisataController::class, 'tambahKategori']);
    Route::post('/save-kat-wisata', [ObjekWisataController::class, 'saveKat']);
    Route::get('/{kategori}/edit-kat-wisata', [ObjekWisataController::class, 'editKategori']);
    Route::patch('/save-kat-wisata/{kategori}', [ObjekWisataController::class, 'saveEditKat']);
    Route::get('/kat-wisata/delete/{kategori}', [ObjekWisataController::class, 'hapusKategori']);
    // Route::delete('/hapus-kat-wisata/{kategori}', [ObjekWisataController::class, 'hapusKategori']);

    Route::get('/kelola-wisata', [ObjekWisataController::class, 'kelolaObjek']);
    Route::get('/kelola-wisata/{kat_id}', [ObjekWisataController::class, 'kelolaObjek']);

    Route::get('/detail-wisata-admin/{objek}', function () {
        return view('admin.wisata-desa-view');
    });

    Route::get('/{kategori}/edit-wisata', [ObjekWisataController::class, 'editKategori']);
    Route::post('/save-wisata/{objek}', [ObjekWisataController::class, 'saveEditWisata']);
    Route::get('/edit-obj-wisata/{objek}', [ObjekWisataController::class, 'editWisata']);
    Route::get('/hapus-wisata/{objek}', [ObjekWisataController::class, 'hapusObjek']);

    Route::get('/detail-objek/{id}', [ObjekWisataController::class, 'getObjek']);

    Route::get('/tambah-objek', function () {
        return view('admin.wisata-desa-tambah');
    });
    Route::post('/simpan-objek', [ObjekWisataController::class, 'tambahObjek']);
    Route::get('/list-kat-wisata', [ObjekWisataController::class, 'getListKategori']);

    // Route::get('/pengalaman-wisata-detail/{pengalaman}', [App\Http\Controllers\PengalamanWisataController::class, 'viewPengalaman']);
    // KELOLA ARTIKEL FO ALL
    Route::get('/list-menu', [PengalamanWisataController::class, 'getKategori']);

    // Route::get('/lihat-artikel/{id_article}', function () {
    //     return view('admin.lihat-artikel');
    // });
    // Route::get('/detail-artikel-view/{id}', [PengalamanWisataController::class, 'getArticleDetail']);
    //

    // KELOLA FASILITAS (COBA UNTUK SEMUA ARTIKEL)

    Route::get('/kelola-fasilitas', [FasilitasDesaController::class, 'index']);

    Route::get('/tambah-fasilitas', function () {
        return view('admin.fasilitas-tambah');
    });
    Route::post('/simpan-fasilitas', [FasilitasDesaController::class, 'tambahFasilitas']);

    Route::get('/lihat-fasilitas/{id}', function () {
        return view('admin.fasilitas-view');
    });
    // Route::get('/detail-wisata/{id}', [ObjekWisataController::class, 'getWisataDetail']);

    Route::get('/detail-fasilitas/delete/{id}', [FasilitasDesaController::class, 'deleteFasilitas']);

    Route::get('/edit-fasilitas/{id}', function () {
        return view('admin.fasilitas-edit');
    });
    Route::post('/update-artikel/{id}', [FasilitasDesaController::class, 'updateFasilitas']);

    // END: KELOLA FASILITAS (COBA UNTUK SEMUA ARTIKEL)



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
