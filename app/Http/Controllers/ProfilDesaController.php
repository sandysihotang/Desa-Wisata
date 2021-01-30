<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilDesa;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{

    public function view(ProfilDesa $data)
    {
        visits('App\Models\Home')->increment();
        // visits($data)->increment();
        // $count = visits($data)->count();
        return view('profil-desa', compact('data'));
    }

    public function index()
    {
        $id = array(1, 2, 3, 4, 8);
        $list = ProfilDesa::whereNotIn('id_profil', $id)->sortable()->paginate(20);

        $listData = ProfilDesa::whereIn('id_profil', array(2, 3))->sortable()->paginate(20);

        return view('admin.profil-desa-index', compact('list', 'listData'));
    }

    public function kelolaLogo()
    {
        $logo = ProfilDesa::find(1);

        return view('admin.logo-index', compact('logo'));
    }

    public function saveLogo(Request $request, $id)
    {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'filename' => 'max:3000',
            'filename' => 'dimensions:max_width=1200',
        ]);

        // $imageSize = getimagesize($request->file('filename'));
        // $imageWidth = $imageSize[0];
        // $imageHeigth = $imageSize[1];

        // dd($imageSize);
        // if($imageSize > 1200){
        //     dd('ups, gabisa lebih dari 1200');
        // }

        if ($request->hasfile('filename')) {
            $image = $request->file('filename');
            // {
            $name = $image->getClientOriginalName();
            $image->move('./image/logo', $name);
            $data = '/image/logo/' . $name;  // your folder path
            // $data = $name;
            // }
        }

        $logo = ProfilDesa::find($id);
        $logo->deskripsi = $data;

        $logo->save();


        return redirect('/kelola-logo-desa');
    }

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

    /** UNTUK DOWNLOAD USER MANUAL **/
    public function downloadUserManual()
    {
        $file = ProfilDesa::find(4);

        return Storage::disk('local_public')->download($file->deskripsi);
        // return response()->download('public' . '\user-manual\UserManual_Administrator.pdf');
    }
}