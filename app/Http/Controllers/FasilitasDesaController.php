<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasDesa;

class FasilitasDesaController extends Controller
{
    public function view(FasilitasDesa $data)
    {
        return view('fasilitas-desa', compact('data'));
    }

    // public function viewUmum(FasilitasDesa $data)
    // {
    //     return view('profil-desa/fasilitas-umum', compact('data'));
    // }

    // public function viewAksesibilitas(FasilitasDesa $data)
    // {
    //     return view('profil-desa/aksesibilitas', compact('data'));
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = FasilitasDesa::paginate(9);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFasilitas($id)
    {
        $fasilitas = FasilitasDesa::find($id);
        $fasilitas->delete();
        return redirect()->back();
    }
}
