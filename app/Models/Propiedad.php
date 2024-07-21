<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Georeferenciacion;

class Propiedad extends BaseModel
{
    use HasFactory;
    use softdeletes;
    protected $fillable = [
        'ClaveCatastral',
        'IdContribuyente',
        'IdTipoPropiedad',
        'IdBarrio',
        'Direccion',
    ];

    protected $table = 'propiedads';

    public function TipoPropiedad()
    {
        return $this->belongsTo(TipoPropiedad::class, 'IdTipoPropiedad');
    }

    public function Barrio()
    {
        return $this->belongsTo(Barrio::class, 'IdBarrio');
    }

    public function Contribuyente()
    {
        return $this->belongsTo(Contribuyente::class, 'IdContribuyente');
    }

    

    // relacion uno a muchos con el modelo Georeferenciacion

    public function Georeferenciacion()
    {
        return $this->hasMany(Georeferenciacion::class, 'IdPropiedad');
    }
}

