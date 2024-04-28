<div>
    <!-- Modal -->
    <div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center ">
        <!-- Contenido de la modal -->
        <div class="bg-white p-8 max-w-lg mx-auto rounded-md dark:bg-gray-900">
            <!-- Título de la modal -->
            <h2 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200 dark:text-white">Resumen De Pago</h2>

            <!-- Fecha actual -->
            <p class="text-sm text-gray-500 mb-4">Fecha actual: <span id="fecha-actual"></span></p>

            <!-- Tabla de servicios -->
            <div class="overflow-x-auto dark:bg-gray-900">
                <table class="min-w-full divide-y divide-gray-200 dark:bg-gray-900">
                    <thead class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicios a Pagar</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Importe</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:text-gray-400">
                        @php
                            $totalImportes = 0;
                        @endphp
                        @foreach($servicios_pagar as $servicio)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $servicio['nombre_servicio'] }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $servicio['importes'] }}</td>
                            @php
                                $totalImportes += $servicio['importes'];
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Total de los importes -->
            <p class="text-sm text-gray-500 mt-4">Total de importes: L.{{ $totalImportes }}</p>

            <!-- Botones de la modal -->
            <div class="flex justify-center mt-4">
                <button wire:click="guardarRegistro" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-3">
                    Confirmar pago
                </button>
                <button wire:click="cerrarModal" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtener la fecha actual
    const fechaActual = new Date();

    // Formatear la fecha en el formato deseado (DD/MM/AAAA)
    const formatoFecha = `${fechaActual.getDate()}/${fechaActual.getMonth() + 1}/${fechaActual.getFullYear()}`;

    // Mostrar la fecha actual en el elemento con el ID "fecha-actual"
    document.getElementById('fecha-actual').textContent = formatoFecha;
</script>
