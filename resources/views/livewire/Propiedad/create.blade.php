<div>
    <!-- Modal -->
    <div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
        <!-- Contenido de la modal -->

        <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md dark:bg-gray-900">
            <!-- Contenido de tu modal aquí -->
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Registrar Nueva Propiedad
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
                        <label for="propiedad"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Propietario</label>
                        <select wire:model.live="IdContribuyente"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            
                            @foreach ($Contribuyentes as $propietario) 
                            <option value="{{ $propietario->id }}">{{ $propietario->identidad }}</option>
                            @endforeach
                        </select>

                        @error('IdContribuyente') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="claveCatastral" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clave Catastral</label>
                        <input wire:model.live="ClaveCatastral" type="number" id="claveCatastral"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                        @error('ClaveCatastral') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tipoPropiedad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Propiedad</label>
                        <select wire:model.live="IdTipoPropiedad"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option selected="">Seleccione tipo de propiedad</option>
                            @foreach (App\Models\TipoPropiedad::all() as $tipoPropiedad)
                                <option value="{{ $tipoPropiedad->id }}">{{ $tipoPropiedad->Nombre }}</option>
                            @endforeach
                        </select>
                        @error('IdTipoPropiedad') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="georeferenciacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Georeferenciación</label>
                        <select wire:model.live="IdGeoreferencia"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option selected="">Seleccione georeferenciación</option>
                            @foreach (App\Models\Georeferenciacion::all() as $georeferenciacion)
                                <option value="{{ $georeferenciacion->id }}">{{ $georeferenciacion->id }}</option>
                            @endforeach
                        </select>
                        @error('IdGeoreferencia') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                        <select wire:model.live="IdBarrio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            <option selected="">Seleccione barrio</option>
                            @foreach (App\Models\Barrio::all() as $barrio)
                                <option value="{{ $barrio->id }}">{{ $barrio->nombre }}</option>
                            @endforeach
                        </select>
                        @error('IdBarrio') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="content-center justify-center place-content-center">
                        <button wire:click="store()"  type="submit" data-modal-hide="popup-modal"
                            class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Crear
                        </button>
                        <button wire:click="closeModal()" data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
