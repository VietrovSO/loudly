<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlbumIdToSongs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('author');
            $table->dropColumn('release_date');
            $table->unsignedBigInteger('album_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('genre_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->date('release_date');
            $table->timestamps();
            $table->dropColumn('album_id');
            $table->dropColumn('author_id');
            $table->dropColumn('genre_id');
        });
    }
}
