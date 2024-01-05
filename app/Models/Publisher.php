<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = ['id'];
    public function book()
    {
        return $this->hasMany(Book::class, 'publisher_id', 'id');
    }
}
