<?php

namespace App\Livewire;

use App\Models\Paise;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;


class ImportarExcel extends Component
{
    public $archivo;

    public function importar()
    {
        // Aquí va la lógica para manejar la importación desde Excel
        Excel::import(new Paise(), $this->archivo->getRealPath());

        session()->flash('message', 'Datos importados correctamente.');

    }

    public function render()
    {
        return view('pais');
    }
}
