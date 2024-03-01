<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paise extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['codigo','nombre','iso_code','created_by'];
}
