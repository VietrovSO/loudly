<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    $page = Page::where('slug', $slug)->firstOrFail();
        
    return view('pages.show', ['page' => $page]);
}
