<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Periodo extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['periodo', 'fecha_inicio', 'fecha_final', 'anio_id', 'created_by'];


    public function anio()
    {
        return $this->belongsTo(Anio::class, 'anio_id');
    }
}
