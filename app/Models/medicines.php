<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicines extends Model
{
    use HasFactory;

    protected $table = 'medicines';
    protected $fillable = [
        'category_id',
        'image',
        'name',
        'company',
        'strength',
        'type',
        'price',
        'quantity',
        'batch_no',
        'expiry_date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
