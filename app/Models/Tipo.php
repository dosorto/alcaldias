<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Servicio;

class Tipo extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre', 'fechacts', 'status'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'tipo_servicio_id');
    }

}

