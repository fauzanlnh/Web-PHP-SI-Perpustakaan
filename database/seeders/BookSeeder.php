<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            $authorId = $faker->numberBetween(1, 10);
            $publisherId = $faker->numberBetween(1, 10);
            $category = DB::table('categories')->inRandomOrder()->first();

            // Get the last book id for the same category
            $lastBookId = DB::table('books')
                ->where('category_id', $category->id)
                ->max('id');
            if ($lastBookId) {
                $lastBookId = explode('-', $lastBookId);
                $lastBookId = $lastBookId[1];
                Log::alert($lastBookId);
            } 

            // Increment the index for the new book
            $newIndex = str_pad((int) $lastBookId + 1, 3, '0', STR_PAD_LEFT);

            // Formulate the new book id
            $newBookId = $category->id . '-' . $newIndex;

            // Generate a random shelf number (1-5) based on category_id
            $shelfNumber = $category->id . '-' . $faker->numberBetween(1, 5);

            DB::table('books')->insert([
                'id' => $newBookId,
                'author_id' => $authorId,
                'publisher_id' => $publisherId,
                'category_id' => $category->id,
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'publication_date' => $faker->date,
                'shelf_number' => $shelfNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
