<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /* METHODS */

    /**
     * Get the users who lives at the address.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
