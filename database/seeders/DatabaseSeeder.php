<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AuthorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PublisherSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(StaffSeeder::class);
        $this->call(LoanBookSeeder::class);
        $this->call(ReturnPaymentBookSeeder::class);
        $this->call(ReturnReplaceBookSeeder::class);



    }
}
