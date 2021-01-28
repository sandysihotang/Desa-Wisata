<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;

class LinkSocialMediaController extends Controller
{
    public function save(Request $request)
    {
        $linkFacebook = SocialMedia::where("provider", "=", "Facebook")->first();
        $linkFacebook->link = $request->facebook;
        $linkFacebook->save();
        $linkInstagram = SocialMedia::where("provider", "=", "Instagram")->first();
        $linkInstagram->link = $request->instagram;
        $linkInstagram->save();
        $linkYoutube = SocialMedia::where("provider", "=", "Youtube")->first();
        $linkYoutube->link = $request->youtube;
        $linkYoutube->save();
        $linkTwitter = SocialMedia::where("provider", "=", "Twitter")->first();
        $linkTwitter->link = $request->twitter;
        $linkTwitter->save();
    }
    public function getAllLink()
    {
        $social_media = SocialMedia::all();
        return response()->json($social_media);
    }
}