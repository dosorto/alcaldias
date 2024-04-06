<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionCaja extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_id', 'monto_inicial', 'created_at', 'closed_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    public function cobros()
    {
        return $this->hasMany(Cobro::class, 'sesion_id');
    }

}
