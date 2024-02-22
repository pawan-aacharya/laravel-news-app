<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('news')->insert([
                'title' => $faker->sentence(2),
                'description' => $faker->paragraph(4),
                'content' => $faker->text(1000),
                'image' => $faker->imageUrl,
                'author' => $faker->name,
                'published_date' => $faker->dateTimeThisYear,
                'slug' => $faker->slug,
                'category_id' => $faker->numberBetween(1, 10),
                'count' => $faker->numberBetween(1, 1000),
                'created_at' => $faker->dateTimeThisDecade,
                'updated_at' => $faker->dateTimeThisDecade,
            ]);
        }
    }
}
