<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use App\Models\ObjekWisata;
use App\Models\KategoriWisata;
use App\Models\FasilitasDesa;

class ArtikelController extends Controller
{
    public function listArtikel()
    {
        $profil = ProfilDesa::all();
        $objek = ObjekWisata::all();
        $kategori = KategoriWisata::all();
        $fasilitas = FasilitasDesa::all();

        $artikel = collect();

		foreach ($profil as $data)
		    $artikel->push($data);
		foreach ($objek as $data)
		    $artikel->push($data);
		foreach ($kategori as $data)
		    $artikel->push($data);
		foreach ($fasilitas as $data)
		    $artikel->push($data);

		// dd($profil);
        return response()->json($artikel);
    }
}
