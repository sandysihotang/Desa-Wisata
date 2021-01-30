<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\AktivitasWisata;
// use App\Models\KategoriWisata;
use Illuminate\Support\Facades\Auth;

class AktivitasWisataController extends Controller
{
    //PENGUNJUNG

    public function viewObjek(ObjekWisata $objek)
    {
        visits('App\Models\Home')->increment();
        // visits($objek)->increment();
        // $count = visits($objek)->count();

        return view('wisata-desa-detail', compact('objek'));
    }

    //ADMIN

    public function kelolaAktivitas()
    {
        $aktivitas = AktivitasWisata::sortable(['aktivitas_id' => 'ASC'])->paginate(10);
        
        // $count = AktivitasWisata::where('isUnggulan', '=', 1)->count();

        return view('admin.aktivitas-wisata-index', [
            'aktivitas' => $aktivitas,
            // 'count' => $count
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

    public function editAktivitas(AktivitasWisata $aktivitas)
    {
        return view('admin.aktivitas-edit', compact('aktivitas')); //, 'kategori'
    }

    public function saveEditAktivitas(Request $request, $id)
    {
        $objek = AktivitasWisata::find($id);
        $objek->judul = $request->title;
        $objek->deskripsi = $request->story;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/aktivitas/' . $filename;
            file_put_contents($path, $decode);
            $objek->file_foto = '/image/aktivitas/' . $filename;
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

    public function getAktivitasDetail($id)
    {
        $article = AktivitasWisata::find($id);
        return response()->json($article);
    }
}
