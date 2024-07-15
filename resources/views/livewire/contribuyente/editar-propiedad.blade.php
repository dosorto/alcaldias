<div>
    <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" color="primary" class="mt-4">
            {{ __('Guardar cambios') }}
        </x-filament::button>
    </form>

    <x-filament-actions::modals />
</div>
