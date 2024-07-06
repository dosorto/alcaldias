<?php

namespace App\Livewire\Persona;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Georeferenciacion;

class Georreferenciacion extends Component
{
    use WithPagination;
    public $latitud, $longitud, $area, $perimetro;
    public $isOpen = 0;
   
}