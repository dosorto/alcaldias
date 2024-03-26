@extends('layouts.app') {{-- Ajusta el nombre del layout según tu estructura --}}

@section('content')

<div class="flex flex-wrap">
    <!-- Datos Personales -->
    <div class="w-full md:w-1/3 p-3"> <!-- Se ha reducido el ancho a 1/3 -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-3">Datos Personales</h2>
            <p><strong>Nombre:</strong> {{ $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre . ' ' . $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido }}</p>
            <th > ------------------------------------------------- </th>
            <p><strong>N° de Identidad:</strong> {{ $contribuyente->identidad }}</p>
            <th > ------------------------------------------------- </th>
            <p><strong>Sexo:</strong>
                @if ($contribuyente->sexo == 0)
                    Femenino
                @elseif($contribuyente->sexo == 1)
                    Masculino
                @else
                    N/D
                @endif
            </p>
            <th > ------------------------------------------------- </th>
            <p><strong>N° de Teléfono:</strong> {{ $contribuyente->telefono }}</p>
            <th > ------------------------------------------------- </th>
            <p><strong>Correo Electrónico:</strong> {{ $contribuyente->email }}</p>
        </div>
    </div>
<!-- Historial de Pagos -->
<div class="w-full md:w-2/3 p-3">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h2 class="text-xl font-bold mb-3">Historial de Pagos</h2>
        <!-- Filtro por año -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="selectedYear">
                Filtrar por año:
            </label>
            <select wire:model="selectedYear" wire:change="updatePagos" id="year" class="px-3 py-1 border rounded">
                <option value="">Todos</option>
                @foreach ($availableYearsFiltered  as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
            
        </div>
        
        <!-- Tabla de historial de pagos -->
        @if ($pagoservicio->isNotEmpty() || $suscripciones->isNotEmpty())
        <div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Número de Recibo</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Fecha de Pago</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Servicio</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Importe Individual</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Total del Recibo</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Estado del Pago</th>
                        <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Imprimir</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Iteración para los pagos de servicios -->
                    @forelse ($pagoservicio as $pago)
                    @foreach ($pago->servicios as $index => $servicio)
                    <tr>
                        @if ($index === 0)
                        <!-- Aquí se verifica si es la primera fila de un recibo de pago -->
                        <td rowspan="{{ count($pago->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $pago->num_recibo }}</td>
                        <td rowspan="{{ count($pago->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $pago->fecha_pago }}</td>
                        @endif
                        <!-- Aquí se itera sobre cada servicio asociado al recibo de pago -->
                        <td class="px-6 py-4 whitespace-nowrap">{{ $servicio->nombre_servicio }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $servicio->importes }}</td>
                        @if ($index === 0)
                        <!-- Aquí se verifica si es la primera fila de un recibo de pago -->
                        <td rowspan="{{ count($pago->servicios) }}" class="px-6 py-4 whitespace-nowrap">{{ $pago->importe_total }}</td>
                        <td rowspan="{{ count($pago->servicios) }}" class="px-6 py-4 whitespace-nowrap">
                            <!-- Aquí se determina si el recibo está pagado o pendiente -->
                            @if ($pago->num_recibo !== null)
                            Pagado
                            @else
                            Pendiente
                            @endif
                        </td>
                        <!-- Botón de imprimir -->
                        <td rowspan="{{ count($pago->servicios) }}" class="px-6 py-4 whitespace-nowrap">
                            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Imprimir
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 whitespace-nowrap text-center">No se encontraron registros para el año seleccionado.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @else
        <p class="text-sm text-gray-500">No se encontraron registros de pagos de servicios</p>
        @endif
    </div>
</div>

<div>
    @livewire('historial-contribuyente')
</div>
@endsection
