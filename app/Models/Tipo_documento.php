<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tipo_documento extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['tipo_documento'];

    public function Contribuyente()
    {
        return $this->hasMany(Contribuyente::class);
    }
}