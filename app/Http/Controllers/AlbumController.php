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
        Log::Info(print_r($author, true));
        Log::Info(print_r($author->title, true));
        return view('albums/album', 
            [
                'album' => $album,
                'author' => $author
            ]
        );

    }
}
