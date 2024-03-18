<div class="bg-white p-4 modal fade  mx-auto rounded-md w-500" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Botón para abrir la modal -->
    <div class="modal-dialog modal-dialog-scrollable fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center"
        role="document">

        <div class="bg-white p-4   mx-auto rounded-md w-500">

            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Crear Contribuyente
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

            <form wire:submit.prevent="store()">

                <h4>Datos Personales </h4>

                <div class="border shadow-md rounded-lg p-4">
                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-1 mx-2 font-medium text-gray-900 dark:text-white">Nombres del
                            Contribuyente</label>
                        <input wire:model="primer_nombre"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Primer Nombre" required />
                        @error('primer_nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input wire:model="segundo_nombre"
                            class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Segundo Nombre" required />
                        @error('segundo_nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-1 mx-2 font-medium text-gray-900 dark:text-white">Apellido del
                            Contribuyente</label>
                        <input wire:model="primer_apellido"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Primer Apellido" required />
                        @error('primer_apellido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input wire:model="segundo_apellido" id="segundo_apellido"
                            class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Segundo apellido" required />
                        @error('segundo_apellido')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Identidad</label>
                        <input wire:model="identidad"
                            class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Identidad" required />
                        @error('identidad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Tipo de documeto</label>
                        <select wire:model="tipo_documento_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($tipo_documentos as $tipo_documento)
                                <option value="{{ $tipo_documento->id }}">{{ $tipo_documento->tipo_documento }}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-6 mx-2 font-medium text-gray-900 dark:text-white">
                            Sexo</label>
                        <div class="flex items-center">
                            <input wire:model="sexo" type="radio" value="1" class="mr-1">
                            <label for="sexo_masculino"
                                class="cursor-pointer bg-white border rounded-lg shadow-md p-2 mr-4">
                                Masculino
                            </label>

                            <input wire:model="sexo" type="radio" value="0" class="mr-1">
                            <label for="sexo_femenino" class="cursor-pointer bg-white border rounded-lg shadow-md p-2">
                                Femenino
                            </label>

                            <label for="codigo"
                                class="block mb-2 ml-5 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                                Ultimo periodo facturado de impuesto personal</label>
                            <input type="text" wire:model="impuesto_personal" name="impuesto_personal" id="identidad"
                                class="bg-gray-50 border mx-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-2/5 p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                                placeholder="Año" required />
                            @error('impuesto_personal')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                    </div>


                </div>

                <h4>Datos Residencia </h4>

                <div class="border shadow-md rounded-lg p-4">
                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Direccion</label>
                        <input wire:model="direccion"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Direccion" required />
                        @error('primer_nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Ubicacion</label>
                        <select wire:model="barrio_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($barrios as $barrio)
                                <option value="{{ $barrio->id }}">{{ $barrio->nombre }}</option>
                            @endforeach
                        </select>

                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Apartado postal</label>
                        <input wire:model="apartado_postal"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Apartado postal" required />
                        @error('primer_nombre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Telefeno</label>
                        <input wire:model="telefono"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Telefeno" required />

                        <label for="codigo"
                            class="block mb-2 text-sm mx-2 font-medium text-gray-900 dark:text-white">
                            Gmail</label>
                        <input wire:model="email"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="Telefeno" required />

                    </div>

                    <div class="flex space-y-1">
                        <label for="codigo"
                            class="block mb-2 text-sm mt-4 mx-2 font-medium text-gray-900 dark:text-white">
                            Prefecion/Oficio</label>
                        <select wire:model="profecion_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($profeciones as $profesion)
                                <option value="{{ $profesion->id }}">{{ $profesion->nombre }}</option>
                            @endforeach
                        </select>

                        <label for="codigo"
                            class="block mb-2 text-sm mx-2 font-medium text-gray-900 dark:text-white">
                            Fecha de nacimiento</label>
                        <input wire:model="fecha_nacimiento"
                            class="bg-gray-50 mx-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white h-[2.5rem]"
                            placeholder="AAAA-MM-DD" required />
                    </div>

                    

                </div>

                <div class="content-center justify-center place-content-center">
                    <button type="submit" data-modal-hide="popup-modal" type="button"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Agregar
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
