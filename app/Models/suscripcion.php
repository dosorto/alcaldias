<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class suscripcion extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['contribuyente_id', 'servicio_id', 'fecha_suscripcion'];

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
        return $this->hasMany(PerfilContribuyente::class, 'suscriptions_id');
    }
}