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
            $albumObj = $album;
            $albumObj->image = AlbumImage::find($album->image_id)->name;
            $albumObj->author = Author::find($album->author_id)->name;
            array_push($views, $albumObj);
        }
        return view('admin.pages.albums', [
            'albums' => $views
        ]);
    }

    public function search(Request $request)
    {
        $s = $request->s;
 
        $albums = Album::where('title', 'LIKE',"%{$s}%")->get();
        
        $views = [];
        foreach($albums as $album){
            $albumObj = $album;
            $albumObj->image = AlbumImage::find($album->image_id)->name;
            $albumObj->author = Author::find($album->author_id)->name;
            array_push($views, $albumObj);
        }
        
        return view('admin.pages.albums', [
            'albums' => $views
        ]);
    }

    public function createAlbumPage(){
        $allAuthors = Author::all();
        return view('admin.pages.albumCreate', [
            'allAuthors' => $allAuthors
        ]);
    }

    public function createAlbum(Request $request) {      
        $allAuthors = Author::all();
        $authorId = $request->author_id;
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/images/albums/',$name);
        $photo = new albumImage();
        $photo->name = $name;
        $photo->save();

        if ($request->author_id == 'new') { 
            $author = new Author();
            $author->name = $request->author;
            $author->description='qwrqwrq';
            $author->save();
            $authorId = $author->id;
        }

        $albums = new Album();
        $albums->image_id = $photo->id;

        $albums->title = $request->title;
        $albums->author_id = $authorId;
        $albums->release_date = $request->release_date;
        $albums->description = $request->description;
        $albums->image_id = $photo->id;
        $albums->save();
        return redirect()->route('adminAlbums');
    }

    public function editAlbum($id) {
        $album = Album::find($id);
        $image = AlbumImage::find($album->image_id)->name;
        $author = Author::find($album->author_id);
        $allAuthors = Author::all();
        return view('admin.pages.albumEdit', [
            'album' => $album,
            'image' => $image,
            'albumAuthor' => $author,
            'allAuthors' => $allAuthors
        ]);
    }
    
    public function updateAlbum(Request $request) {
        $album = Album::find($request->id);
        $album->title = $request->title;
        $album->author_id = $request->author_id;
        $album->release_date = $request->release_date;
        $album->description = $request->description;
        $album->image_id = 2;
        $album->save();
        return back();
    }

    public function removeAlbum($id) {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('adminAlbums');
    }
}
