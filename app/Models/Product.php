<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Add fillable fields if needed, e.g.:
    protected $fillable = ['name', 'code', 'quantity', 'price', 'image'];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
} 