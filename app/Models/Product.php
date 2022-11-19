<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sub_title',
        'slug',
        'featured_image',
        'short_desc',
        'long_desc'
    ];

    public function product_attr()
    {
        return $this->hasMany(ProductAttri::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orderdetails()
    {
        $this->hasMany(OrderDetails::class);
    }
}
