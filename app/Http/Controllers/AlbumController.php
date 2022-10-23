<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    function show($id){
        $album = Album::findOrFail($id);
        $author = Author::findOrFail($album->author_id);
        $image = AlbumImage::find($album->image_id)->name;
        return view('albums/album', 
            [
                'album' => $album,
                'author' => $author,
                'image' => $image
            ]
        );

    }
}
