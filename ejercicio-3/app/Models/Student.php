<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'school_id',
    ];

    // Relación: un estudiante pertenece a una escuela
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
