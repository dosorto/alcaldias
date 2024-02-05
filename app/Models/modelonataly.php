<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelonataly extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_completo','dni', 'sexo', 'fecha_nacimiento'];
}
