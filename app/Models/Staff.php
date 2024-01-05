<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $incrementing = false;
    protected $guarded = [''];

    public function user()
    {
        return $this->hasOne(User::class, 'username', 'id');
    }

    public function loanBook()
    {
        return $this->hasMany(LoanBook::class, 'staff_id', 'id');
    }
}
