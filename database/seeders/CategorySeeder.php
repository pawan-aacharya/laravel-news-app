<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => $faker->sentence(2),
                'slug' => $faker->slug,
                'created_at' => $faker->dateTimeThisDecade,
                'updated_at' => $faker->dateTimeThisDecade,
            ]);
        }
    }
}
