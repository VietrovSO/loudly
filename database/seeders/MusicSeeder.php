<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        $faker = Faker::create();
        DB::table('songs')->insert([
            'title' => $faker->word,
            'album_id' => 1,
            'author_id' => 1,
            'genre_id' => 1,
            'created_at' => $time->toDateTimeString(),
            'updated_at' => $time->toDateTimeString()
        ]);
    }
}
