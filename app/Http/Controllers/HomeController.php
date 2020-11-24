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
use App\Models\KategoriWisata;
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
        $pengalamanWisata = PengalamanWisata::whereRaw("LOWER(judul_pengalaman) LIKE '%" . $input . "%' || LOWER(isi_pengalaman) LIKE '%" . $input . "%'")->get();
//        $galeri = GaleriDesa::whereRaw("LOWER(judul) LIKE '%" . $input . "%'")->get();
        $data = array([
            'wisataDesa' => $wisatadesa,
            'pengalamanWisata' => $pengalamanWisata,
            /*'galeri' => $galeri*/
        ]);

        return response()->json($data);
    }


    public function index()
    {
        // SLIDER
        $slider1 = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->first();
        $slider2 = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->first();
        $slider3 = GaleriDesa::orderBy('id_galeri', 'DESC')->first();
        $slider4 = PengalamanWisata::where('status', '=', 2)->orderBy('id_pengalaman', 'DESC')->first();

        $unggulan = ObjekWisata::where('isUnggulan', '=', 1)->take(3)->get();
        $paket = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();

        $kategori = KategoriWisata::take(6)->get();

        if (Auth::check() && Role::find(Auth::user()->role_id)->nama_role == 'admin') {
            return redirect('/home-admin');
        } else {
            return view('home-page',
                compact(
                    'slider1',
                    'slider2',
                    'slider3',
                    'slider4',
                    'unggulan',
                    'paket',
                    'kategori'
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

        $unggulan = ObjekWisata::where('isUnggulan', '=', 1)->take(3)->get();
        $paket = PaketWisata::orderBy('id_pkt_wisata', 'DESC')->take(3)->get();

        $kategori = KategoriWisata::take(6)->get();

        return view('home-page',
            compact(
                'slider1',
                'slider2',
                'slider3',
                'slider4',
                'unggulan',
                'paket',    
                'kategori'
            ));
    }

    public function indexAdmin()
    {
        $listPengalaman = PengalamanWisata::with('penulis')->where(['status' => 1])->get();
        $listPemesanan = PemesananPaket::where(['status_pesanan' => 1])->get();

        return view('admin.home-admin', compact('listPengalaman', 'listPemesanan'));
    }
}
