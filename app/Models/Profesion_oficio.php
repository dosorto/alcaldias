<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profesion_oficio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre'];

    public function Contribuyente()
    {
        return $this->hasMany(Contribuyente::class);
    }
}

