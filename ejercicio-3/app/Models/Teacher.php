<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    // campos asignables
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'school_id',
    ];

    //Relación: un maestro pertenece a una escuela
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
