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
    //PENGUNJUNG
    public function viewKategori()
    {
    	$listKategori = KategoriGaleri::paginate(9);
    	return view('galeri-foto', compact('listKategori'));
    }

    public function viewSubKategori($kategori)
    {
    	$namaKategori = KategoriGaleri::select('nama_kategori')->where('id_kategori_galeri', $kategori)->first();
        $listKategori = KategoriGaleri::where('id_kategori_galeri', '!=', $kategori)->get();
    	$listSubKategori = GaleriDesa::where('kategori_foto_id', $kategori)->paginate(6);

    	return view('galeri-berdasarkan-aktivitas', compact('namaKategori', 'listKategori', 'listSubKategori'));
    }

    // ADMIN: KATEGORI GALERI
    public function kelolaKategori()
    {
        $data = GaleriDesa::all();
        $kategori = KategoriGaleri::paginate(10);

        return view('admin.galeri-kat-index', [
            'kategori' => $kategori,
            'data' => $data
        ]);
    }

    public function tambahKategori()
    {
        return view('admin.galeri-kat-tambah');
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
            // {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/galeri', $name);
                $data = '/image/galeri/'. $name;  // your folder path
                // $data = $name;  
            // }
        }
        // else{
        // dd($data);
        // }

        $kategori = new KategoriGaleri;
        $kategori->nama_kategori = $request->nama;
        $kategori->file_foto_sampul = $data;
        $kategori->save();

        return Redirect::to('/kelola-kat-galeri');
    }

    public function editKategori(KategoriGaleri $kategori)
    {
        return view('admin.galeri-kat-edit', compact('kategori'));
    }

    public function saveEditKat(Request $request, KategoriGaleri $kategori)
    {
        $request->validate(['nama' => 'required']);

        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        ]);
        
        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            // {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/galeri', $name);
                $data = '/image/galeri/'. $name;  // your folder path
                // $data = $name;  
            KategoriGaleri::where('id_kategori_galeri', $kategori->id_kategori_galeri)
            ->update([
                'nama_kategori' => $request->nama,
                'file_foto_sampul' => $data
            ]);
        }
        else{
            KategoriGaleri::where('id_kategori_galeri', $kategori->id_kategori_galeri)
            ->update([
                'nama_kategori' => $request->nama
            ]);
        }

        return redirect('/kelola-kat-galeri')->with('status', 'Kategori Galeri berhasil diubah');
    }

    public function hapusKategori(KategoriGaleri $kategori)
    {
        KategoriGaleri::destroy($kategori->id_kategori_galeri);
        Log::info('Kategori Galeri berhasil dihapus');
        return redirect('/kelola-kat-galeri');
    }

    //ADMIN: GALERI
    public function kelolaGaleri($kat_id = null)
    {
        if($kat_id != null){
            $galeri = GaleriDesa::where('kategori_foto_id', '=', $kat_id)->paginate(10);
        }
        else{
            $galeri = GaleriDesa::paginate(10);
        }

        return view('admin.galeri-index', [
            'galeri' => $galeri
        ]);
    }

    public function viewGaleriByAdmin(GaleriDesa $galeri)
    {
        return view('admin.galeri-view', compact('galeri'));
    }

    public function viewDetail($subKategori)
    {
    	$listFoto = GaleriDesa::where('id_galeri', $subKategori)->get();
        $getID = GaleriDesa::where('id_galeri', $subKategori)->first();
        $listKategori = KategoriGaleri::where('id_kategori_galeri', '!=', $getID->kategori_foto_id)->get();

    	return view('detail-foto', compact('listFoto', 'listKategori'));
    }

    public function tambahFoto()
    {
        $data = GaleriDesa::all();
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');

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
        
        $Upload_model = new GaleriDesa;
        $Upload_model->file_foto = json_encode($data);
        $Upload_model->kategori_foto_id = $request->kategori;
        $Upload_model->judul = $request->judul;
        $Upload_model->save();
        return redirect('/detail-galeri/'. $Upload_model->id_galeri);
    }

    public function editGaleri(GaleriDesa $galeri)
    {
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        return view('admin.galeri-edit', compact('galeri', 'kategori'));
    }

    public function saveEditGaleri(Request $request, GaleriDesa $galeri)
    {
        dd($request->arr);
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image) {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/galeri', $name);  // your folder path
                $data[] = $name;  
            }
            GaleriDesa::where('id_galeri', $galeri->id_galeri)
            ->update([
                'judul' => $request->judul,
                'kategori_foto_id' => $request->kategori,
                'file_foto' => json_encode($data)
            ]);
        }
        
        else {
            GaleriDesa::where('id_galeri', $galeri->id_galeri)
                ->update([
                    'judul' => $request->judul,
                    'kategori_foto_id' => $request->kategori
                ]);
        }

        return redirect('/kelola-galeri')->with('status', 'Galeri berhasil diubah');
    }

    public function hapusGaleri(GaleriDesa $galeri)
    {
        GaleriDesa::destroy($galeri->id_galeri);
        Log::info('Galeri berhasil dihapus');
        return redirect('/kelola-galeri');
    }
}
