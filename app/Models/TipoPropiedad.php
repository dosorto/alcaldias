<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPropiedad extends BaseModel
{
    use HasFactory;
    use softdeletes;

    protected $fillable = ['Nombre'];


    protected $table = 'tipo_propiedads';

<<<<<<< HEAD
}
=======
    public function Propiedad()
    {
        return $this->hasMany(Propiedad::class);
    }

}
>>>>>>> dayanni
