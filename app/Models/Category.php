<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /* METHODS */

    /**
     * Get all products of the category.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'id', 'products_id');
    }
}
