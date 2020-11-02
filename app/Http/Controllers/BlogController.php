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
        $request->image->move(public_path('image/blogs/'), $picName);
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        return response()->json([
            'success' => 1,
            'file' => [
                'url' => 'http://localhost:8000/image/blogs/' . $picName,
            ]
        ]);
    }
}
