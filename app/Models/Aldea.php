<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aldea extends BaseModel
{
    //esta es una prueba
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['codigo', 'nombre', 'direccion', 'latitud', 'longitud','municipio_id'];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }
}