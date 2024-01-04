<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $currentDate = now();

        foreach (range(1, 10) as $index) {
            $uniqueCode = str_pad($index, 3, '0', STR_PAD_LEFT);

            DB::table('staff')->insert([
                'id' => 'PGW-' . $uniqueCode,
                'name' => $faker->name,
                'email' => $faker->email,
                'photo' => $faker->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('users')->insert([
                'username' => 'PGW-' . $uniqueCode,
                'password' => Hash::make('password'), // You should hash your password securely
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
