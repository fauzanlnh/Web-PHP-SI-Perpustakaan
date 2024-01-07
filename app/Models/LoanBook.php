<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanBook extends Model
{
    public $incrementing = false;
    protected $guarded = [''];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id', 'id');
    }

    public function returnPaymentBook()
    {
        return $this->hasOne(ReturnPaymentBook::class, 'loan_id', 'id');
    }

    public function returnReplaceBook()
    {
        return $this->hasOne(ReturnReplaceBook::class, 'loan_id', 'id');
    }
}
