@extends('layouts.app') {{-- Ajusta el nombre del layout según tu estructura --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- Datos personales -->
                <div class="mb-4">
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Datos Personales del Contribuyente</h1>
                    <div class="flex justify-between">
                        <div class="max-w-md space-y-1 text-gray-500 list-inside dark:text-gray-400">
                            <ul>
                                <li><b>Nombre:</b> {{ $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre . ' ' . $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido }}</li>
                                <li><b>N° de Identidad:</b> {{ $contribuyente->identidad }}</li>
                                <li><b>Sexo:</b> @if($contribuyente->sexo == 0) Femenino @elseif($contribuyente->sexo == 1) Masculino @else N/D @endif</li>
                                <li><b>N° de Teléfono:</b> {{ $contribuyente->telefono }}</li>
                                <li><b>Correo Electrónico:</b> {{ $contribuyente->email }}</li>
                            </ul>
                        </div>
                        <div class="border-l pl-4">
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Agregar Nueva Suscripción</h2>
                            <!-- Formulario para agregar una nueva suscripción -->
                            <form class="max-w-sm mx-auto" method="POST" action="{{ route('contribuyente.agregar-servicio') }}">
                                @csrf
                                <input type="hidden" name="contribuyenteId" value="{{ $contribuyente->id }}">
                                <label for="servicioId">Seleccione un servicio:</label>
                                <select name="servicioId" id="servicioId" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option value="" selected>Seleccione un servicio</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                                    @endforeach
                                </select>
                                <button type="submit">Agregar</button>
                            </form>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Lista de Suscripciones -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Lista de Suscripciones</h2>
                    <hr class="border-t border-gray-300 mb-4">
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
                            @if($sus->contribuyente_id == $contribuyente->id)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $sus->id }}</td>
                                <td class="px-6 py-4">{{ $sus->servicios->nombre_servicio }}</td>
                                <td class="px-6 py-4">{{ $sus->servicios->importes }}</td>
                                <td class="px-6 py-4">{{ $sus->fecha_suscripcion }}</td>
                                <td class="px-6 py-4">
                                    <form method="POST" action="{{ route('suscripcion.eliminar', $sus->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este servicio?')">Eliminar</button>
                                    </form>
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
                {{-- Enlace para volver atrás --}}
                <div class="text-center mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
