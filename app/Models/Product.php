<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /* METHODS */

    /**
     * Get the users who write an advice of the product.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the orders containing the product.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * Get the category associated with the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product images.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * Get the main image associated with the product.
     */
    public function mainImage()
    {
        return $this->hasOne(Image::class);
    }
}
