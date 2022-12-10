<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Genre;
use App\Models\Author;
use App\Http\Controllers\Controller;

class AdminGenresController extends Controller
{
    public function genres() {
        $genres = Genre::all();
        $genresArr = [];
        foreach($genres as $genre){
            $authorObj = $genre;
            $authorObj->albumsCount = $genre->albumsCount();
            array_push($genresArr, $authorObj);
        }    
        return view('admin.pages.genres', [
            'genres' => $genresArr
        ]);
    }

    public function removeGenre($id) {
        Genre::find($id)->delete();
        return back();
    }
}
