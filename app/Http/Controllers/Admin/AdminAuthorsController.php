<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Author;
use App\Http\Controllers\Controller;

class AdminAuthorsController extends Controller
{
    public function authors() {
        $authors = Author::all();
        $authorsArr = [];
        foreach($authors as $author){
            $authorObj = $author;
            $authorObj->albumsCount = $author->albumsCount();
            array_push($authorsArr, $authorObj);
        }    
        return view('admin.pages.authors', [
            'authors' => $authorsArr
        ]);
    }

    public function removeAuthor($id) {
        Author::find($id)->delete();
        return back();
    }
}
