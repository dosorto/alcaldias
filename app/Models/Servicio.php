<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function servicios()
    {
        return $this->hasMany(suscripcion::class, 'servicio_id');
    }

    public function pagosServicios(): BelongsToMany
    {
        return $this->belongsToMany(PagoServicios::class, 'pago_servicio_has_servicios', 'servicio_id', 'pago_servicio_id');
    }

}
