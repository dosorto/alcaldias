<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Georeferenciacion extends BaseModel
{
    use HasFactory;
    use softdeletes;

    //public function Propiedad()

    protected $fillable = [
        'IdGeoreferenciacion',
        'latitud',
        'longitud',
        'IdPropiedad',
        'area',
        'perimetro'
    ];

     // crear relacion de muchos a unos con Propiedad
        public function Propiedad()
        {
            return $this->belongsTo(Propiedad::class, 'IdPropiedad', 'IdPropiedad');
        }
}
