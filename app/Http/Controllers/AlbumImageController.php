<?php

namespace App\Http\Controllers;

use App\Models\albumImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumImageController extends Controller
{
    public function create()
    {
        $photos = albumImage::all();
       return view('upload',compact('photos'));
    }
    public function store(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/images/albums/',$name);
        $photo = new albumImage();
        $photo->name = $name;
        $photo->save();
    
        return redirect()->back();
    }
}
