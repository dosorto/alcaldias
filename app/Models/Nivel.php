<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servicio;

class Nivel extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre', 'clave', 'fechacts', 'status'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'nivel_servicio_id');
    }

}

