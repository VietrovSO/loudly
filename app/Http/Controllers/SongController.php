<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    function show()
    {
        return view('songs/song', ['songs' => Song::all()]);
    }
}
