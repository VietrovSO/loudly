<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{

    function show($id){
        Log::info('Album id:', ['id' => $id]);
        return view('albums/album', ['album' => Album::findOrFail($id)]);
    }
}
