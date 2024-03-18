<div class="bg-white p-4 modal fade mx-auto rounded-md w-500" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center" role="document">
        <div class="bg-white p-4 mx-auto rounded-md w-500">
            <!-- Título principal -->
            <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
            </button>
            <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Datos Personales del Contribuyente</h1>
            <!-- Datos personales -->
            <br>
            <div class="flex justify-between mb-4">
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                    <li><b>Nombre:</b> {{ $nombrecompleto }}</li>
                    <li><b>N° de Identidad:</b> {{ $identidad }}</li>
                    <li><b>Sexo:</b> @if($sexo == 0) Femenino @elseif($sexo == 1) Masculino @else N/D @endif</li>
                    <li><b>N° de Teléfono:</b> {{ $telefono }}</li>
                    <li><b>Correo Electrónico:</b> {{ $email }}</li>
                </ul>
                <div class="border-l pl-4">
                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Agregar Nueva Suscripción</h2>
                    
                    <form class="max-w-sm mx-auto" wire:submit.prevent="store()">
                        <label for="underline_select" class="sr-only">Agregar servicio a contribuyente</label>
                        <select wire:model="servicioId" name="servicioId" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected>Seleccione un servicio</option>
                            @foreach ($servicios as $servi)
                                <option value="{{ $servi->id }}">{{ $servi->nombre_servicio }}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="content-center justify-center place-content-center">
                                <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10  dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white" type="submit" data-modal-hide="popup-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Agregar
                                </button>               
                        </div>
                        </form>
                </div>
            </div>

            <!-- Línea divisora -->
            <hr class="border-t border-gray-300 mb-4">

            <!-- Título de la tabla de suscripciones -->
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Lista de Suscripciones</h2>

            <!-- Tabla de suscripciones -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Id</th>
                        <th scope="col" class="px-6 py-3">Servicio</th>
                        <th scope="col" class="px-6 py-3">Importe</th>
                        <th scope="col" class="px-6 py-3">Fecha Suscripción</th>
                        <th scope="col" class="px-6 py-3">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suscripciones as $sus)
                    @if($sus->contribuyente_id == $contribuyenteId)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $sus->id }}</td>
                        <td class="px-6 py-4">{{ $sus->servicios->nombre_servicio }}</td>
                        <td class="px-6 py-4">{{ $sus->servicios->importes }}</td>
                        <td class="px-6 py-4">{{ $sus->fecha_suscripcion }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="remove({{ $sus->id }})" type="button" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @empty
                    <tr>
                        <td colspan="5">No Record Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($deleteModal)
@include('livewire.suscripciones.delete')
@endif