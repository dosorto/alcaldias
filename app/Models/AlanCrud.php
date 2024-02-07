<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlanCrud extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'dni',
        'sexo',
        'fecha_nacimiento'
    ];
}