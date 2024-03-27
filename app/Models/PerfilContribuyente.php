<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilContribuyente extends BaseModel
{
    protected $fillable = ['contribuyente_id', 'servicio_id', 'suscripcions_id'];

    

    public function contribuyentes()
    {
        return $this->belongsTo(Contribuyente::class, 'contribuyente_id');
    }
   
    public function pagosServicios()
    {
        return $this->belongsToMany(PagoServicios::class, 'pago_servicio_has_servicios', 'perfil_contribuyente_id', 'pago_servicio_id');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'pago_servicio_has_servicios', 'perfil_contribuyente_id', 'servicio_id');
    }
  

}
