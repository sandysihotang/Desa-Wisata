<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use App\Models\PemesananPaket;
use App\Models\PengalamanWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanWisataController extends Controller
{

    public function index(Request $request)
    {
        visits('App\Models\Home')->increment();

        if (!$request->exists('sort_penulis')) {
            $pengalaman = PengalamanWisata::with('penulis')->where('status', '=', 2)->paginate(9);
        } else {
            $query = $request->query('sort_penulis');
            $pengalaman = PengalamanWisata::with('penulis')->where('status', '=', 2)->where('penulis_id', '=', $query)->paginate(9);
        }
        return view('pengalaman-wisata', compact('pengalaman'));
    }

    public function pengalamanSaya()
    {
        visits('App\Models\Home')->increment();

        $user = Auth::user()->id_user;
        $pengalaman = PengalamanWisata::with('penulis')->where('penulis_id', '=', $user)->orderBy('status', 'ASC')->orderBy('tanggal', 'ASC')->get();
        return view('pengalaman-saya', compact('pengalaman'));
    }


    public function updateArtikel(Request $request, $id)
    {
        $pengalaman = PengalamanWisata::find($id);
        $pengalaman->judul_pengalaman = $request->title;
        $pengalaman->isi_pengalaman = $request->story;
        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/blogs/' . $filename;
            file_put_contents($path, $decode);
            $pengalaman->gambar = '/image/blogs/' . $filename;
        }
        $pengalaman->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function deleteArtikel($id)
    {
        $pengalaman = PengalamanWisata::find($id);
        $pengalaman->delete();
        return redirect()->back();
    }
    public function deleteArtikelKonfirmasi($id)
    {
        $pengalaman = PengalamanWisata::find($id);
        $pengalaman->delete();
        return redirect('/konfirmasi-artikel');
    }
    public function deletePesanan($id)
    {
        $pengalaman = PemesananPaket::find($id);
        $pengalaman->delete();
        return redirect()->back();
    }

    public function saveBlog(Request $request)
    {
        $user = Auth::user();
        $pengalamanWisata = new PengalamanWisata();
        $pengalamanWisata->judul_pengalaman = $request->title;
        $pengalamanWisata->isi_pengalaman = $request->story;
        $pengalamanWisata->tanggal = Carbon::now();
        $pengalamanWisata->waktu = Carbon::now();
        $pengalamanWisata->status = 1;
        $pengalamanWisata->penulis_id = $user->id_user;
        $explode = explode(',', $request['img']);
        if (strpos($explode[0], 'data') !== false) {
            $explode = explode(',', $request['img']);
            $decode = base64_decode($explode[1]);
            if (strpos($explode[1], 'jpeg') !== false)
                $extension = 'jpg';
            else
                $extension = 'png';

            $filename = date("Ymdhis") . '.' . $extension;
            $path = './image/blogs/' . $filename;
            file_put_contents($path, $decode);
            $pengalamanWisata->gambar = '/image/blogs/' . $filename;
        }
        $pengalamanWisata->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }

    public function kelolaArtikel()
    {
        $pengalaman = PengalamanWisata::with('penulis')->with('kategoriWisata')->where('status', '=', 2)->sortable()->paginate(20);
        return view('admin.kelola-artikel', compact('pengalaman'));
    }

    public function getAllArticles()
    {
        $articles = PengalamanWisata::with('penulis')->where('status', '=', 1)->paginate(20);
        return response()->json($articles);
    }

    public function getArticleDetail($id)
    {
        $article = PengalamanWisata::with('penulis')->find($id);
        return response()->json($article);
    }

    public function approveArtkel(Request $request)
    {
        $pengalaman = PengalamanWisata::find($request->id);
        $pengalaman->status = 2;
        $pengalaman->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function getKategori()
    {
        $objekWisata = ObjekWisata::all();
        return response()->json($objekWisata);
    }

    public function viewPengalaman(PengalamanWisata $pengalaman)
    {
        visits('App\Models\Home')->increment();
        // visits($pengalaman)->increment();
        // $count = visits($pengalaman)->count();

        return view('pengalaman-wisata-detail');
    }
}
