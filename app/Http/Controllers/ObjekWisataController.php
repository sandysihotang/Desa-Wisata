<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjekWisataController extends Controller
{
    public function viewObjek()
    {
    	$data = DB::table('objek_wisata')->get();
    	dump($data);
        return view('wisata-desa-detail', '');
    }
}
