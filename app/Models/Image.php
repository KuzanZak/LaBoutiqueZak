<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /* METHODS */
    /**
     * Get the product associated with the image.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
