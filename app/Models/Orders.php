<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'payment_status',
        'shipping_address',
        'city',
        'phone'
    ];

    // Relation with Order Items
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relation with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
