<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Define the "categories" relationship
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_categories');
    }
}
