<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacionalcaldia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_alcaldia', 'nombre_alcalde', 'direccion', 'telefono', 'correo', 'correo_notificaciones', 'contrasenia'];
}
