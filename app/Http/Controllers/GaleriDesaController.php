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
        visits('App\Models\Home')->increment();

    	$listKategori = KategoriGaleri::paginate(9);
    	return view('galeri-foto', compact('listKategori'));
    }

    public function viewSubKategori(KategoriGaleri $kategori)
    {
        visits('App\Models\Home')->increment();
        // visits($kategori)->increment();
        // $count = visits($kategori)->count();

    	$namaKategori = KategoriGaleri::select('nama_kategori')->where('id_kategori_galeri', $kategori->id_kategori_galeri)->first();
        $listKategori = KategoriGaleri::where('id_kategori_galeri', '!=', $kategori->id_kategori_galeri)->get();
    	$listSubKategori = SubKategoriGaleri::where('id_kategori', $kategori->id_kategori_galeri)->paginate(6);

    	return view('galeri-berdasarkan-aktivitas', compact('namaKategori', 'listKategori', 'listSubKategori'));
    }

    public function viewDetail(SubKategoriGaleri $subKategori)
    {
        visits('App\Models\Home')->increment();
        // visits($subKategori)->increment();
        // $count = visits($subKategori)->count();
        
        $listFoto = GaleriDesa::where('kategori_foto_id', $subKategori->id_sub_kat_galeri)->get();
        $subKat = SubKategoriGaleri::where('id_sub_kat_galeri', $subKategori->id_sub_kat_galeri)->first();
        $listKategori = KategoriGaleri::where('id_kategori_galeri', '!=', $subKat->id_kategori)->get();

        return view('detail-foto', compact('listFoto', 'listKategori', 'subKat'));
    }

    // ADMIN: KATEGORI GALERI
    public function kelolaKategori()
    {
        $data = GaleriDesa::all();
        $kategori = KategoriGaleri::sortable()->paginate(10);

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
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'filename' => 'max:3000',
            'filename' => 'dimensions:max_width=1200',
        ]);

        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            $name=$image->getClientOriginalName();
            $image->move('./image/galeri', $name);
            $data = '/image/galeri/'. $name;  // your folder path
        }

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
        $request->validate([
            'nama' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'filename' => 'max:3000',
            'filename' => 'dimensions:max_width=1200',
        ]);

        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            $name=$image->getClientOriginalName();
            $image->move('./image/galeri', $name);
            $data = '/image/galeri/'. $name;  // your folder path

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
            $galeri = SubKategoriGaleri::where('id_kategori', '=', $kat_id)->sortable()->paginate(10);
        }
        else{
            $galeri = SubKategoriGaleri::sortable()->paginate(10);
        }

        return view('admin.galeri-index', [
            'galeri' => $galeri
        ]);
    }

    public function viewGaleriByAdmin(SubKategoriGaleri $galeri)
    {
        $listFoto = GaleriDesa::where('kategori_foto_id', '=', $galeri->id_sub_kat_galeri)->get();
        return view('admin.galeri-view', compact('galeri', 'listFoto'));
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
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'filename.*' => 'max:3000',
            'filename.*' => 'dimensions:max_width=1200',
        ]);

        $galeri = new SubKategoriGaleri;
        $galeri->id_kategori = $request->kategori;
        $galeri->judul = $request->judul;
        $galeri->save();

        if($request->hasfile('filename'))
        {
            $all = array();
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move('./image/galeri', $name);  // your folder path
                $data = '/image/galeri/'. $name;

                $newFoto = new GaleriDesa;
                $newFoto->file_foto = $data;
                $newFoto->kategori_foto_id = $galeri->id_sub_kat_galeri;
                $newFoto->save();
            }
        }

        return redirect('/detail-galeri/'. $galeri->id_sub_kat_galeri);
    }

    public function editGaleri(SubKategoriGaleri $galeri)
    {
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        $listFoto = GaleriDesa::where('kategori_foto_id', '=', $galeri->id_sub_kat_galeri)->get();

        return view('admin.galeri-edit', compact('galeri', 'kategori', 'listFoto'));
    }

    public function saveEditGaleri(Request $request, SubKategoriGaleri $galeri)
    {
        $this->validate($request, [
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'filename.*' => 'max:3000',
            'filename.*' => 'dimensions:max_width=1200',
        ]);

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image) {
                $name=$image->getClientOriginalName();
                $image->move('./image/galeri', $name);  // your folder path
                // $data[] = $name;
                $data = '/image/galeri/'. $name;

                $newFoto = new GaleriDesa;
                $newFoto->file_foto = $data;
                $newFoto->kategori_foto_id = $galeri->id_sub_kat_galeri;
                $newFoto->save();
            }
        }

        SubKategoriGaleri::where('id_sub_kat_galeri', $galeri->id_sub_kat_galeri)
            ->update([
                'judul' => $request->judul,
                'id_kategori' => $request->kategori
            ]);

        return redirect('/kelola-galeri')->with('status', 'Galeri berhasil diubah');
    }

    public function hapusGaleri(SubKategoriGaleri $galeri)
    {
        SubKategoriGaleri::destroy($galeri->id_sub_kat_galeri);
        Log::info('Galeri berhasil dihapus');
        return redirect('/kelola-galeri');
    }

    public function hapusFoto(GaleriDesa $foto)
    {
        GaleriDesa::destroy($foto->id_galeri);

        return redirect()->back();
    }
}
