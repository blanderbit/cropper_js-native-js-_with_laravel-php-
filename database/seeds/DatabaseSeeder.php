<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['title' => '16/9'],
            ['title' => '3/4'],
            ['title' => '2/3'],
            ['title' => '1'],
            ['title' => 'free'],
        ];
        $faker = Faker::create();
        $titlesCat = $titlesTag = [];
        for($i = 0; $i <= 5; $i++) {
            $titlesCat[] = ['title' => $faker->name];
            $titlesTag[] = ['title' => $faker->name];
        }

        DB::table('tags')->insert($titlesTag);
        DB::table('categories')->insert($titlesCat);
        DB::table('types')->insert($types);
    }
}
