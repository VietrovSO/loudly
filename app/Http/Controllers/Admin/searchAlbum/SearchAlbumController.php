<?php

namespace App\Http\Controllers\Admin\searchAlbum;

use App\Models\Album;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class SearchAlbumController extends Controller
{
    public function searchAlbum(Request $request)
    {
        $searchPattern = $request->searchPattern;
        $views = [];

        // dd(empty($searchPattern));

        if (!isset($searchPattern) || empty($searchPattern)) {
            $albums = Album::all();
        } else {
            $albums = Album::where('title', 'LIKE', "%{$searchPattern}%")->get();
        }

        foreach ($albums as $album) {
            $albumObj = $album;
            if (AlbumImage::find($album->image_id)) {
                $albumObj->image = AlbumImage::find($album->image_id)->name;
            }
            $albumObj->author = Author::find($album->author_id)->name;
            array_push($views, $albumObj);
        }

        return view('admin.pages.albums', [
            'albums' => $views,
            'search' => $searchPattern
        ]);
    }
}