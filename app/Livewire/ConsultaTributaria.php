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
        $contribuyente = Contribuyente::where('identidad', $this->contribuyenteId)->first();
        if ($contribuyente) {
            // Obtener el historial de pagos del contribuyente
            $this->historialPagos = PagoServicios::where('contribuyente_id', $contribuyente->id)->get();
        } else {
            // Si no se encuentra el contribuyente, establecer historial de pagos como vacío
            $this->historialPagos = [];
        }
        return view('livewire.consulta-tributaria', ['historialPAgos' => $historialPagos]);
    }

    public function consultarHistorial()
    {
        // Buscar el contribuyente por su número de identidad
        $contribuyente = Contribuyente::where('identidad', $this->contribuyenteId)->first();
        if ($contribuyente) {
            // Obtener el historial de pagos del contribuyente
            $this->historialPagos = PagoServicios::where('contribuyente_id', $contribuyente->id)->get();
        } else {
            // Si no se encuentra el contribuyente, establecer historial de pagos como vacío
            $this->historialPagos = [];
        }
    }
}
