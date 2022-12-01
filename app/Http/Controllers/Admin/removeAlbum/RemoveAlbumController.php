<?php

namespace App\Http\Controllers\Admin\removeAlbum;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RemoveAlbumController extends Controller
{
    public function removeAlbumById($id) {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('adminAlbums');
    }
}
