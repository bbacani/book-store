<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    // protected $primaryKey = 'shipment_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'shipment_date',
        'shipment_items',
        // 'order_id',
    ];

    /**
     * Get the order that the shipment belongs to.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
