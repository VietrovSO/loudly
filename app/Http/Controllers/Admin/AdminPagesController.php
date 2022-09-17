<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Album;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AdminPagesController extends Controller
{
    public function albums() {
        $albums = Album::all();
        $views = [];
        foreach($albums as $album){
            $albumObj = new stdClass();
            $albumObj->title = $album->title;
            $albumObj->release_date = $album->release_date;
            $albumObj->description = $album->description;
            $albumObj->id = $album->id;
            $albumObj->image = AlbumImage::find($album->image_id)->name;
            $albumObj->author = Author::find($album->author_id)->name;
            array_push($views, $albumObj);
        }
        return view('admin.pages.albums', [
            'albums' => $views
        ]);
    }

    public function createAlbum(Request $request) {
        $albums = new Album();
        $albums->title = $request->title;
        $albums->author_id = $request->author_id;
        $albums->release_date = $request->release_date;
        $albums->description = $request->description;
        $albums->image_id = 5;
        $albums->save();
        return view('admin.pages.albumCreate', [
        ]);
    }

    public function editAlbum($id) {
        $album = Album::find($id);
        $image = AlbumImage::find($album->image_id)->name;
        $author = Author::find($album->author_id);
        return view('admin.pages.albumEdit', [
            'album' => $album,
            'image' => $image,
            'author' => $author
        ]);
    }
}
