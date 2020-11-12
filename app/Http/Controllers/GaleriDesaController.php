<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriGaleri;
use App\Models\SubKategoriGaleri;
use App\Models\GaleriDesa;

class GaleriDesaController extends Controller
{
    public function viewKategori()
    {
    	$listKategori = KategoriGaleri::all();
    	// dd($listKategori);

    	return view('galeri-foto', compact('listKategori'));
    }

    public function viewSubKategori($kategori)
    {
    	$namaKategori = KategoriGaleri::select('nama_kategori')->where('id_kategori_galeri', $kategori)->get();
    	// dd($namaKategori);
    	$listSubKategori = SubKategoriGaleri::where('id_kategori', $kategori)->get();

    	return view('galeri-berdasarkan-aktivitas', compact('listSubKategori'));
    }

    public function viewDetail($subKategori)
    {
    	$listFoto = GaleriDesa::where('kategori_foto_id', $subKategori)->get();

    	return view('detail-foto', compact('listFoto'));
    }

    public function tambahFoto(Type $var = null)
    {
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        // dd($kategori);
        return view('admin.tambah-foto', [
            'kategori' => $kategori,
        ]);
    }

    // public function getSubKat(Request $request)
    // {
    //     $subKat = SubKategoriGaleri::where('id_kategori', $request->get('id'))
    //         ->pluck('nama_sub_kat', 'id_sub_kat_galeri');
    
    //     return response()->json($subKat);
    // }
}
