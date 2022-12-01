<?php

namespace App\Http\Controllers\Admin\editAlbum;

use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditAlbumController extends Controller
{
    public function getDataForEditAlbum($id) {
        $album = Album::find($id);
        if (isset(AlbumImage::find($album->image_id)->name)) {
            $image = AlbumImage::find($album->image_id)->name;
        }
        $author = Author::find($album->author_id);
        $allAuthors = Author::all();
        $allGenres = Genre::all();
        $songs = Song::where('album_id', $album->album_id);
        return view('admin.pages.albumEdit', [
            'album' => $album,
            'image' => $image ?? null,
            'albumAuthor' => $author,
            'allAuthors' => $allAuthors,
            'songs' => $songs,
            'allGenres'=>$allGenres
        ]);
    }
   
    
    public function updateAlbumRequest(Request $request) {
        $album = Album::find($request->id);
        $album->title = $request->title;
        $album->author_id = $request->author_id;
        $album->release_date = $request->release_date;
        $album->description = $request->description;
        $imageId = $album->image_id;
        if($request->genre_id == 'new')
        {
            $genre = new Genre();
            $genre->title = $request->genre;
            $genre->save();
            $genreId = $genre->id;
        }

        $album->genre_id = $genreId;
        if ($request->file('song') !== null) {
            $name = $request->file('song')->getClientOriginalName();
            $request->file('song')->storeAs('public/songs/albums/', $name);
            $song = new Song();
            $song->title = $name;
            $song->album_id = $request->id;
            $song->author_id = $request->author_id;
            $song->save();
        }
        if ($request->file('image') !== null) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/albums/', $name);
            $photo = new AlbumImage();
            $photo->name = $name;
            $photo->save();
            $imageId = $photo->image_id;
        }

        $album->image_id = $imageId;
        $album->save();
        return back();
    }
}
