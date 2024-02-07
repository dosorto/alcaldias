<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModeloOmri;

class OmriCrud extends Component
{
    public $nombre_completo, $dni, $sexo, $fecha_nacimiento;
    public $selected_id, $updateMode = false;

    public function render()
    {
        $personas = ModeloOmri::all();
        return view('livewire.omri-crud', compact('personas'));
    }

    public function store()
    {
        $this->validate([
            'nombre_completo' => 'required',
            'dni' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        ModeloOmri::create([
            'nombre_completo' => $this->nombre_completo,
            'dni' => $this->dni,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $persona = ModeloOmri::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre_completo = $persona->nombre_completo;
        $this->dni = $persona->dni;
        $this->sexo = $persona->sexo;
        $this->fecha_nacimiento = $persona->fecha_nacimiento;
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'nombre_completo' => 'required',
            'dni' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        if ($this->selected_id) {
            $persona = ModeloOmri::find($this->selected_id);
            $persona->update([
                'nombre_completo' => $this->nombre_completo,
                'dni' => $this->dni,
                'sexo' => $this->sexo,
                'fecha_nacimiento' => $this->fecha_nacimiento,
            ]);
            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function destroy($id)
    {
        ModeloOmri::find($id)->delete();
    }

    private function resetInputFields()
    {
        $this->nombre_completo = '';
        $this->dni = '';
        $this->sexo = '';
        $this->fecha_nacimiento = '';
    }
}
