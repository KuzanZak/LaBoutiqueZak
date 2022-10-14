<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /* METHODS */

    /**
     * Get all users of the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
