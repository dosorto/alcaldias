<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\modelonataly;

class Ejemplocrud extends Component
{
    public $nombre_completo, $dni, $sexo, $fecha_nacimiento;
    public $selected_id, $updateMode = false; 

    public function render()    
    {
        $personas = modelonataly::all();        
        return view('livewire.ejemplocrud', compact('personas'));
    }
    public function store()    
    {
        $this->validate([            
            'nombre_completo' => 'required',
            'dni' => 'required',            
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',        
        ]);
        modelonataly::create([
            'nombre_completo' => $this->nombre_completo,            
            'dni' => $this->dni,
            'sexo' => $this->sexo,            
            'fecha_nacimiento' => $this->fecha_nacimiento,
        ]);
        $this->resetInputFields();
    }

    public function edit($id) 
    { 
        $persona = modelonataly::findOrFail($id); 
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
            $persona = modelonataly::find($this->selected_id); 
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
        modelonataly::find($id)->delete(); 
    } 
 
    private function resetInputFields() 
    { 
        $this->nombre_completo = ''; 
        $this->dni = ''; 
        $this->sexo = ''; 
        $this->fecha_nacimiento = ''; 
    } 
}
