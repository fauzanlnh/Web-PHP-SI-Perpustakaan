<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPaymentBook extends Model
{
    protected $guarded = ['id'];
    public function loanBook()
    {
        return $this->belongsTo(LoanBook::class, 'loan_id', 'id');
    }
}
