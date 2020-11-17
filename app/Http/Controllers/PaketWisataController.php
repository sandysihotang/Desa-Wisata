<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketWisata;
use App\Models\PemesananPaket;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = PaketWisata::paginate(9);
        return view('paket-wisata', compact('list'));
    }

    public function viewPaket(PaketWisata $paket)
    {
        // dd($paket);  
        return view('paket-wisata-detail', compact('paket'));
    }

    public function riwayatPesanan($id)
    {
        $user = Auth::user();
        // dd($user->id_user);
        $listPesanan = PemesananPaket::where('akun_id', $user->id_user)->get();
        // dd($listPesanan);

        return view('riwayat-pemesanan', compact('listPesanan'));
    }

    public function viewDetailPesanan(PemesananPaket $pesanan)
    {
        // $user = Auth::user();
        // dd($user->id_user);
        // $listPesanan = PemesananPaket::where('akun_id', $user->id_user)->get();
        // dd($listPesanan);

        return view('admin.view-pesanan', compact('pesanan'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
