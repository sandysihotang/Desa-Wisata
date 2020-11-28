<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function UploadImage(Request $request)
    {

        $this->validate($request, [
            'upload' => 'required|mimes:jpeg,jpg,png'
        ]);
        $picName = date('Y-m-d') . time() . '.' . $request->upload->extension();
        $request->upload->move('./image/blogs/', $picName);
        return response()->json([
            "uploaded" => 1,
            "fileName" => $picName,
            "url" => "/image/blogs/" . $picName
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
