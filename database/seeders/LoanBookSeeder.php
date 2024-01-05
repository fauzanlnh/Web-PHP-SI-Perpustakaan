<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LoanBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $currentDate = now();

        
        foreach (range(1, 50) as $index) {
            $formattedDate = $currentDate->format('Ymd');
            $uniqueCode = str_pad($index, 3, '0', STR_PAD_LEFT);

            $loanDate = $currentDate->subDays(random_int(1, 30));
            $estimatedReturnDate = $loanDate->copy()->addWeek();

            DB::table('loan_books')->insert([
                'id' => $formattedDate . '-' . $uniqueCode,
                'book_id' => $faker->randomElement(DB::table('books')->pluck('id')),
                'member_id' => $faker->randomElement(DB::table('members')->pluck('id')),
                'staff_id' => $faker->randomElement(DB::table('staff')->pluck('id')),
                'loan_date' => $loanDate,
                'return_date' => $currentDate->addDays(random_int(1, 30)),
                'estimated_return_date' => $estimatedReturnDate,
                'fine' => $faker->numberBetween(0, 100),
                'status' => $faker->randomElement(['Pending', 'Dikembalikan', 'Hilang']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
