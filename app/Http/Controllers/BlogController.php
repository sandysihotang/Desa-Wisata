<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function UploadImage(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
        $picName = date('Y-m-d') . time() . '.' . $request->image->extension();
        $request->image->move('./image/blogs/', $picName);
        return response()->json([
            'success' => 1,
            'file' => [
                'url' => env('URL_IMAGE') . 'image/blogs/' . $picName,
            ]
        ]);
    }

    public function UploadImageUrl(Request $request)
    {
        return response()->json([
            'success' => 1,
            'file' => [
                'url' => $request->image
            ]
        ]);
    }
}
