<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use App\Models\PengalamanWisata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengalamanWisataController extends Controller
{

    public function index(Request $request)
    {
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
        $user = Auth::user()->id_user;
        $pengalaman = PengalamanWisata::with('penulis')->where('penulis_id', '=', $user)->get();
        return view('pengalaman-saya', compact('pengalaman'));
    }


    public function updateArtikel(Request $request, $id)
    {
        $pengalaman = PengalamanWisata::find($id);
        $pengalaman->judul_pengalaman = $request->title;
        $pengalaman->isi_pengalaman = $request->story;
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
        $pengalaman = PengalamanWisata::with('penulis')->with('kategoriWisata')->where('status', '=', 2)->get();
        return view('admin.kelola-artikel', compact('pengalaman'));
    }

    public function getAllArticles()
    {
        $articles = PengalamanWisata::with('penulis')->where('status', '=', 1)->get();
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

    public function viewPengalaman()
    {
        return view('pengalaman-wisata-detail');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
