<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the "books" relationship
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
