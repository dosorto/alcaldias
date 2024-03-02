<?php

namespace App\Livewire\Aldea;

use LivewireUI\Modal\ModalComponent;

class DeleteAldea extends ModalComponent
{
    public function render()
    {
        return view('livewire.aldeas.delete-aldea');
    }
}
