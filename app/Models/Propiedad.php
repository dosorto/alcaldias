<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends BaseModel
{
    use HasFactory;
    use softdeletes;
    protected $fillable = ['ClaveCatastral', 'IdContribuyente','IdTipoPropiedad', 'IdGeoreferencia', 'IdBarrio'];

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

    public function Georeferenciacion()
    {
        return $this->belongsTo(Georeferenciacion::class, 'IdGeoreferencia');
    }
}

