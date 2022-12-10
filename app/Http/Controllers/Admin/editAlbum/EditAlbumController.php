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
    public function getDataForEditAlbum($id)
    {
        $album = Album::find($id);
        if (isset(AlbumImage::find($album->image_id)->name)) {
            $image = AlbumImage::find($album->image_id)->name;
        }
        $author = Author::find($album->author_id);
        $genre = Genre::find($album->genre_id);
        $allAuthors = Author::all();
        $allGenres = Genre::all();
        $songs = Song::where('album_id', $album->album_id);
        // dd($genre);
        return view('admin.pages.albumEdit', [
            'album' => $album,
            'image' => $image ?? null,
            'albumAuthor' => $author,
            'albumGenre' => $genre,
            'allAuthors' => $allAuthors,
            'songs' => $songs,
            'allGenres' => $allGenres
        ]);
    }


    public function updateAlbumRequest(Request $request)
    {
        $authorId = $request->author_id;
        $genreId = $request->genre_id;

        if ($authorId == 'new') {
            $author = new Author();
            $author->name = $request->author;
            $author->description = '';
            $author->save();
            $authorId = $author->id;
        }
        if ($genreId == 'new') {
            $genre = new Genre();
            $genre->title = $request->genre;
            $genre->save();
            $genreId = $genre->id;
        }

        if ($request->file('song') !== null) {
            $name = $request->file('song')->getClientOriginalName();
            $request->file('song')->storeAs('public/songs/albums/', $name);
            $song = new Song();
            $song->title = $name;
            $song->album_id = $request->id;
            $song->author_id = $request->author_id;
            $song->save();
        }

        $album = Album::find($request->id);
        $imageId = $album->image_id;
        
        if ($request->file('image') !== null) {
            $name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images/albums/', $name);
            $photo = new AlbumImage();
            $photo->name = $name;
            $photo->save();
            $imageId = $photo->image_id;
        }

        $album->title = $request->title;
        $album->author_id = $authorId;
        $album->genre_id = $genreId;
        $album->release_date = $request->release_date;
        $album->description = $request->description;
        // $imageId = $album->image_id;

        $album->image_id = $imageId;
        $album->save();
        return back();
    }
}