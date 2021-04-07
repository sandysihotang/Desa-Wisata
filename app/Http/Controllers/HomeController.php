<?php

namespace App\Http\Controllers;

use App\Models\KategoriGaleri;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\PengalamanWisata;
use App\Models\PemesananPaket;
use App\Models\BeritaDesa;
use App\Models\ObjekWisata;
use App\Models\PaketWisata;
use App\Models\GaleriDesa;
use App\Models\KategoriWisata;
use App\Models\Home;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function search(Request $request)
    {
        $input = strtolower($request->input);
        $wisatadesa = ObjekWisata::whereRaw("LOWER(nama_wisata) LIKE '%" . $input . "%' || LOWER(deskripsi) LIKE '%" . $input . "%'")->get();
        $pengalamanWisata = PengalamanWisata::whereRaw("(LOWER(judul_pengalaman) LIKE '%" . $input . "%' or LOWER(isi_pengalaman) LIKE '%" . $input . "%') and status = 2")->get();
        $galeri = KategoriGaleri::whereRaw("LOWER(nama_kategori) LIKE '%" . $input . "%'")->get();
        $data = array([
            'wisataDesa' => $wisatadesa,
            'pengalamanWisata' => $pengalamanWisata,
            'galeri' => $galeri
        ]);

        return response()->json($data);
    }


    public function index()
    {
        $data = Home::find(1);
        views($data)->record();
        visits('App\Models\Home')->increment();
        // $count2 = visits('App\Models\Home')->count();
        // $count = views($data)->count();
        // $unik = views($data)->unique()->count();
        // SLIDER
        $sliderObjek = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->take(2)->get();
        $slider2 = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->first();
        $slider3 = BeritaDesa::orderBy('id_berita', 'DESC')->first();

        $unggulan = ObjekWisata::where('isUnggulan', '=', 1)->take(3)->get();
        $paket = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();
        $kategori = KategoriWisata::take(6)->get();

        if (Auth::check() && (Role::find(Auth::user()->role_id)->nama_role == 'admin' || Role::find(Auth::user()->role_id)->nama_role == 'super_admin')) {
            return redirect('/home-admin');
        } else {
            return view('home-page',
                compact(
                    'sliderObjek',
                    'slider2',
                    'slider3',
                    'unggulan',
                    'paket',
                    'kategori',
                    // 'count',
                    // 'count2',
                    // 'unik'
                )
            );
        }
    }

    public function indexPengunjungByAdmin()
    {
        // $count = visits('App\Models\Home')->count();
        // SLIDER
        $sliderObjek = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->take(2)->get();
        $slider2 = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->first();
        $slider3 = BeritaDesa::orderBy('id_berita', 'DESC')->first();

        $unggulan = ObjekWisata::where('isUnggulan', '=', 1)->take(3)->get();
        $paket = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();

        $kategori = KategoriWisata::take(6)->get();

        return view('home-page',
            compact(
                'sliderObjek',
                'slider2',
                'slider3',
                'unggulan',
                'paket',
                'kategori',
                // 'count'
            ));
    }

    public function indexAdmin()
    {
        $listPengalaman = PengalamanWisata::with('penulis')->where(['status' => 1])->sortable()->get();
        $listPemesanan = PemesananPaket::where(['status_pesanan' => 1])->sortable()->get();

        return view('admin.home-admin', compact('listPengalaman', 'listPemesanan'));
    }
}
