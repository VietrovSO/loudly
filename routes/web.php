<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongListController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AlbumImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { return view('welcome'); });

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('song', [SongController::class, 'show']);
Route::get('/album/{id}', [AlbumController::class, 'show']);

Route::get('/', function () {
    $songs = DB::table('songs')->get();
    return view('home/songsList', ['songs' => $songs]);
});

Route::get('/upload',[AlbumImageController::class,'create']);
Route::post('/upload',[AlbumImageController::class,'store']);