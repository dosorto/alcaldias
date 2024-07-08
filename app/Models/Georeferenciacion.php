<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Georeferenciacion extends BaseModel
{
    use HasFactory;
    use softdeletes;


   

    //public function Propiedad()

    protected $fillable = ['IdGeoreferenciacion','latitud','longitud','area','perimetro'];

    public function propiedad()

    {
        return $this->hasMany(Propiedad::class, 'IdGeoreferenciacion');
    }

}

