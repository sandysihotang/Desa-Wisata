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

    public function viewPengalaman(PengalamanWisata $pengalaman)
    {
        // dd($pengalaman->penulis->name);
        return view('pengalaman-wisata-detail', compact('pengalaman'));
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
