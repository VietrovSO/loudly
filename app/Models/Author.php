<?php

namespace App\Models;

use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
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
        self::deleting(function($author) {
            $author->albums()->each(function($album) {
                $album->delete();
            });
        });
    }
}
