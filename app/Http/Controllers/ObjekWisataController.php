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
    //PENGUNJUNG
    public function viewKategori(KategoriWisata $kategori)
    {
        $list = ObjekWisata::where(['kategori_id' => $kategori->id_kategori])->paginate(9);
        return view('kategori-wisata', compact('kategori', 'list'));
    }

    public function viewObjek(ObjekWisata $objek)
    {
        return view('wisata-desa-detail', compact('objek'));
    }

    public function kelolaObjek($kat_id = null)
    {
        if($kat_id != null){
            $objek = ObjekWisata::where('kategori_id', '=', $kat_id)->paginate(9);
        }
        else{
            $objek = ObjekWisata::paginate(9);
        }

        return view('admin.wisata-desa-index', [
            'objek' => $objek
        ]);
    }

    

    public function viewObjekByAdmin(ObjekWisata $objek)
    {
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
        // $data = ObjekWisata::all();

        $kategori = KategoriWisata::paginate(9);
        // dd($kategori);
        return view('admin.wisata-desa-kat-index', [
            'kategori' => $kategori,
            // 'data' => $data
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

        if($request->hasfile('filename'))
        {
            $image = $request->file('filename');
            // {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/image/kat-wisata', $name);
                $data = '/image/kat-wisata/'. $name;  // your folder path
                // $data = $name;  
            // }
            KategoriWisata::where('id_kategori', $kategori->id_kategori)
            ->update([
                'nama_kategori' => $request->nama,
                'icon' => $data
            ]);
        }
        
        KategoriWisata::where('id_kategori', $kategori->id_kategori)
            ->update([
                'nama_kategori' => $request->nama
            ]);

        return redirect('/kelola-kat-wisata')->with('status', 'Kategori Wisata berhasil diubah');
    }

    public function getObjek($id)
    {
        $objek = ObjekWisata::find($id);
        return response()->json($objek);
    }

    public function editWisata(ObjekWisata $objek)
    {
        // $kategori = KategoriWisata::pluck('nama_kategori', 'id_kategori');
        // dd($kategori->nama_kategori);
        return view('admin.wisata-desa-edit', compact('objek')); //, 'kategori'
    }

    public function saveEditWisata(Request $request, $id)
    {
        $objek = ObjekWisata::find($id);
        $objek->nama_wisata = $request->title;
        $objek->deskripsi = $request->story;
        $objek->kategori_id = $request->kategori;

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
            $objek->file_foto = '/image/objek/' . $filename;
        }

        $objek->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function hapusKategori(KategoriWisata $kategori)
    {
        KategoriWisata::destroy($kategori->id_kategori);
        Log::info('Kategori Wisata berhasil dihapus');
        return redirect('/kelola-kat-wisata');
    }

    public function hapusObjek($id)
    {
        ObjekWisata::destroy($id);
        Log::info('Objek Wisata berhasil dihapus');
        return redirect('/kelola-wisata');
    }

    public function hapusObjekDetail(Request $request)
    {
        ObjekWisata::destroy($request->id);

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
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
                $image->move(public_path().'/image/kat-wisata', $name);
                $data = '/image/kat-wisata/'. $name;  // your folder path
                // $data = $name;  
            // }
        }

        $kategori = new KategoriWisata;
        $kategori->nama_kategori = $request->nama;
        $kategori->icon = $data;
        $kategori->save();

        return Redirect::to('/kelola-kat-wisata');
    }

    //get data json
    public function getWisataDetail($id)
    {
        $article = ObjekWisata::find($id);
        return response()->json($article);
    }
}
