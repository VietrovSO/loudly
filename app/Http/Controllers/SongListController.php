<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongListController extends Controller
{
    function show()
    {
        return Song::all();
        // return view('home/songsList');
    }
}
