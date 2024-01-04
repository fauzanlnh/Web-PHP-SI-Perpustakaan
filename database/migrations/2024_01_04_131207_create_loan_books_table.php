<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loan_books', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('book_id', 15);
            $table->string('member_id', 15);
            $table->string('staff_id', 15);
            $table->date('loan_date');
            $table->date('return_date');
            $table->date('estimated_return_date');
            $table->integer('fine');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_books');
    }
};
