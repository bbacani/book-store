<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'customer_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'customer_name',
        'customer_email',
    ];

}
