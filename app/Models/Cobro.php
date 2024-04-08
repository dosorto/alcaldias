<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    use HasFactory;
    protected $fillable = ['sesion_id', 'usuario_id', 'pago_id', 'fecha_pago'];

    public function sesiones()
    {
        return $this->belongsTo(SesionCaja::class, 'sesion_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function pagos()
    {
        return $this->belongsTo(PagoServicios::class, 'pago_id');
    }
}
