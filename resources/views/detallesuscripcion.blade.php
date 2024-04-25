@extends('layouts.app')

@section('content')
<div>
<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
          <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
          </svg>
          Inicio
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="/suscripciones" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Suscripciones</a>
        </div>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="/" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Detalle Suscripciones</a>
        </div>
      </li>

    </ol>
  </nav>  

<div class="flex flex-col items-center dark:bg-gray-900">
    <!-- Historial de Pagos -->
    <div class="w-full bg-white shadow-md rounded px-8 pt-8 pb-8 mb-4 dark:bg-gray-900">
        <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center"><u>Datos Personales del Contribuyente</u></h1>
        
        <!-- Datos personales -->
        <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
        <div class="flex justify-between mb-5 dark:bg-gray-900">
            <div>
                <img class="rounded-full w-20 h-20" src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0"
                    alt="image description">
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Nombre:</b> {{ $contribuyente->primer_nombre . ' ' . $contribuyente->primer_apellido }}</li>
                    <li><b>Fecha de Nacimiento:</b> {{ $contribuyente->fecha_nacimiento }}</li>
                </ul>
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Correo Electrónico:</b> {{ $contribuyente->email }}</li>
                    <li><b>N° de Identidad:</b> {{ $contribuyente->identidad }}</li>

                </ul>
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Sexo:</b>
                        @if ($contribuyente->sexo == 0)
                            Femenino
                        @elseif($contribuyente->sexo == 1)
                            Masculino
                        @else
                            N/D
                        @endif
                    </li>
                    <li><b>Dirección:</b> {{ $contribuyente->direccion }}</li>
                </ul>
            </div>
        </div>
        </div>
        <br>
        <br>
        <!-- Filtro por año -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2"><u>Agregar Nueva Suscripción</u></h2>
            <br>
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
                <br>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar</button>
            </form>
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <!-- Tabla de historial de pagos -->
        <div>   
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2"><u>Lista de Suscripciones</u></h2>
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
                                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este servicio?')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
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
    </div>
</div>
@endsection
