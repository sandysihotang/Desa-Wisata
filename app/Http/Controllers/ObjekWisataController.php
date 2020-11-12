<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ObjekWisata;

class ObjekWisataController extends Controller
{
    public function viewObjek(ObjekWisata $objek)
    {
    	// dd($objek);	
        return view('wisata-desa-detail', compact('objek'));
    }

    public function saveArtikel(Request $request)
    {
        $user = Auth::user();
        $newObjek = new ObjekWisata();
        $newObjek->judul_pengalaman = $request->title;
        $newObjek->isi_pengalaman = $request->story;
        $newObjek->tanggal = Carbon::now();
        $newObjek->waktu = Carbon::now();
        $newObjek->status = 1;
        $newObjek->penulis_id = $user->id_user;
        $newObjek->obj_wisata_id = $request->kategori;
        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = public_path() . '/image/blogs/' . $filename;
            file_put_contents($path, $decode);
            $pengalamanWisata->gambar = '/image/blogs/' . $filename;
        }
        $pengalamanWisata->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }
}
