<?php

namespace App\Providers;

use App\Models\FasilitasDesa;
use App\Models\KategoriWisata;
use App\Models\Menu;
use App\Models\ObjekWisata;
use App\Models\AktivitasWisata;
use App\Models\ProfilDesa;
use App\Models\PemesananPaket;
use App\Models\PengalamanWisata;
use App\Models\Home;
use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menu = Menu::with('subMenu.subSubMenu')->get();
        $kategori_wisata = KategoriWisata::all();
        $aktivitas_wisata = AktivitasWisata::all();
        $fasilitas = FasilitasDesa::all();
        $logo = ProfilDesa::find(1);
        $profil = ProfilDesa::whereNotIn('id_profil', [1, 2, 3, 4])->get();
        $nama_desa = ProfilDesa::find(2);
        $kontak_pokdarwis = ProfilDesa::find(3);
        $countPesanan = PemesananPaket::where('status_pesanan', '=', 1)->count();
        $countPengalaman = PengalamanWisata::where('status', '=', 1)->count();

        $data = Home::find(1);
        $countVisit = visits('App\Models\Home')->count();
        $countVisitor = views($data)->unique()->count();

        $socialFacebook = SocialMedia::where('provider', '=', 'Facebook')->first();
        $socialYoutube = SocialMedia::where('provider', '=', 'Youtube')->first();
        $socialTwitter = SocialMedia::where('provider', '=', 'Twitter')->first();
        $socialInstagram = SocialMedia::where('provider', '=', 'Instagram')->first();


        View::share('socialFacebook', $socialFacebook);
        View::share('socialInstagram', $socialInstagram);
        View::share('socialYoutube', $socialYoutube);
        View::share('socialTwitter', $socialTwitter);
        View::share('countVisit', $countVisit);
        View::share('countVisitor', $countVisitor);
        View::share('profil', $profil);
        View::share('nama_desa', $nama_desa);
        View::share('kontak_pokdarwis', $kontak_pokdarwis);
        View::share('fasilitas', $fasilitas);
        View::share('aktivitas_wisata', $aktivitas_wisata);
        View::share('kategori_wisata', $kategori_wisata);
        View::share('menu', $menu);
        View::share('logo', $logo);
        View::share('countPesanan', $countPesanan);
        View::share('countPengalaman', $countPengalaman);
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
});
Paginator::useBootstrap();
}
}