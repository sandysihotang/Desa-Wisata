<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ObjekWisata;

class ObjekWisataController extends Controller
{
    public function viewObjek(ObjekWisata $objek)
    {
    	// dd($objek);	
        return view('wisata-desa-detail', compact('objek'));
    }
}
