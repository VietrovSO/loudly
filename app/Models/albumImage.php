<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlbumImage extends Model
{
    use HasFactory;
    protected $table = 'album_images';
    protected $primaryKey = 'image_id';
    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
