<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\Author;
use App\Models\AlbumImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class albumsAPI extends Controller
{
    public function index() {
        $albums = Album::all();
        return Response::json([
            'albums' => $albums->toJson()
        ], 200);
    }
}
