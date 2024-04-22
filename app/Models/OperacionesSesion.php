<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperacionesSesion extends Model
{
    use HasFactory;
    protected $fillable = [
        'idsesioncaja', 'num_recibo', 'fecha', 'monto'
    ];


    //public function sesioncaja()
    //{
    //   return $this->belongsTo(SesionCaja::class, 'idsesioncaja');
    //}

}
