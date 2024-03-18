<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Anio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['anio', 'created_by'];

    public function periodo()
    {
        return $this->hasMany(Periodo::class, 'anio_id');
    }
}
