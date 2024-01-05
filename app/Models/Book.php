<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $incrementing = false;
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }

    public function loanBook()
    {
        return $this->hasMany(LoanBook::class, 'book_id', 'id');
    }

    public function returnReplaceBook()
    {
        return $this->hasMany(ReturnReplaceBook::class, 'replacement_book_id', 'id');
    }
}
