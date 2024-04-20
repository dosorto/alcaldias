@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
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
          <a href="/cobros" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Cobros</a>
        </div>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <a href="" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pagos Pendientes</a>
        </div>
      </li>

    </ol>
  </nav>
<div class="flex flex-wrap justify-center">
    <!-- Datos Personales -->
    <div class="w-full md:w-1/3 p-3">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-3">Datos Personales</h2>
            <div class="text-center mb-4">
                <img class="mx-auto mb-4" style="width: 150px;" src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0" alt="Imagen de usuario">
            </div>
            <hr class="my-4">
            <p><b>Nombres:</b> {{ $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre }}</p>
            <p><b>Apellidos:</b> {{ $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido }}</p>
            <p><b>N° de Identidad:</b> {{ $contribuyente->identidad }}</p>
            <p><b>Sexo:</b> @if($contribuyente->sexo == 0) Femenino @elseif($contribuyente->sexo == 1) Masculino @else N/D @endif</p>
            <p><b>N° de Teléfono:</b> {{ $contribuyente->telefono }}</p>
            <p><b>Correo Electrónico:</b> {{ $contribuyente->email }}</p>
        </div>
    </div>
    
    <!-- Historial de Pagos -->
    <div class="w-full md:w-2/3 p-3">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white text-center mb-2">Lista de Pagos Pendientes</h2>
        <hr class="border-t border-gray-300 mb-4">
        
        <!-- Tabla de historial de pagos -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Id</th>
                        <th scope="col" class="px-6 py-3">Numero de Recibo</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Monto</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagoservicios as $pago)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $pago->id }}</td>
                        <td class="px-6 py-4">{{ $pago->num_recibo }}</td>
                        <td class="px-6 py-4">{{ $pago->fecha_pago }}</td>
                        <td class="px-6 py-4">{{ $pago->total }}</td>
                        <td class="px-6 py-4">{{ $pago->estado }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay registros</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
      
      <div class="mt-4">
            <p class="text-lg font-semibold">Total a Pagar L: {{ $totalAPagar }}</p>
        </div>
        <div class="text-center mt-4">
    <button onclick="confirmarProcesarPago('{{ route('imprimir_factura', $contribuyente->id) }}')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Procesar Pago</button>
</div>
</div>
<form id="procesarPagoForm" method="POST" action="{{ route('procesar_pago') }}">
    @csrf
    <input type="hidden" name="idsesioncaja" value="{{ $sesioncaja->id }}">
    @foreach($pagoservicios as $pagos)
    <input type="hidden" name="num_recibo" value="{{ $pagos->num_recibo }}">
    <input type="hidden" name="fecha" value="{{ $pagos->fecha_pago }}">
    @endforeach
    <input type="hidden" name="monto" value="{{ $totalAPagar }}">
    <input type="hidden" name="contribuyente_id" value="{{ $contribuyente->id }}">
    
</form>
</div>

<script>
    function imprimirFactura(url) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                var iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                document.body.appendChild(iframe);
                iframe.contentDocument.write(data);
                setTimeout(function() {
                    iframe.contentWindow.print();
                    setTimeout(function() {
                        document.body.removeChild(iframe);
                        // Después de imprimir, enviar el formulario
                        document.getElementById('procesarPagoForm').submit();
                    }, 1000);
                }, 100);
            })
            .catch(error => console.error('Error:', error));
    }
    
    function confirmarProcesarPago(url) {
        if (confirm("¿Estás seguro de que deseas procesar el pago?")) {
            imprimirFactura(url);
        }
    }
</script>

@endsection
