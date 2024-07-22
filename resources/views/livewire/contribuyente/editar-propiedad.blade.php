<div>
    <form wire:submit="save">
        {{ $this->form }}

        <x-filament::button type="submit" color="primary" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            {{ __('Guardar cambios') }}
        </x-filament::button>
        <a href="{{ route('propiedad') }}" color="danger" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Regresar
        </a>
    </form>

    <x-filament-actions::modals />
</div>
