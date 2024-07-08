<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Georeferenciacion extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

<<<<<<< HEAD
    protected $fillable = ['idGeoreferenciacion','Latitud','Longitud','Area','Perimetro'];

    public function Propiedad()
=======

   

    //public function Propiedad()

    protected $fillable = ['IdGeoreferenciacion','latitud','longitud','area','perimetro'];

    public function propiedad()

>>>>>>> dayanni
    {
        return $this->hasMany(Propiedad::class, 'IdGeoreferenciacion');
    }

<<<<<<< HEAD
}
=======
}

>>>>>>> dayanni
