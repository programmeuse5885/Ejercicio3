<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    // Campos asignables
    protected $fillable = [
        'name',
        'address',
    ];
}
