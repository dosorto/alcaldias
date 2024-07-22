<div>
    <form wire:submit="create">
        {{ $this->form }}

        <div class="flex items-center justify-end mt-4">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 text-sm font-medium bg-blue-500 text-white border border-transparent rounded-lg hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                Registrar
            </button>
            <a  href="{{ route('propiedad') }}"
                class="inline-flex items-center px-4 py-2 ml-4 text-sm font-medium bg-red-500 text-white border border-transparent rounded-lg hover:bg-red-700 focus:outline-none focus:border-red-700 focus:ring-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-red-500 dark:focus:text-white">
                Regresar
        </a>

        </div>
    </form>

    <x-filament-actions::modals />
</div>