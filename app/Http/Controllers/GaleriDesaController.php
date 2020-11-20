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
    	return view('galeri-foto', compact('listKategori'));
    }

    public function viewSubKategori($kategori)
    {
    	$namaKategori = KategoriGaleri::select('nama_kategori')->where('id_kategori_galeri', $kategori)->get();
    	$listSubKategori = GaleriDesa::where('kategori_foto_id', $kategori)->get();

    	return view('galeri-berdasarkan-aktivitas', compact('listSubKategori'));
    }

    public function viewGaleriByAdmin(GaleriDesa $galeri)
    {
        return view('admin.galeri-view', compact('galeri'));
    }

    public function viewDetail($subKategori)
    {
    	$listFoto = GaleriDesa::where('id_galeri', $subKategori)->get();

    	return view('detail-foto', compact('listFoto'));
    }

    public function kelolaKategori()
    {
        $data = GaleriDesa::all();
        $kategori = KategoriGaleri::paginate(9);

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
        // $this->validate($request, [
        //         'filename' => 'required',
        //         'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        // ]);
        
        // if($request->hasfile('filename'))
        // {
        //     $image = $request->file('filename');
        //     $name = $image->getClientOriginalName();
        //     $data = $image->move('/image/image', $name);  // your folder path
        //     // $data = $name;  
        // }
        // $explode = explode(',', $request['img']);
        // if (strpos($explode[0], 'data') !== false) {
        //     $explode = explode(',', $request['img']);
        //     $decode = base64_decode($explode[1]);
        //     if (strpos($explode[1], 'jpeg') !== false)
        //         $extension = 'jpg';
        //     else
        //         $extension = 'png';

        //     $filename = date("Ymdhis") . '.' . $extension;
        //     $path = './image/blogs/' . $filename;
        //     file_put_contents($path, $decode);
        //     $pengalamanWisata->gambar = '/image/blogs/' . $filename;
        // }
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
        // dd($kategori->nama_kategori);
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

    public function kelolaGaleri($kat_id = null)
    {
        if($kat_id != null){
            $galeri = GaleriDesa::where('kategori_foto_id', '=', $kat_id)->paginate(9);
        }
        else{
            $galeri = GaleriDesa::paginate(9);
        }

        return view('admin.galeri-index', [
            'galeri' => $galeri
        ]);
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
        return redirect('/kelola-galeri')->with('success', 'Galeri berhasil ditambah');
    }

    public function editGaleri(GaleriDesa $galeri)
    {
        $kategori = KategoriGaleri::pluck('nama_kategori', 'id_kategori_galeri');
        return view('admin.galeri-edit', compact('galeri', 'kategori'));
    }

    public function saveEditGaleri(Request $request, GaleriDesa $galeri)
    {
        // $this->validate($request, [
        //     'filename' => 'required',
        //     'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3048'
        // ]);
        
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
