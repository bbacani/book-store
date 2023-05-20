<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The books that belong to the category.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_categories');
    }
}
