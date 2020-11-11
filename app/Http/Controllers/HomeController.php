<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\PengalamanWisata;
use App\Models\PemesananPaket;
use App\Models\BeritaDesa;
use App\Models\ObjekWisata;
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

        $slider = ObjekWisata::all()->take(4);
        $berita = BeritaDesa::all()->take(3);
        $wisata = ObjekWisata::orderBy('id_obj_wisata', 'DESC')->take(3)->get();        

        if (Auth::check() && Role::find(Auth::user()->role_id)->nama_role == 'admin') {
            return redirect('/home-admin');
        }
        else{
            return view('home-page', compact('slider', 'berita', 'wisata'));
        }

        
    }

    public function indexAdmin()
    {
        $listPengalaman = PengalamanWisata::where(['status' => 1])->get();
        $listPemesanan = PemesananPaket::where(['status_pesanan' => 1])->get();
        // dd($listPengalaman);
        return view('admin.home-admin', compact('listPengalaman', 'listPemesanan'));
    }
}
