<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barrio extends BaseModel
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nombre', 'direccion', 'latitud', 'longitud','aldea_id'];

    public function aldea()
    {
        return $this->belongsTo(Aldea::class, 'aldea_id');
    }

    public function Contribuyente()
    {
        return $this->hasMany(Contribuyente::class);
    }
}