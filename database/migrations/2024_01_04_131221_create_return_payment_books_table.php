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
        Schema::create('return_payment_books', function (Blueprint $table) {
            $table->id();
            $table->string('loan_id', 20);
            $table->date('replacement_date');
            $table->integer('replacement_fine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_payment_books');
    }
};
