<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\PengalamanWisata;
use App\Models\PemesananPaket;
use App\Models\BeritaDesa;
use App\Models\ObjekWisata;
use App\Models\PaketWisata;
use App\Models\GaleriDesa;
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
    public function index()
    {
        // SLIDER
        $slider1 = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->first();
        $slider2 = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->first();
        $slider3 = GaleriDesa::orderBy('id_galeri', 'DESC')->first();
        $slider4 = PengalamanWisata::where('status', '=', 2)->orderBy('id_pengalaman', 'DESC')->first();

        $berita = BeritaDesa::all()->take(3);
        $wisata = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->take(3)->get();

        if (Auth::check() && Role::find(Auth::user()->role_id)->nama_role == 'admin') {
            return redirect('/home-admin');
        } else {
            return view('home-page', 
                compact(
                    'slider1',
                    'slider2',
                    'slider3',
                    'slider4', 
                    'berita', 
                    'wisata'
                )
            );
        }
    }

    public function indexPengunjungByAdmin()
    {
        // SLIDER
        $slider1 = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->first();
        $slider2 = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->first();
        $slider3 = GaleriDesa::orderBy('id_galeri', 'DESC')->first();
        $slider4 = PengalamanWisata::where('status', '=', 2)->orderBy('id_pengalaman', 'DESC')->first();

        $berita = BeritaDesa::all()->take(3);
        $wisata = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->take(3)->get();

        return view('home-page', 
            compact(
                'slider1',
                'slider2',
                'slider3',
                'slider4', 
                'berita', 
                'wisata'
            ));
    }

    public function indexAdmin()
    {
        $listPengalaman = PengalamanWisata::with('penulis')->where(['status' => 1])->get();
        $listPemesanan = PemesananPaket::where(['status_pesanan' => 1])->get();

        return view('admin.home-admin', compact('listPengalaman', 'listPemesanan'));
    }
}
