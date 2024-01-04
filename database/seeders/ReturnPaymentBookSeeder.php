<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReturnPaymentBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            // Assuming 'loan_id' refers to the 'id' column in 'loan_books' table
            $loanIds = DB::table('loan_books')->where('status', '=', 'pending')->pluck('id')->toArray();
            $loanId = $faker->randomElement($loanIds);
            $user = DB::table('return_payment_books')->insert([
                'loan_id' => $loanId,
                'replacement_date' => $faker->date,
                'replacement_fine' => $faker->numberBetween(0, 50),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('loan_books')->where('id', $loanId)->update(['status' => 'Lost']);
        }

    }
}
