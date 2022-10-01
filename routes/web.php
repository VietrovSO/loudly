<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongListController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AlbumImageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPagesController;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
        Route::get('/albums', [AdminPagesController::class, 'albums'])->name('adminAlbums');
        Route::get('/albums/edit/{id}', [AdminPagesController::class, 'editAlbum'])->name('adminEditAlbums');
    
        Route::get('/albums/add', [AdminPagesController::class, 'createAlbumPage'])->name('getCreateAlbums');
        Route::post('/albums/add', [AdminPagesController::class, 'createAlbum'])->name('adminCreateAlbums');

        Route::post('/albums/edit', [AdminPagesController::class, 'updateAlbum'])->name('adminAlbumUpdate');
        Route::get('/albums/{id}', [AdminPagesController::class, 'editAlbum'])->name('adminEditAlbums');
        
        Route::get('/admin', function () {
            return view('admin/dashboard');
        })->name('adminDashboard');
    });
});

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
