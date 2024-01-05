<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $incrementing = false;
    protected $guarded = [''];
    public function loanBook()
    {
        return $this->hasMany(LoanBook::class, 'member_id', 'id');
    }
}
