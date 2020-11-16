<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\ObjekWisata;
use App\Models\KategoriWisata;
use Illuminate\Support\Facades\Auth;

class ObjekWisataController extends Controller
{
    public function kelolaObjek($kat_id = null)
    {
        if($kat_id != null){
            $objek = ObjekWisata::where('kategori_id', '=', $kat_id)->get();
            // dd($objek);
        }
        else{
            $objek = ObjekWisata::all();
            // dd($objek);
        }
        // $objek = ObjekWisata::all();
        // dd($objek);
        return view('admin.wisata-desa-index', [
            'objek' => $objek
        ]);
    }

    public function viewObjek(ObjekWisata $objek)
    {
        // dd($objek);  
        return view('wisata-desa-detail', compact('objek'));
    }

    public function viewObjekByAdmin(ObjekWisata $objek)
    {
        // dd($objek);  
        return view('admin.wisata-desa-view', compact('objek'));
    }

    public function tambahObjek(Request $request)
    {
        $user = Auth::user();
        $newObjek = new ObjekWisata();
        $newObjek->nama_wisata = $request->title;
        $newObjek->deskripsi = $request->story;
        $newObjek->kategori_id = $request->kategori;
        // $newObjek->tanggal = Carbon::now();
        // $newObjek->waktu = Carbon::now();
        // $newObjek->status = 1;
        // $newObjek->penulis_id = $user->id_user;
        // $newObjek->obj_wisata_id = $request->kategori;
        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = public_path() . '/image/objek/' . $filename;
            file_put_contents($path, $decode);
            $newObjek->file_foto = '/image/objek/' . $filename;
        }
        $newObjek->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }

    public function getListKategori()
    {
        $listkategori = KategoriWisata::all();
        return response()->json($listkategori);
    }

    public function kelolaKategori()
    {
        $data = ObjekWisata::all();

        $kategori = KategoriWisata::all();
        // dd($kategori);
        return view('admin.wisata-desa-kat-index', [
            'kategori' => $kategori,
            'data' => $data
        ]);
    }

    public function tambahKategori()
    {
        return view('admin.wisata-desa-kat-tambah');
    }

    public function editKategori(KategoriWisata $kategori)
    {
        // dd($kategori->nama_kategori);
        return view('admin.wisata-desa-kat-edit', compact('kategori'));
    }

    public function saveEditKat(Request $request, KategoriWisata $kategori)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        
        KategoriWisata::where('id_kategori', $kategori->id_kategori)
                        ->update([
                            'nama_kategori' => $request->nama
                        ]);

        return redirect('/kelola-kat-wisata')->with('status', 'Kategori Wisata berhasil diubah');
    }

    public function editWisata(ObjekWisata $objek)
    {
        $kategori = KategoriWisata::pluck('nama_kategori', 'id_kategori');
        // dd($kategori->nama_kategori);
        return view('admin.galeri-edit', compact('objek', 'kategori'));
    }

    public function saveEditWisata(Request $request, ObjekWisata $objek)
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
                            'nama_wisata' => $request->nama,
                            'deskripsi' => $request->deskripsi,
                            'file_foto' => json_encode($data),
                            'kategori_id' => $request->kategori
                        ]);

        return redirect('/kelola-wisata')->with('status', 'Wisata berhasil diubah');
    }

    public function hapusKategori(KategoriWisata $kategori)
    {
        KategoriWisata::destroy($kategori->id_kategori);
        Log::info('Kategori Wisata berhasil dihapus');
        return redirect('/kelola-kat-wisata');
    }

    public function hapusObjek(ObjekWisata $objek)
    {
        ObjekWisata::destroy($objek->id_obj_wisata);
        Log::info('Objek Wisata berhasil dihapus');
        return redirect('/kelola-wisata');
    }

    public function saveKat(Request $request)
    {
        $kategori = new KategoriWisata;
        $kategori->nama_kategori = $request->nama;
        // $kategori->file_foto_sampul = $data;
        $kategori->save();

        return Redirect::to('/tambah-kat-wisata');
    }
}
