<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionCajaModelo extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'monto_inicial', 'created_at', 'updated_at', 'closed_at', 'status', 'monto_cierresis', 'monto_cierreuser'];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function cobros()
    {
        return $this->hasMany(Cobro::class, 'sesion_id');
    }
}
