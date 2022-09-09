<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    function show()
    {
        return view('songs/song', ['songs' => Song::all()]);
    }

}
