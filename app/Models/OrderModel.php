<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class OrderModel extends Model
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

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
