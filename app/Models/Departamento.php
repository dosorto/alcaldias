<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Departamento extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['codigo', 'name','pais_id', 'created_by'];

    public function paises()
    {
        return $this->belongsTo(Paise::class, 'pais_id');
    }

    public function municipio()
    {
        return $this->hasMany(Municipio::class, 'departamento_id');
    }

    public function aldea(): HasManyThrough
    {
        return $this->through('municipios')->has('aldeas');
    }

    public function barrios(): HasManyThrough
{
    return $this->through('municipios', Aldea::class)->has('barrios');
}




}
