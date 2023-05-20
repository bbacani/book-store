<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * Get the author that owns the contact.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
