<?php

namespace App\Http\Controllers\Admin\createAlbum;

use App\Models\Album;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateAlbumController extends Controller
{
    public function getDataForAlbum(){
        $allAuthors = Author::all();
        return view('admin.pages.albumCreate', [
            'allAuthors' => $allAuthors
        ]);
    }

    public function createAlbumRequest(Request $request) {    
        $authorId = $request->author_id;
        $name = $request->file('image')->getClientOriginalName();

        $request->file('image')->storeAs('public/images/albums/',$name);
        $photo = new AlbumImage();
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
}
