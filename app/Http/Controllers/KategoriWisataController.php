<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriWisata;
use App\Models\ObjekWisata;

class KategoriWisataController extends Controller
{
    public function viewKategori(KategoriWisata $kategori)
    {
    	// dd($kategori->id_kategori);	
    	$list = ObjekWisata::where(['kategori_id' => $kategori->id_kategori])->get();
    	// dd($list);
        return view('kategori-wisata', compact('kategori', 'list'));
    }
}
