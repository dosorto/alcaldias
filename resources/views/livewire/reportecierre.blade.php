

<div class="overflow-x-auto">
<h4 class="text-lg font-semibold text-gray-900 dark:text-white mt-4">Información de cierre de caja:</h4>
  <p>Usuario: {{ $usuario->name ?? 'Usuario no disponible' }}</p>
  <p>Fecha Inicio Caja: {{ $fechainiciocaja ?? 'Fecha no disponible' }}</p>
  <p>Monto Inicial: {{ $montoInicial ?? 'Monto no disponible' }}</p>
  <p>Total de Operaciones: {{ $totalOperaciones ?? 'Operaciones no disponibles' }}</p>
  <p>Total en Caja: {{ $totalCaja ?? 'Total no disponible' }}</p>
  <p id="mensajeCierreCaja" class="text-sm text-gray-500 mt-2"></p>
  <h4 class="text-lg font-semibold text-gray-900 dark:text-white mt-4">Operaciones Caja:</h4>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">Numero de Recibo</th>
        <th scope="col" class="px-6 py-3">Fecha</th>
        <th scope="col" class="px-6 py-3">Monto</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($operacionesSesion as $sesion)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="px-6 py-4">{{ $sesion->num_recibo }}</td>
        <td class="px-6 py-4">{{ $sesion->fecha }}</td>
        <td class="px-6 py-4">{{ $sesion->monto }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">No hay registros</td>
      </tr>
      @endforelse
    </tbody>
  </table>

   <!-- Formulario para ingresar el monto de cierre y cerrar sesión de caja -->
   <form wire:submit.prevent="cerrarSesionCaja" class="mt-4">
        <label for="montoCierreUser" class="block">Ingrese el dinero total en físico:</label>
        <input wire:model="montoCierreUser" type="number" id="montoCierreUser" name="montoCierreUser" class="mt-1 mb-4 p-2 border rounded">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Cerrar Sesión</button>
    </form>
</div>

