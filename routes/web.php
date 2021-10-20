<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FasilitasDesaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PengalamanWisataController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\GaleriDesaController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BeritaDesaController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\KontakPengelolaController;
use App\Http\Controllers\AktivitasWisataController;
use App\Http\Controllers\LinkSocialMediaController;
use App\Models\Role;
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

//Authentication
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//Route::get('/test', function (){
//    return view('test');
//});
Route::get('/kontak-pengelola', [KontakPengelolaController::class, 'getKontak']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login/{provide}', [LoginController::class, 'redirectToProvider']);
Route::get('/login/{provide}/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('/get-isi-menu/{id}', [MenuController::class, 'getMenu']);
Route::get('/get-isi-submenu/{id}', [MenuController::class, 'getIsiSubMenu']);
Route::get('/get-isi-subsubmenu/{id}', [MenuController::class, 'getIsiSubSubMenu']);
Route::post('/getsearch', [HomeController::class, 'search']);
Route::get('/search', function () {
    return view('search');
});
Route::get('/menu/{id}', [MenuController::class, 'viewMenu']);
Route::get('/submenu/{id}', [MenuController::class, 'viewSubMenu']);
Route::get('/subsubmenu/{id}', [MenuController::class, 'viewSubSubMenu']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'resetPasswordForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/kategori-pengalaman', [PengalamanWisataController::class, 'getKategori']);


//DAPAT DIAKSES TANPA LOGIN

Route::get('/profil-desa/{data}', [ProfilDesaController::class, 'view']);

Route::get('/fasilitas-desa/{data}', [FasilitasDesaController::class, 'view']);

Route::get('/detail-fasilitas/{id}', [FasilitasDesaController::class, 'getFasilitas']);

Route::get('/detail-profil-desa/{id}', [ProfilDesaController::class, 'getProfil']);


Route::get('/paket-wisata', [PaketWisataController::class, 'index']);

Route::get('/detail-paket-wisata/{paket}', [PaketWisataController::class, 'viewPaket']);

Route::get('/pengalaman-wisata', [PengalamanWisataController::class, 'index']);

Route::get('/kontak', [KontakPengelolaController::class, 'indexPengunjung']);

Route::get('/get-paket/{id}', [PaketWisataController::class, 'getPaketDetail']);

Route::get('/kategori-wisata/{kategori}', [ObjekWisataController::class, 'viewKategori']);

Route::get('/wisata-desa-detail/{objek}', [ObjekWisataController::class, 'viewObjek']);
Route::get('/detail-wisata/{id}', [ObjekWisataController::class, 'getWisataDetail']);

Route::get('/aktivitas-wisata-all', [AktivitasWisataController::class, 'viewAktivitasAll']);

Route::get('/all-aktivitas', [AktivitasWisataController::class, 'getAktivitaAll']);

Route::get('/aktivitas-wisata-detail/{aktivitas}', [AktivitasWisataController::class, 'viewAktivitas']);

Route::get('/detail-aktivitas/{id}', [AktivitasWisataController::class, 'getAktivitasDetail']);

Route::get('/pengalaman-wisata-detail/{pengalaman}', [PengalamanWisataController::class, 'viewPengalaman']);

Route::get('/berita', [BeritaDesaController::class, 'index']);

Route::get('/berita-detail/{berita}', [BeritaDesaController::class, 'viewBerita']);

Route::get('/detail-berita/{id}', [BeritaDesaController::class, 'getBerita']);
Route::post('/create-blog', [BlogController::class, 'UploadImage'])->name('create-blog');

Route::get('/galeri-foto', [GaleriDesaController::class, 'viewKategori']);

Route::get('/galeri-berdasarkan-aktivitas/{kategori}', [GaleriDesaController::class, 'viewSubKategori']);

Route::get('/detail-foto/{subKategori}', [GaleriDesaController::class, 'viewDetail']);


Route::post('/create-blog', [BlogController::class, 'UploadImage'])->name('create-blog');

Route::get('/get-paket/{id}', [PaketWisataController::class, 'getPaketDetail']);

// PENGUNJUNG
Route::middleware(['pengunjung', 'auth'])->group(function () {
    Route::get('/create-blog', function () {
        return view('create-blog');
    });
    Route::get('/get-user-member', [UserController::class, 'getUserLogin']);
    Route::get('/pengalaman-saya', [PengalamanWisataController::class, 'pengalamanSaya']);
    Route::get('/edit-pengalaman/{id}', function () {
        return view('edit-pengalaman');
    });
    Route::post('/edit-pengalaman/{id}', [PengalamanWisataController::class, 'updateArtikel']);

    Route::get('/detail-artikel-edit/{id}', [PengalamanWisataController::class, 'getArticleDetail']);
    Route::post('/edit-profile', [UserController::class, 'editProfile']);
    Route::post('/ubah-password-profile', [UserController::class, 'ubahPasswordProfile']);
    Route::get('/edit-profile', function () {
        return view('edit-profile');
    });
    Route::post('/save-blog', [PengalamanWisataController::class, 'saveBlog']);
});


Route::get('/', [HomeController::class, 'index']);
Route::get('/pengunjung-for-admin', [HomeController::class, 'indexPengunjungByAdmin']);

Route::get('/booking-wisata/{paket}', [PaketWisataController::class, 'formBooking']);

Route::post('/save-booking/{paket}', [PaketWisataController::class, 'saveBooking']);

Route::get('/detail-artikel-member/{id}', [PengalamanWisataController::class, 'getArticleDetail']);

Route::get('/riwayat-pemesanan', [PaketWisataController::class, 'riwayatPesanan']);
Route::get('/riwayat-pemesanan/lihat/{id}', [PaketWisataController::class, 'viewPesanan']);
Route::get('/riwayat-pemesanan/edit/{id}', [PaketWisataController::class, 'editPesanan']);
Route::post('/riwayat-pemesanan/editSave/{id}', [PaketWisataController::class, 'saveEditPesanan']);
Route::get('/riwayat-pemesanan/batal/{id}', [PaketWisataController::class, 'statusBatalPengunjung']);

// ADMIN
Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/nama-menu/{id}', function ($id) {
        return response()->json(\App\Models\Menu::find($id));
    });
    Route::get('/nama-submenu/{id}', function ($id) {
        return response()->json(\App\Models\SubMenu::find($id));
    });
    Route::get('/home-admin', [HomeController::class, 'indexAdmin']);

    Route::get('/download-user-manual', [ProfilDesaController::class, 'downloadUserManual']);

    Route::get('/kelola-logo-desa', [ProfilDesaController::class, 'kelolaLogo']);
    Route::get('/link-social-media', function () {
        return view('admin.social-media');
    });
    Route::patch('/save-logo/{id}', [ProfilDesaController::class, 'saveLogo']);

    Route::get('search-admin', function () {
        return view('admin.search-admin');
    });

    Route::get('/admin-tambah-menu', function () {
        return view('admin.admin-tambah-menu');
    });
    Route::get('/get-all-link', [LinkSocialMediaController::class, 'getAllLink']);
    Route::post('/simpan-menu-baru', [MenuController::class, 'buatMenu']);

    Route::post('/simpan-link', [LinkSocialMediaController::class, 'save']);

    Route::post('/tambah-user', [RegisterController::class, 'tambahUser']);

    Route::get('/user-data', [RegisterController::class, 'getUserData']);
    Route::get('/kelola-user', [UserController::class, 'kelolaUser']);

    //Kelola Pengalaman Wisata
    Route::get('/all-articles', [PengalamanWisataController::class, 'getAllArticles']);
    Route::get('/kelola-artikel', [PengalamanWisataController::class, 'kelolaArtikel']);
    Route::get('/detail-artikel/delete/{id}', [PengalamanWisataController::class, 'deleteArtikel']);
    Route::get('/detail-artikel/delete-konfirmasi/{id}', [PengalamanWisataController::class, 'deleteArtikelKonfirmasi']);
    Route::get('/hapus-pesanan-paket/{id}', [PengalamanWisataController::class, 'deletePesanan']);
    Route::get('/edit-artikel/{id}', function () {
        return view('admin.edit-artikel');
    });
    Route::get('/edit-user/{id}', function ($id) {
        if (Role::find(Auth::user()->role_id)->nama_role == 'admin') {
            return view('admin.edit-user-2');
        }
        return view('admin.edit-user');
    });
    Route::get('/userspesifik/{id}', [UserController::class, 'getUserSpesifik']);
    Route::post('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::post('/ubahpassword/{id}', [UserController::class, 'ubahPassword']);
    Route::get('/hapus-user/{id}', [UserController::class, 'hapusUser']);
    Route::get('/set-aktif/{id}', [UserController::class, 'setAktif']);
    Route::get('/set-nonaktif/{id}', [UserController::class, 'setNonaktif']);

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

    Route::get('/konfirmasi-artikel', function () {
        return view('admin.konfirmasi-artikel');
    });

    //END Kelola Pengalaman Wisata

    //Kelola Pesanan Paket Wisata
    Route::get('/kelola-pesanan', [PaketWisataController::class, 'kelolaPesanan']);
    Route::get('/detail-pesanan/{pesanan}', [PaketWisataController::class, 'viewPesananByAdmin']);

    Route::get('/tambah-pesanan', [PaketWisataController::class, 'tambahPesanan']);
    Route::post('/save-booking-admin', [PaketWisataController::class, 'saveBookingByAdmin']);

    Route::get('/edit-pesanan/{id}', [PaketWisataController::class, 'editPesananAdmin']);
    Route::post('/update-booking-admin/{pesanan}', [PaketWisataController::class, 'saveEditPesananAdmin']);

    Route::get('/status-pesanan/selesai/{id}', [PaketWisataController::class, 'statusSelesai']);
    Route::get('/status-pesanan/batal/{id}', [PaketWisataController::class, 'statusBatal']);

    //KELOLA PAKET WISATA
    Route::get('/kelola-paket-wisata', [PaketWisataController::class, 'kelolaPaket']);
    Route::get('/tambah-paket', function () {
        return view('admin.paket-tambah');
    });
    Route::post('save-new-paket', [PaketWisataController::class, 'tambahPaket']);
    Route::get('/detail-paket/{paket}', [PaketWisataController::class, 'viewPaketByAdmin']);
    Route::get('/edit-paket/{id}', [PaketWisataController::class, 'editPaket']);
    Route::post('/save-paket/{paket}', [PaketWisataController::class, 'saveEditPaket']);
    Route::get('/detail-paket/delete/{paket}', [PaketWisataController::class, 'hapusPaket']);


    //Kelola FOTO
    Route::get('/kelola-kat-galeri', [GaleriDesaController::class, 'kelolaKategori']);
    Route::get('/tambah-kat-galeri', [GaleriDesaController::class, 'tambahKategori']);
    Route::post('/save-kat-galeri', [GaleriDesaController::class, 'saveKat']);
    Route::get('/{kategori}/edit-kat-galeri', [GaleriDesaController::class, 'editKategori']);
    Route::patch('/save-kat-galeri/{kategori}', [GaleriDesaController::class, 'saveEditKat']);
    Route::get('/hapus-kat-galeri/{kategori}', [GaleriDesaController::class, 'hapusKategori']);

    Route::get('/kelola-galeri', [GaleriDesaController::class, 'kelolaGaleri']);
    Route::get('/kelola-galeri/{kategori}', [GaleriDesaController::class, 'kelolaGaleri']);
    Route::get('/tambah-foto', [GaleriDesaController::class, 'tambahFoto']);
    Route::post('save-new-galeri', [GaleriDesaController::class, 'saveGaleri']);
    Route::get('/detail-galeri/{galeri}', [GaleriDesaController::class, 'viewGaleriByAdmin']);
    Route::get('/{galeri}/edit-galeri', [GaleriDesaController::class, 'editGaleri']);
    Route::patch('/save-galeri/{galeri}', [GaleriDesaController::class, 'saveEditGaleri']);
    Route::get('/hapus-galeri/{galeri}', [GaleriDesaController::class, 'hapusGaleri']);
    Route::get('/hapus-foto/{foto}', [GaleriDesaController::class, 'hapusFoto'])->name('hapusFoto');

    //Kelola Objek Wisata
    Route::get('/kelola-kat-wisata', [ObjekWisataController::class, 'kelolaKategori']);
    Route::post('/save-kat-wisata', [ObjekWisataController::class, 'saveKat']);
    Route::patch('/save-kat-wisata/{kategori}', [ObjekWisataController::class, 'saveEditKat']);
    Route::get('/kat-wisata/delete/{kategori}', [ObjekWisataController::class, 'hapusKategori']);

    Route::get('/kelola-wisata', [ObjekWisataController::class, 'kelolaObjek']);
    Route::get('/kelola-wisata/{kat_id}', [ObjekWisataController::class, 'kelolaObjek']);

    Route::get('/detail-wisata-admin/{objek}', function () {
        return view('admin.wisata-desa-view');
    });

    Route::get('/{kategori}/edit-wisata', [ObjekWisataController::class, 'editKategori']);
    Route::post('/save-wisata/{objek}', [ObjekWisataController::class, 'saveEditWisata']);
    Route::get('/edit-obj-wisata/{objek}', [ObjekWisataController::class, 'editWisata']);
    Route::get('/detail-wisata/delete/{id}', [ObjekWisataController::class, 'hapusObjek']);
    Route::get('/detail-wisata/deleted', [ObjekWisataController::class, 'hapusObjekDetail']);

    Route::get('/detail-objek/{id}', [ObjekWisataController::class, 'getObjek']);

    Route::get('/tambah-objek', function () {
        return view('admin.wisata-desa-tambah');
    });
    Route::post('/simpan-objek', [ObjekWisataController::class, 'tambahObjek']);
    Route::get('/list-kat-wisata', [ObjekWisataController::class, 'getListKategori']);

    // KELOLA FASILITAS

    Route::get('/kelola-fasilitas', [FasilitasDesaController::class, 'index']);

    Route::get('/tambah-fasilitas', function () {
        return view('admin.fasilitas-tambah');
    });
    Route::post('/simpan-fasilitas', [FasilitasDesaController::class, 'tambahFasilitas']);

    Route::get('/lihat-fasilitas/{id}', function () {
        return view('admin.fasilitas-view');
    });

    Route::get('/detail-fasilitas/delete/{id}', [FasilitasDesaController::class, 'deleteFasilitas']);

    Route::get('/edit-fasilitas/{id}', function () {
        return view('admin.fasilitas-edit');
    });
    Route::post('/update-artikel/{id}', [FasilitasDesaController::class, 'updateFasilitas']);

    // KELOLA PROFIL

    Route::get('/kelola-profil-desa', [ProfilDesaController::class, 'index']);

    Route::get('/tambah-profil-desa', function () {
        return view('admin.profil-desa-tambah');
    });
    Route::post('/simpan-profil-desa', [ProfilDesaController::class, 'tambahProfil']);

    Route::get('/lihat-profil-desa/{id}', function () {
        return view('admin.profil-desa-view');
    });

    Route::get('/detail-profil-desa/delete/{id}', [ProfilDesaController::class, 'deleteProfil']);

    Route::get('/edit-profil-desa/{id}', function () {
        return view('admin.profil-desa-edit');
    });
    Route::post('/update-profil-desa/{id}', [ProfilDesaController::class, 'updateProfil']);

    // KELOLA KONTAK PENGELOLA

    Route::get('/kelola-kontak', [KontakPengelolaController::class, 'index']);

    Route::post('/simpan-kontak', [KontakPengelolaController::class, 'create']);

    Route::post('/edit-kontak/{id}', [KontakPengelolaController::class, 'edit']);

    Route::get('/hapus-kontak/{id}', [KontakPengelolaController::class, 'delete']);

    // KELOLA BERITA
    Route::get('/kelola-berita', [BeritaDesaController::class, 'indexAdmin']);

    Route::get('/tambah-berita', function () {
        return view('admin.berita-tambah');
    });
    Route::post('/simpan-berita', [BeritaDesaController::class, 'tambahBerita']);

    Route::get('/lihat-berita/{id}', function () {
        return view('admin.berita-view');
    });

    Route::get('/detail-berita/delete/{id}', [BeritaDesaController::class, 'hapusBerita']);

    Route::get('/edit-berita/{id}', function () {
        return view('admin.berita-edit');
    });
    Route::post('/update-berita/{id}', [BeritaDesaController::class, 'updateBerita']);

    // KELOLA ARTIKEL FO ALL
    Route::get('/list-menu', [PengalamanWisataController::class, 'getKategori']);

    Route::get('/tambah-user', [UserController::class, 'tambahUser']);

    Route::get('/tambah-menu', [MenuController::class, 'index']);
    Route::get('/tambah-submenu/{id}', [MenuController::class, 'indexSubMenu']);
    Route::get('/tambah-subsubmenu/{id}', [MenuController::class, 'indexSubSubMenu']);
    Route::get('/admin-tambah-submenu/{id}', [MenuController::class, 'tambahSubMenu']);
    Route::get('/admin-tambah-subsubmenu/{id}', [MenuController::class, 'tambahSubSubMenu']);
    Route::get('/submenu/delete/{id}', [MenuController::class, 'deleteSubMenu']);
    Route::get('/subsubmenu/delete/{id}', [MenuController::class, 'deleteSubSubMenu']);
    Route::get('/menu/delete/{id}', [MenuController::class, 'deleteMenu']);
    Route::post('/simpan-submenu-baru/{id}', [MenuController::class, 'tambahSubMenuSave']);
    Route::post('/update-submenu-baru/{id}', [MenuController::class, 'updateSubMenuSave']);
    Route::post('/update-menu-baru/{id}', [MenuController::class, 'updateMenuSave']);
    Route::get('/get-submenu/{id}', [MenuController::class, 'getSubMenu']);
    Route::post('/simpan-subsubmenu-baru/{id}', [MenuController::class, 'tambahSubSubMenuSave']);
    Route::post('/update-subsubmenu-baru/{id}', [MenuController::class, 'updateSubSubMenuSave']);
    Route::get('/get-subsubmenu/{id}', [MenuController::class, 'getSubSubMenu']);
    Route::get('/get-menu/{id}', [MenuController::class, 'getMenu']);

    Route::get('/admin', function () {
        return view('admin.home-admin');
    });
    Route::get('/edit-submenu/{id}', function () {
        return view('admin.edit-submenu');
    });
    Route::get('/edit-subsubmenu/{id}', function () {
        return view('admin.edit-subsubmenu');
    });
    Route::get('/edit-menu/{id}', function () {
        return view('admin.edit-menu');
    });
    Route::get('/backup', function () {
        return view('admin.backup');
    });

    //semua artikel
    Route::get('/kelola-semua-artikel', function () {
        return view('admin.artikel-index');
    });

    //KELOLA AKTIVITAS WISATA
    Route::get('/kelola-aktivitas', [AktivitasWisataController::class, 'kelolaAktivitas']);
    // Route::get('/kelola-wisata/{kat_id}', [ObjekWisataController::class, 'kelolaObjek']);

    Route::get('/detail-aktivitas-admin/{objek}', function () {
        return view('admin.aktivitas-view');
    });

    // Route::get('/{kategori}/edit-wisata', [ObjekWisataController::class, 'editKategori']);
    Route::post('/save-aktivitas/{aktivitas}', [AktivitasWisataController::class, 'saveEditAktivitas']);
    Route::get('/edit-aktivitas/{aktivitas}', [AktivitasWisataController::class, 'editAktivitas']);
    Route::get('/detail-aktivitas/delete/{id}', [AktivitasWisataController::class, 'hapusAktivitas']);
    Route::get('/detail-aktivitas/deleted', [AktivitasWisataController::class, 'hapusAktivitasDetail']);

    // Route::get('/detail-aktivitas/{id}', [ObjekWisataController::class, 'getObjek']);

    Route::get('/tambah-aktivitas', function () {
        return view('admin.aktivitas-tambah');
    });
    Route::post('/simpan-aktivitas', [AktivitasWisataController::class, 'tambahAktivitas']);
    // Route::get('/list-kat-wisata', [ObjekWisataController::class, 'getListKategori']);

});

// END
