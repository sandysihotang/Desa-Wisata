<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDesa;

class ProfilDesaController extends Controller
{

    public function view(ProfilDesa $data)
    {
        return view('profil-desa', compact('data'));
    }

    public function index()
    {
        $list = ProfilDesa::paginate(9);
        return view('admin.profil-desa-index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahProfil(Request $request)
    {
        // $user = Auth::user();
        $newProfil = new ProfilDesa();
        $newProfil->nama_profil = $request->title;
        $newProfil->deskripsi = $request->story;

        $newProfil->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }

    public function getProfil($id)
    {
        $profil = ProfilDesa::find($id);
        return response()->json($profil);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request, $id)
    {
        $profil = ProfilDesa::find($id);
        $profil->nama_profil = $request->title;
        $profil->deskripsi = $request->story;
        $profil->save();

        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProfil($id)
    {
        $profil = ProfilDesa::find($id);
        $profil->delete();
        return redirect()->back();
    }
}
