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
        $size = $request->file('image')->getSize();
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/images/',$name);
        $photo = new albumImage();
        $photo->name = $name;
        $photo->size = $size;
        $photo->save();
    
        return redirect()->back();
    }
}
