<?php

namespace App\Livewire;

use App\Models\PagoServicios;
use App\Models\Contribuyente;
use Livewire\Component;

class ConsultaTributaria extends Component
{
    public $contribuyenteId;
    public $historialPagos;
    
    public function render()
    {
        return view('livewire.consulta-tributaria');
    }

    public function consultarHistorial()
    {
        $id = $this->contribuyenteId;
        return $this->redirect(route('consulta', $contribuyenteid));
    }
}
