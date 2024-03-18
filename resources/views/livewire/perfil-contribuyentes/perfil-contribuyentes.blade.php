<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-full md:max-w-6xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Contenido del modal aquí -->
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Perfil del Contribuyente</p>
            </div>

            <!--Body-->
            <div class="bg-white border-b-2 border-gray-400 p-6 mb-6 flex flex-wrap">
                <div class="w-full md:w-1/2 lg:w-1/3 ">
                    <label for="codigo" class="block mr-2  font-medium text-gray-900 dark:text-white">
                        Nombre:</label>
                    <label for="codigo" class="block mr-2 ml-6 font-medium text-gray-900 dark:text-white">
                        {{ $nombrecompleto }}</label>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 ">
                    <label for="codigo" class="block mr-2  font-medium text-gray-900 dark:text-white">
                        Identidad:</label>
                    <label for="codigo" class="block mr-2 ml-6 font-medium text-gray-900 dark:text-white">
                        {{ $identidad }}</label>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 ">
                    <label for="codigo" class="block mr-2  font-medium text-gray-900 dark:text-white">
                        Sexo:</label>
                    <label for="codigo" class="block mr-2 ml-6 font-medium text-gray-900 dark:text-white">
                        @if ($sexo == 0)
                            Femenino
                        @elseif($sexo == 1)
                            Masculino
                        @else
                            N/D
                        @endif
                    </label>
                </div>
            </div>
            <div class="bg-white pl-6 flex flex-wrap">
                <div class="w-full md:w-1/2 lg:w-1/3 ">
                    <label for="codigo" class="block mr-2  font-medium text-gray-900 dark:text-white">
                        Telefono:</label>
                    <label for="codigo" class="block mr-2 ml-6 font-medium text-gray-900 dark:text-white">
                        {{ $telefono }}</label>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 ">
                    <label for="codigo" class="block mr-2 font-medium text-gray-900 dark:text-white">
                        Correo electrónico:</label>
                    <label for="codigo" class="block mr-2 ml-6 font-medium text-gray-900 dark:text-white">
                        {{ $email }}</label>
                </div>
            </div>
                
              <!-- Contenido del historial de pagos -->
<div class="bg-white shadow-md rounded-lg p-6">
    <h2 class="text-3xl font-extrabold mb-4">Historial de Pagos</h2>
    <hr class="my-2 border-gray-200">
    <!-- Tabla de Historial de Pagos -->
    <div class="flex mb-4">
        <div class="flex mb-4">
            <label for="year" class="mr-2">Filtrar por año:</label>
            <select wire:model="selectedYear" wire:change="updateSuscripciones" id="year" class="px-3 py-1 border rounded">
                <option value="">Todos</option>
                @foreach ($availableYears as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicio</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($suscripciones as $sus)
                @if($sus->contribuyente_id == $contribuyenteId)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sus->fecha_suscripcion }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sus->servicios->importes }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $sus->servicios->nombre_servicio}}</td> <!-- Aquí accedemos al nombre del servicio -->
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="3">No se encontraron registros</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <br>
        {{ $suscripciones->links()  }}
    </div>
</div>
