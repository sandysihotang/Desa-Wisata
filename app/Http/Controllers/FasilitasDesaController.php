<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasDesa;

class FasilitasDesaController extends Controller
{
    public function view(FasilitasDesa $data)
    {
        visits('App\Models\Home')->increment();
        // visits($data)->increment();
        // $count = visits($data)->count();

        return view('fasilitas-desa', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = FasilitasDesa::sortable()->paginate(20);
        return view('admin.fasilitas-index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambahFasilitas(Request $request)
    {
        // $user = Auth::user();
        $newFasilitas = new FasilitasDesa();
        $newFasilitas->nama_fasilitas = $request->title;
        $newFasilitas->deskripsi = $request->story;

        $newFasilitas->save();


        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);

    }

    public function getFasilitas($id)
    {
        $fasilitas = FasilitasDesa::find($id);
        return response()->json($fasilitas);
    }

    public function updateFasilitas(Request $request, $id)
    {
        $fasilitas = FasilitasDesa::find($id);
        $fasilitas->nama_fasilitas = $request->title;
        $fasilitas->deskripsi = $request->story;
        $fasilitas->save();
        return response()->json([
            'status' => 'success',
            'code' => 200
        ]);
    }

    public function deleteFasilitas($id)
    {
        $fasilitas = FasilitasDesa::find($id);
        $fasilitas->delete();
        return redirect()->back();
    }
}
