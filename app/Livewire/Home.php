<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\informacionalcaldia;

class Home extends Component
{
    public function mount()
    {
        $registros = informacionalcaldia::where('nombre_alcaldia', 'N/D')
                                        ->orWhere('nombre_alcalde', 'N/D')
                                        ->orWhere('direccion', 'N/D')
                                        ->orWhere('telefono', 0)
                                        ->orWhere('correo', 'N/D')
                                        ->orWhere('correo_notificaciones', 'N/D')
                                        ->orWhere('contrasenia', 'N/D')
                                        ->exists();
    

        // Si se encuentra al menos un registro con valor "N/D"
        if ($registros) {
            return redirect()->to('/configuracion');
        } else {
            return view('livewire.home');
        }
    }
}
