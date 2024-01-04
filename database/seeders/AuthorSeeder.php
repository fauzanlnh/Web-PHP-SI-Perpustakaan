<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('authors')->insert([
                'name' => $faker->name,
                'birth_date' => $faker->date,
                'country' => $faker->country,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
