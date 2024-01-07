<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReturnReplaceBookSeeder extends Seeder
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

            $loan = DB::table('loan_books')->where('id', $loanId)->first();
            $book = DB::table('books')->where('id', $loan->book_id)->first();


            // Get the last book id for the same category
            $lastBookId = DB::table('books')
                ->where('category_id', $book->category_id)
                ->max('id');
            if ($lastBookId) {
                $lastBookId = explode('-', $lastBookId);
                $lastBookId = $lastBookId[1];
            }

            // Increment the index for the new book
            $newIndex = str_pad((int) $lastBookId + 1, 3, '0', STR_PAD_LEFT);

            // Formulate the new book id
            $newBookId = $book->category_id . '-' . $newIndex;


            DB::table('books')->insert([
                'id' => $newBookId,
                'author_id' => $book->author_id,
                'publisher_id' => $book->publisher_id,
                'category_id' => $book->category_id,
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'publication_date' => $faker->date,
                'shelf_number' => $faker->bothify('??-###'),
                'status' => 'Tersedia',
                'price' => $book->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('return_replace_books')->insert([
                'loan_id' => $loanId,
                'replacement_date' => $faker->date,
                'replacement_book_id' => $newBookId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('loan_books')->where('id', $loanId)->update(['status' => 'Hilang']);

        }
    }
}
