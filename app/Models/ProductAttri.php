<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttri extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'weight',
        'price',
        'stock'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
