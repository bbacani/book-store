<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'shipment_address',
        'shipment_date',
        'shipment_items',
        'shipment_sent',
    ];

    /**
     * Get the order that the shipment belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
