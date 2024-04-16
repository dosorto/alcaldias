<div id="estilo" class="flex flex-wrap">
    <div class="w-full md:w-1/3 p-3">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-xl font-bold mb-3" style="text-align: center;">Información de cierre de caja</h2>
            <br>
            <img style="width: 150px; margin-left: 85px;" src="https://cdn-icons-png.flaticon.com/512/245/245431.png">
            <br>
            <hr class="border-t border-gray-300 mb-4">
            <p><b>Usuario:</b> {{ $usuario->name ?? 'Usuario no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p><b>Hora y fecha de apertura:</b></p>
            <p>{{ $fechainiciocaja ?? 'Fecha no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p><b>Monto de apertura:</b> {{ $montoInicial ?? 'Monto no disponible' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p><b>Total de operaciones realizadas:</b> {{ $totalOperaciones ?? 'Operaciones no disponibles' }}</p>
            <hr class="border-t border-gray-300 mb-4">
            <p><b>Monto de cierre:</b> {{ $totalCaja ?? 'Total no disponible' }}</p>
            <p id="mensajeCierreCaja" class="text-sm text-gray-500 mt-2"></p>
        </div>
    </div>
    <div class="w-full md:w-2/3 p-3">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert" id="alertaCierre" style="display: none;">
            </div>
            <div class="flex flex-wrap justify-between mb-4">
                <form wire:submit.prevent="cerrarSesionCaja" class="mt-4">
                    <h2 class="text-xl font-bold mb-3">Monto de Cierre</h2>
                    <label for="montoCierreUser" class="block">Ingrese la cantidad de dinero en caja:</label>
                    <input wire:model="montoCierreUser" @if (!$inputEnabled) disabled @endif type="number" id="montoCierreUser" name="montoCierreUser" class="mt-1 mb-4 p-2 border rounded">
                    <br>
                    @if($botonHabilitado)
                    <button type="submit" wire:loading.attr="disabled" wire:loading.remove class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Cerrar Sesión
                    </button>
                    @endif
                    <a href="/" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Volver a Inicio</a>
                </form>
            </div>
            <br>
            <div style="overflow-x: auto;">
                <h2 class="text-xl font-bold mb-3">Operaciones realizadas en la sesión</h2>
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
                            <td colspan="5" class="text-center">No se realizaron operaciones</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('[type="submit"]').addEventListener('click', function() {
        var montoCierreUser = document.getElementById('montoCierreUser').value;
        var totalCaja = {{ $totalCaja ?? 0 }};
        var cierreCaja = totalCaja - montoCierreUser;
        if (cierreCaja === 0) {
            alert('Se ha cerrado sesión correctamente. El cierre de caja cuadra.');
        } else {
            alert('Se ha cerrado sesión correctamente. El cierre de caja no cuadra. Diferencia: ' + cierreCaja);
        }
    });
</script>

