<?php

namespace App\Livewire\TipoDocumento;

use Livewire\Component;
use App\Models\Tipo_documento;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Tipos_documentosExport;

class TipoDocumento extends Component
{
    use WithPagination, WithoutUrlPagination;
    public bool $deleteTipoDocumentoModal = false;
    public $tipo_documento, $tipo_documento_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $documento;
    public $confirmingItemDeletion;

    public function render()
    {
        $documento  = Tipo_documento::where('tipo_documento', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.tipo-documento.tipo-documento', ['documentos' => $documento]);
    }

    private function resetInputFields(){
        $this->tipo_documento = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'tipo_documento' => 'required'
        ]);

        Tipo_documento::create($validatedData);

        session()->flash('message', 'Document Created Successfully.');

        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $documento = Tipo_documento::findOrFail($id);
        $this->tipo_documento_id = $id;
        $this->tipo_documento = $documento->tipo_documento;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }

    public function cancel()
    {
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'tipo_documento' => 'required',
        ]);

        $documento = Tipo_documento::find($this->tipo_documento_id);
        $documento->update([
            'tipo_documento' => $this->tipo_documento
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Document Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;

    }

    public function delete()
    {
        $documento = Tipo_documento::find($this->confirmingItemDeletion);
        $documento->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;

    }

    public function export(){
        return Excel::download(new Tipos_documentosExport,'Tipos de documentos.xlsx');

    }

}
