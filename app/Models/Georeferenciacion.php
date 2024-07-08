<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Georeferenciacion extends BaseModel
{
    use HasFactory;
    use softdeletes;

    protected $fillable = ['idGeoreferenciacion','Latitud','Longitud','Area','Perimetro'];

    public function Propiedad()
    {
        return $this->hasMany(Propiedad::class, 'IdGeoreferenciacion');
    }

}