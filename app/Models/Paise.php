<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paise extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['codigo','nombre','iso_code','created_by'];

    public function departamento()
    {
        return $this->hasMany(Departamento::class, 'pais_id');
    }
}
