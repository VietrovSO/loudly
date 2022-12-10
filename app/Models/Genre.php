<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    public function albumsCount(){
        return $this->hasMany(Album::class)->count();
    }

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($genre) {
            $genre->albums()->each(function($album) {
                $album->delete();
            });
        });
    }
}
