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
        visits('App\Models\Home')->increment();
        // visits($kategori)->increment();
        // $count = visits($kategori)->count();

        $list = ObjekWisata::where(['kategori_id' => $kategori->id_kategori])->paginate(9);
        return view('kategori-wisata', compact('kategori', 'list'));
    }

    public function viewObjek(ObjekWisata $objek)
    {
        visits('App\Models\Home')->increment();
        // visits($objek)->increment();
        // $count = visits($objek)->count();

        return view('wisata-desa-detail', compact('objek'));
    }

    //ADMIN: KATEGORI WISATA

    public function kelolaKategori()
    {
        $kategori = KategoriWisata::sortable()->paginate(10);

        return view('admin.wisata-desa-kat-index', [
            'kategori' => $kategori,
        ]);
    }

    public function saveKat(Request $request)
    {
        $kategori = new KategoriWisata;
        $kategori->nama_kategori = $request->nama;
        $kategori->save();

        return Redirect::to('/kelola-kat-wisata');
    }

    public function saveEditKat(Request $request, KategoriWisata $kategori)
    {
        KategoriWisata::where('id_kategori', $kategori->id_kategori)
            ->update([
                'nama_kategori' => $request->nama
            ]);

        return redirect('/kelola-kat-wisata')->with('status', 'Kategori Wisata berhasil diubah');
    }

    public function hapusKategori(KategoriWisata $kategori)
    {
        KategoriWisata::destroy($kategori->id_kategori);
        Log::info('Kategori Wisata berhasil dihapus');
        return redirect('/kelola-kat-wisata');
    }

    //ADMIN: OBJEK WISATA

    public function kelolaObjek($kat_id = null)
    {
        if($kat_id != null){
            $objek = ObjekWisata::where('kategori_id', '=', $kat_id)->sortable(['isUnggulan' => 'DESC'])->sortable(['id_obj_wisata' => 'ASC'])->paginate(10);
        }
        else{
            $objek = ObjekWisata::sortable(['isUnggulan' => 'DESC'])->sortable(['id_obj_wisata' => 'ASC'])->paginate(10);
        }
        $count = ObjekWisata::where('isUnggulan', '=', 1)->count();

        return view('admin.wisata-desa-index', [
            'objek' => $objek,
            'count' => $count
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

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/objek/' . $filename;
            file_put_contents($path, $decode);
            $newObjek->file_foto = '/image/objek/' . $filename;
        }
        $newObjek->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function editWisata(ObjekWisata $objek)
    {
        return view('admin.wisata-desa-edit', compact('objek')); //, 'kategori'
    }

    public function saveEditWisata(Request $request, $id)
    {
        $objek = ObjekWisata::find($id);
        $objek->nama_wisata = $request->title;
        $objek->deskripsi = $request->story;
        $objek->kategori_id = $request->kategori;
        $objek->isUnggulan = $request->unggulan;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/objek/' . $filename;
            file_put_contents($path, $decode);
            $objek->file_foto = '/image/objek/' . $filename;
        }

        $objek->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
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

    //get data json
    public function getListKategori()
    {
        $listkategori = KategoriWisata::all();
        return response()->json($listkategori);
    }

    public function getObjek($id)
    {
        $objek = ObjekWisata::find($id);
        return response()->json($objek);
    }

    public function getWisataDetail($id)
    {
        $article = ObjekWisata::find($id);
        return response()->json($article);
    }
}
