<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KontakPengelola;

class KontakPengelolaController extends Controller
{
    public function index()
    {
    	$list = KontakPengelola::paginate(20);
    	return view('admin.kontak-pengelola-index', compact('list'));
    }

    public function create(Request $request)
    {
        $kontak = new KontakPengelola;
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->no_hp = $request->no_hp;
        $kontak->posisi = $request->tanggungjawab;

        $kontak->save();

        return redirect('/kelola-kontak');
    }

    public function edit(Request $request, $id)
    {
        $kontak = KontakPengelola::find($id);
        $kontak->nama = $request->nama;
        $kontak->email = $request->email;
        $kontak->no_hp = $request->no_hp;
        $kontak->posisi = $request->tanggungjawab;

        $kontak->save();

        return redirect('/kelola-kontak');
    }

    public function delete($id)
    {
        $kontak = KontakPengelola::find($id);
        $kontak->delete();

        return redirect('/kelola-kontak');
    }
}
