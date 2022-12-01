<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Song;
use App\Models\Album;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

class AdminPagesController extends Controller
{
    public function albums() {
        $albums = Album::all();
        $views = [];
        if (!empty( $albums )) {
            foreach($albums as $album){
                $albumObj = $album;
                if (isset(AlbumImage::find($album->image_id)->name)){
                    $albumObj->image = AlbumImage::find($album->image_id)->name;
                }
                $albumObj->author = Author::find($album->author_id)->name;
                array_push($views, $albumObj);
            }    
        }
        return view('admin.pages.albums', [
            'albums' => $views
        ]);
    }
}
