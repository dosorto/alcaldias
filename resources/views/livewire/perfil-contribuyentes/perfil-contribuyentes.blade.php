<div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

    <div class="modal-container bg-white w-full md:max-w-6xl mx-auto rounded shadow-lg z-50 overflow-y-auto">
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
            <div class="flex flex-wrap">
                <!-- Datos Personales -->
                <div class="w-full md:w-1/2 p-3">
                    <h2 class="text-xl font-bold mb-3">Datos Personales</h2>
                    <p><strong>Nombre:</strong> {{ $nombrecompleto }}</p>
                    <p><strong>Identidad:</strong> {{ $identidad }}</p>
                    <p><strong>Sexo:</strong>
                        @if ($sexo == 0)
                            Femenino
                        @elseif($sexo == 1)
                            Masculino
                        @else
                            N/D
                        @endif
                    </p>
                    <p><strong>Teléfono:</strong> {{ $telefono }}</p>
                    <p><strong>Correo electrónico:</strong> {{ $email }}</p>
                </div>

               <!-- Historial de Pagos -->
<div class="w-full md:w-1/2 p-3">
    <h2 class="text-xl font-bold mb-3">Historial de Pagos</h2>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de Recibo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Pago</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicio</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Importe Individual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total del Recibo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado del Pago</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imprimir</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Iteración para los pagos de servicios -->
                @forelse ($pagoServicios as $sus)
                    @foreach ($sus->servicios as $index => $servicio)
                    <tr>
                        @if ($index === 0)
                            <!-- Aquí se verifica si es la primera fila de un recibo de pago -->
                            <td rowspan="{{ count($sus->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $sus->num_recibo }}</td>
                            <td rowspan="{{ count($sus->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $sus->fecha_pago }}</td>
                        @endif
                        <!-- Aquí se itera sobre cada servicio asociado al recibo de pago -->
                        <td class="px-6 py-4 whitespace-nowrap">{{ $servicio->nombre_servicio }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $servicio->importes }}</td>

                        @if ($index === 0)
                            <!-- Aquí se verifica si es la primera fila de un recibo de pago -->
                            <td rowspan="{{ count($sus->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $sus->importe_total }}</td>
                            <td rowspan="{{ count($sus->servicios) }}" class="px-6 py-4 whitespace-nowrap">
                                <!-- Aquí se determina si el recibo está pagado o pendiente -->
                                @if ($sus->num_recibo !== null)
                                Pagado
                            @else
                                Pendiente
                            @endif
                        </td>
                            <!-- Botón de imprimir -->
                            <td rowspan="{{ count($sus->servicios) }}" class="px-6 py-4 whitespace-nowrap">
                                <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Imprimir
                                </button>
                            </td>
                        @endif
                    </tr>
                    @endforeach
                @empty
                    <tr>
                        <td colspan="7">No se encontraron registros de pagos de servicios</td>
                    </tr>
                @endforelse
                <!-- Iteración para las suscripciones -->
                <!-- Iteración para las suscripciones -->
@forelse ($suscripciones as $suscripcion)
@if ($suscripcion->num_pago !== null)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->num_recibo }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->fecha_pago }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->servicio->nombre_servicio }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->servicio->importes }}</td>
        <td class="px-6 py-4 whitespace-nowrap">Pagado</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $suscripcion->importe_total }}</td>
        <!-- Botón de imprimir -->
        <td class="px-6 py-4 whitespace-nowrap">
            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Imprimir
            </button>
        </td>
    </tr>
@endif
@empty
<tr>
    <td colspan="7">No se encontraron registros de suscripciones</td>
</tr>
@endforelse
            </tbody>
        </table>
    </div>
</div>
