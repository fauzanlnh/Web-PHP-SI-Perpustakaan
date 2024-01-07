<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $currentDate = now();

        foreach (range(1, 20) as $index) {
            $formattedDate = $currentDate->format('Ym');
            $uniqueCode = str_pad($index, 3, '0', STR_PAD_LEFT);

            DB::table('members')->insert([
                'id' => $formattedDate . '-' . $uniqueCode,
                'name' => $faker->name,
                'email' => $faker->email,
                'photo' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
