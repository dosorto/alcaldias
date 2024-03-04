<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['codigo','name', 'departamento_id'];

    public function departamentos()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function aldeas()
    {
        return $this->hasMany(Aldea::class, 'municipio_id');
    }
} 
