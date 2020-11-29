<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaDesa;

class BeritaDesaController extends Controller
{
    public function viewBerita(BeritaDesa $berita)
    {
        return view('berita-detail', compact('berita'));
    }

    public function index()
    {
        $list = BeritaDesa::paginate(9);
        return view('berita', compact('list'));
    }

    public function indexAdmin()
    {
        $list = BeritaDesa::sortable()->paginate(20);
        return view('admin.berita-index', compact('list'));
    }

    public function tambahBerita(Request $request)
    {
        // $user = Auth::user();
        $newBerita = new BeritaDesa();
        $newBerita->judul_berita = $request->title;
        $newBerita->isi_berita = $request->story;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/berita/' . $filename;
            file_put_contents($path, $decode);
            $newBerita->file_foto = '/image/berita/' . $filename;
        }

        $newBerita->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }

    public function getBerita($id)
    {
        $berita = BeritaDesa::find($id);
        return response()->json($berita);
    }

    public function updateBerita(Request $request, $id)
    {
        $berita = BeritaDesa::find($id);
        $berita->judul_berita = $request->title;
        $berita->isi_berita = $request->story;

        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/berita/' . $filename;
            file_put_contents($path, $decode);
            $berita->file_foto = '/image/berita/' . $filename;
        }

        $berita->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function hapusBerita($id)
    {
        $berita = BeritaDesa::find($id);
        $berita->delete();
        return redirect('/kelola-berita');
    }
}
