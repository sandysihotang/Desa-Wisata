<?php

namespace App\Providers;

use App\Models\FasilitasDesa;
use App\Models\KategoriWisata;
use App\Models\Menu;
use App\Models\ObjekWisata;
use App\Models\ProfilDesa;
use App\Models\PemesananPaket;
use App\Models\PengalamanWisata;
use App\Models\Home;
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
        $menu = Menu::with('subMenu')->get();
        $kategori_wisata = KategoriWisata::all();
        $objek_wisata = ObjekWisata::all();
        $fasilitas = FasilitasDesa::all();
        $logo = ProfilDesa::find(1);
        $profil = ProfilDesa::whereNotIn('id_profil', [1, 9])->get();
        $countPesanan = PemesananPaket::where('status_pesanan', '=', 1)->count();
        $countPengalaman = PengalamanWisata::where('status', '=', 1)->count();

        $data = Home::find(1);
        $countVisit = visits('App\Models\Home')->count();
        $countVisitor = views($data)->unique()->count();

        View::share('countVisit', $countVisit);
        View::share('countVisitor', $countVisitor);
        View::share('profil', $profil);
        View::share('fasilitas', $fasilitas);
        View::share('objek_wisata', $objek_wisata);
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
