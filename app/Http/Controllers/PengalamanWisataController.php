<?php

namespace App\Http\Controllers;

use App\Models\PengalamanWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengalamanWisataController extends Controller
{
    public function saveBlog(Request $request)
    {
        $pengalamanWisata = new PengalamanWisata();
        $pengalamanWisata->judul_pengalaman = $request->title;
        $pengalamanWisata->isi_pengalaman = $request->story;
        $pengalamanWisata->tanggal = Carbon::now();
        $pengalamanWisata->waktu = Carbon::now();
        $pengalamanWisata->penulis_id = 16;
        $pengalamanWisata->obj_wisata_id = 1;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0],'data')!==false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg')!==false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = public_path() .'/image/blogs/' . $filename;
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
