<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class PagoServicios extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['num_recibo', 'fecha_pago', 'total', 'estado',
                            'periodo_id', 'contribuyente_id', 'created_by'];


    public function suscripcion()
    {
        return $this->belongsTo(suscripcion::class, 'suscripcion_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }

    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'pago_servicio_has_servicios', 'pago_servicio_id', 'servicio_id');
    }

}
