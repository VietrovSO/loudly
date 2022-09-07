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
        DB::table('music')->insert([
            'name' => $faker->word,
            'author' => $faker->name,
            'description' => $faker->text,
            'released_date' => $faker->date,
            'created_at' => $time->toDateTimeString(),
            'updated_at' => $time->toDateTimeString()
        ]);
    }
}
