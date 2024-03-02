<!-- Update Pais Modal -->
<div wire:ignore.self class="modal fade" id="updatePaisModal" tabindex="-1" aria-labelledby="updatePaisModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePaisModalLabel">Editar País</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Código</label>
                        <input type="text" wire:model="codigo" class="form-control">
                        @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" wire:model="nombre" class="form-control">
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>ISO Code</label>
                        <input type="text" wire:model="iso_code" class="form-control">
                        @error('iso_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

