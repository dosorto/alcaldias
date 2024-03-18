<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilContribuyente extends BaseModel
{
    protected $fillable = ['contribuyente_id', 'servicio_id', 'suscripcions_id'];

    public function servicios()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function contribuyentes()
    {
        return $this->belongsTo(Contribuyente::class, 'contribuyente_id');
    }
    public function suscripcions()
    {
        return $this->belongsTo(suscripcion::class, 'suscripcions_id');
    }
}
