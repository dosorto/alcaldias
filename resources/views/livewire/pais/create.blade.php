<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="personaModal" tabindex="-1" aria-labelledby="personaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personaModalLabel">Crear Pais</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="store()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Codigo</label>
                        <input type="text" wire:model="nombre" class="form-control">
                        @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" wire:model="apellido" class="form-control">
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>ISO Code</label>
                        <input type="text" wire:model="apellido" class="form-control">
                        @error('ISOCode') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
