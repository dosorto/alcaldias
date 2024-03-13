<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contribuyente extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'identidad',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'sexo',
        'impuesto_personal',
        'direccion',
        'apartado_postal',
        'telefono',
        'fecha_nacimiento',
        'email',
        'tipo_documento_id',
        'barrio_id',
        'profecion_id',
    ];

    public function Tipo_documento()
    {
        return $this->belongsTo(Tipo_documento::class, 'Tipo_documento_id');
    }

    public function Barrio()
    {
        return $this->belongsTo(Barrio::class, 'Barrio_id');
    }

    public function Profecion_oficio()
    {
        return $this->belongsTo(Profesion_oficio::class, 'profecion_id');
    }
}
