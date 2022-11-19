<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    public function comment()
    {
        return $this->hasMany(BlogComment::class);
    }
    
    public function video()
    {
        return $this->hasMany(BlogVideo::class);
    }
}
