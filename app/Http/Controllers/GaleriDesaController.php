<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
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
    	$listSubKategori = GaleriDesa::where('kategori_foto_id', $kategori)->get();
        // dd($listSubKategori);

    	return view('galeri-berdasarkan-aktivitas', compact('listSubKategori'));
    }

    public function viewDetail($subKategori)
    {
    	$listFoto = GaleriDesa::where('id_galeri', $subKategori)->get();
        // dd($subKategori);

    	return view('detail-foto', compact('listFoto'));
    }

    public function kelolaKategori()
    {
        $data = GaleriDesa::all();

        $kategori = KategoriGaleri::all();
        // dd($kategori);
        return view('admin.galeri-kat-index', [
            'kategori' => $kategori,
            'data' => $data
        ]);
    }

    public function tambahKategori()
    {
        return view('admin.galeri-kat-tambah');
    }

    public function editKategori(KategoriGaleri $kategori)
    {
        // dd($kategori->nama_kategori);
        return view('admin.galeri-kat-edit', compact('kategori'));
    }

    public function saveEditKat(Request $request, KategoriGaleri $kategori)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        
        KategoriGaleri::where('id_kategori_galeri', $kategori->id_kategori_galeri)
                        ->update([
                            'nama_kategori' => $request->nama
                        ]);

        return redirect('/kelola-kat-galeri')->with('status', 'Kategori Galeri berhasil diubah');
    }

    public function hapusKategori(KategoriGaleri $kategori)
    {
        KategoriGaleri::destroy($kategori->id_kategori_galeri);
        Log::info('Kategori Galeri berhasil dihapus');
        return redirect('/kelola-kat-galeri');
    }

    public function saveKat(Request $request)
    {
        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
        
        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');

            $name=$image->getClientOriginalName();
            $data = $image->move('/image/image', $name);  // your folder path
            // $data = $name;  
        }


        $kategori = new KategoriGaleri;
        $kategori->nama_kategori = $request->nama;
        $kategori->file_foto_sampul = $data;
        $kategori->save();

        return Redirect::to('/tambah-kat-galeri');
    }

    // public function kelolaSubKategori($kategori)
    // {
    //     $subKat = GaleriDesa::where('kategori_foto_id', '=', $kategori)->get();
    //     // dd($kategori);
    //     return view('admin.galeri-subKat-index', [
    //         'subKat' => $subKat
    //     ]);
    // }

    public function kelolaGaleri($kat_id = null)
    {
        if($kat_id != null){
            $galeri = GaleriDesa::where('kategori_foto_id', '=', $kat_id)->get();
            // dd($objek);
        }
        else{
            $galeri = GaleriDesa::all();
            // dd($objek);
        }

        // $galeri = GaleriDesa::all();
        // dd($kategori);
        return view('admin.galeri-index', [
            'galeri' => $galeri
        ]);
    }

    public function tambahFoto()
    {
        $data = GaleriDesa::all();

        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        // dd($kategori);
        return view('admin.galeri-tambah', [
            'kategori' => $kategori,
            'data' => $data
        ]);
    }

    public function saveGaleri(Request $request)
    {
        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
        
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/galeri', $name);  // your folder path
                $data[] = $name;  
            }
        }

        // $kategori = new KategoriGaleri();
        // $subKat->id_kategori = $request->kategori;
        // $subKat->nama_sub_kat = $request->judul;
        // $subKat->save();
        
        $Upload_model = new GaleriDesa;
        $Upload_model->file_foto = json_encode($data);
        $Upload_model->kategori_foto_id = $request->kategori;
        $Upload_model->judul = $request->judul;
        $Upload_model->save();
        return redirect('/kelola-galeri')->with('success', 'Galeri berhasil ditambah');
        // return back()->with('success', 'Your images has been upload successfully');
    }

    // public function getSubKat(Request $request)
    // {
    //     $subKat = SubKategoriGaleri::where('id_kategori', $request->get('id'))
    //         ->pluck('nama_sub_kat', 'id_sub_kat_galeri');
    
    //     return response()->json($subKat);
    // }

    public function viewGaleriByAdmin(GaleriDesa $galeri)
    {
        // dd($objek);  
        return view('admin.galeri-view', compact('galeri'));
    }

    public function editGaleri(GaleriDesa $galeri)
    {
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        // dd($kategori->nama_kategori);
        return view('admin.galeri-edit', compact('galeri', 'kategori'));
    }

    public function saveEditGaleri(Request $request, GaleriDesa $galeri)
    {
        $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
        
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/galeri', $name);  // your folder path
                $data[] = $name;  
            }
        }
        
        GaleriDesa::where('id_galeri', $galeri->id_galeri)
                        ->update([
                            'judul' => $request->judul,
                            'kategori_foto_id' => $request->kategori,
                            'file_foto' => json_encode($data)
                        ]);

        return redirect('/kelola-galeri')->with('status', 'Galeri berhasil diubah');
    }

    public function hapusGaleri(GaleriDesa $galeri)
    {
        GaleriDesa::destroy($galeri->id_galeri);
        Log::info('Galeri berhasil dihapus');
        return redirect('/kelola-galeri');
    }
}
