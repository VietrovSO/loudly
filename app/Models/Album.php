<?php

namespace App\Models;

use App\Models\AlbumImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;
    
    public function albumImage()
    {
        return $this->hasOne(AlbumImage::class, 'image_id', 'image_id');
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($album) {
            $album->albumImage()->delete();
        });
    }
}
