<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];

    // Relation with Order
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    // Relation with Product
    public function medicines()
    {
        return $this->belongsTo(medicines::class);
    }
}
