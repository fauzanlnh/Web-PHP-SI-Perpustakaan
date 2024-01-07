<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            $formattedDate = $currentDate->format('Ym');
            $uniqueCode = str_pad($index, 3, '0', STR_PAD_LEFT);
            $status = $faker->randomElement(['Pending', 'Dikembalikan']);

            // Create loan_date
            $loanDate = now()->format('Y-m-d');

            // Create estimated_return_date by adding 7 days to loan_date
            $estimatedReturnDate = now()->addDays(7)->format('Y-m-d');

            // Create return_date by adding random days to loan_date
            $returnDate = now()->addDays(random_int(1, 30))->format('Y-m-d');

            // Calculate the difference in days

            if ($status == 'Pending') {
                $fine = 0;
            } else if ($status == 'Dikembalikan') {
                $differentDays = now()->parse($returnDate)->diffInDays(now()->parse($estimatedReturnDate));
                // Set the fine based on the conditions
                if ($returnDate < $estimatedReturnDate) {
                    $fine = 0;
                } else {
                    $fine = 5000 * $differentDays;
                }
            }

            DB::table('loan_books')->insert([
                'id' => $formattedDate . '-' . $uniqueCode,
                'book_id' => $faker->randomElement(DB::table('books')->pluck('id')),
                'member_id' => $faker->randomElement(DB::table('members')->pluck('id')),
                'staff_id' => $faker->randomElement(DB::table('staff')->pluck('id')),
                'loan_date' => $loanDate,
                'return_date' => $returnDate,
                'estimated_return_date' => $estimatedReturnDate,
                'fine' => $fine,
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
