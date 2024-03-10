<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['clave_presupuestaria','nombre_servicio','importes','fecha_creacion','status','tipo_servicio_id','nivel_servivio_id'];

    public function tiposervicio()
    {
        return $this->belongsTo(Tipo::class, 'tipo_servicio_id');
    }


    public function nivelservicio()
    {
        return $this->belongsTo(Nivel::class, 'nivel_servivio_id');
    }

}
