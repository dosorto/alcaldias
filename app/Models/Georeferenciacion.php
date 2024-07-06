<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Georeferenciacion extends BaseModel
{
    use HasFactory;
    use softdeletes;

    protected $fillable = ['Latitud','Longitud','Area','Perimetro'];

}
