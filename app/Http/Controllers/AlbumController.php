<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    function show($id){
        $album = Album::findOrFail($id);
        $author = Author::findOrFail($album->author_id);
        return view('albums/album', 
            [
                'album' => $album,
                'author' => $author,
            ]
        );

    }
}
