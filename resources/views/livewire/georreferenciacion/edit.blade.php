
<!-- Botón para abrir la modal -->
{{-- <button wire:click="openModal">Abrir Modal</button> --}}

<!-- Modal -->
<div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <!-- Contenido de la modal -->

    <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md dark:bg-gray-900">
        <!-- Contenido de tu modal aquí -->
        <!-- Modal header -->
        <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                Crear Nueva Georreferenciación
            </h3>
            <button wire:click="closeModal()" type="button"
                class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <div class="p-4 md:p-4">
            <form class="space-y-4" wire:submit.prevent="store()"> 
                <div>
                    <label for="latitud"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitud</label>
                    <input type="text" wire:model="latitud" name="latitud" id="latitud"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Latitud" required />
                    @error('latitud') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="longitud"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitud</label>
                    <input type="text" wire:model="longitud" name="longitud" id="longitud"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Longitud" required />
                    @error('longitud') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="area"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Área</label>
                    <input type="text" wire:model="area" name="area" id="area"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Área" required />
                    @error('area') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="perimetro"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perimetro</label>
                    <input type="text" wire:model="perimetro" name="perimetro" id="perimetro"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Perimetro" required />
                    @error('perimetro') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="content-center justify-center place-content-center">
                    <button wire:click="store()" type="submit" data-modal-hide="popup-modal" type="button"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Editar
                    </button>
                    <button wire:click="closeModal()" data-modal-hide="popup-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                        cancel</button>
                    {{-- <button wire:click="closeModal">Cerrar Modal</button> --}}

                </div>

            </form>
        </div>
    </div>
</div>