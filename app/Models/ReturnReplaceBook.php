<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnReplaceBook extends Model
{
    protected $guarded = ['id'];
    public function loanBook()
    {
        return $this->belongsTo(LoanBook::class, 'loan_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'replacement_book_id', 'id');
    }
}
