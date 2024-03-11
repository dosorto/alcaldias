<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['tipo_servicio_id','nivel_servicio_id','clave_presupuestaria','nombre_servicio','importes','fecha_creacion','status'];

    public function tipos()
    {
        return $this->belongsTo(Tipo::class, 'tipo_servicio_id');
    }


    public function nivels()
    {
        return $this->belongsTo(Nivel::class, 'nivel_servicio_id');
    }

}
