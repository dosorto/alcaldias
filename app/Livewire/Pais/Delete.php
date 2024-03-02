<?php

namespace App\Livewire\Pais;

use Livewire\Component;

class Delete extends Component
{
    public $showModal = false;
    public function render()
    {
        return view('livewire.pais.delete');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }


}
