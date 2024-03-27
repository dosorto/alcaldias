<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagoServicio_has_servicios extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['pago_servicio_id', 'servicio_id', 'created_by'];

    public function pagoServicio()
    {
        return $this->belongsTo(PagoServicios::class, 'pago_servicio_id');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

}
