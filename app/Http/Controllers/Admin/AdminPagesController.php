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

    public function search(Request $request)
    {
        $searchPattern = $request->searchPattern;
        $albums = Album::where('title', 'LIKE',"%{$searchPattern}%")->get();
        $views = [];

        foreach($albums as $album){
            $albumObj = $album;
            $albumObj->image = AlbumImage::find($album->image_id)->name;
            $albumObj->author = Author::find($album->author_id)->name;
            array_push($views, $albumObj);
        }
        
        return view('admin.pages.albums', [
            'albums' => $views,
            'search' => $searchPattern
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
        $albums->title = $request->title;
        $albums->author_id = $authorId;
        $albums->release_date = $request->release_date;
        $albums->description = $request->description;
        $albums->image_id = $photo->image_id;
        $albums->save();
        return redirect()->route('adminAlbums');
    }

    public function editAlbum($id) {
        $album = Album::find($id);
        if (isset(AlbumImage::find($album->image_id)->name)) {
            $image = AlbumImage::find($album->image_id)->name;
        }
        $author = Author::find($album->author_id);
        $allAuthors = Author::all();
        $songs = Song::where('album_id', $album->album_id);
        return view('admin.pages.albumEdit', [
            'album' => $album,
            'image' => $image ?? null,
            'albumAuthor' => $author,
            'allAuthors' => $allAuthors,
            'songs' => $songs
        ]);
    }
    
    public function updateAlbum(Request $request) {
        $album = Album::find($request->id);
        $album->title = $request->title;
        $album->author_id = $request->author_id;
        $album->release_date = $request->release_date;
        $album->description = $request->description;
        $imageId = $album->image_id;
        if ($request->file('song') !== null) {
            $name = $request->file('song')->getClientOriginalName();
            $request->file('song')->storeAs('public/songs/albums/', $name);
            $song = new Song();
            $song->title = $name;
            $song->album_id = $request->id;
            $song->author_id = $request->author_id;
            $song->genre_id = 2;
            $song->save();
        }
        if ($request->file('image') !== null) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/albums/', $name);
            $photo = new albumImage();
            $photo->name = $name;
            $photo->save();
            $imageId = $photo->image_id;
        }

        $album->image_id = $imageId;
        $album->save();
        return back();
    }

    public function removeAlbum($id) {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('adminAlbums');
    }
}
