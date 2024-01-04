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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('username')->references('id')->on('staff');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('loan_books', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('staff_id')->references('id')->on('staff');
        });

        Schema::table('return_payment_books', function (Blueprint $table) {
            $table->foreign('loan_id')->references('id')->on('loan_books');
        });

        Schema::table('return_replace_books', function (Blueprint $table) {
            $table->foreign('loan_id')->references('id')->on('loan_books');
            $table->foreign('replacement_book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('username')->references('id')->on('staff');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('author_id')->references('id')->on('authors');
            $table->dropForeign('publisher_id')->references('id')->on('publishers');
            $table->dropForeign('category_id')->references('id')->on('categories');
        });

        Schema::table('loan_books', function (Blueprint $table) {
            $table->dropForeign('book_id')->references('id')->on('books');
            $table->dropForeign('member_id')->references('id')->on('members');
            $table->dropForeign('staff_id')->references('id')->on('staff');
        });

        Schema::table('return_payment_books', function (Blueprint $table) {
            $table->dropForeign('loan_id')->references('id')->on('loan_books');
        });

        Schema::table('return_replace_books', function (Blueprint $table) {
            $table->dropForeign('loan_id')->references('id')->on('loan_books');
        });
    }
};
