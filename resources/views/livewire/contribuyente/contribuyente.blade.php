<div class="container mx-auto">
    <!-- Perfil del Contribuyente -->
    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <h2 class="text-3xl font-extrabold mb-4">Perfil del Contribuyente</h2>
        <hr class="my-2 border-gray-200">
        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <p class="text-gray-600 font-semibold">Nombre:</p>
                <p class="text-gray-900">Juan Pérez</p>
            </div>
            <div>
                <p class="text-gray-600 font-semibold">Identidad:</p>
                <p class="text-gray-900">123456789</p>
            </div>
            <!-- Agrega más campos de información personal aquí -->
        </div>
    </div>

    <!-- Historial de Pagos -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-extrabold mb-4">Historial de Pagos</h2>
        <hr class="my-2 border-gray-200">
        <!-- Filtros -->
        <div class="flex justify-between mb-4">
            <div>
                <label for="year" class="block text-sm font-medium text-gray-700">Año:</label>
                <select id="year" name="year" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option>2024</option>
                    <!-- Agrega más opciones de años según sea necesario -->
                </select>
            </div>
            <div>
                <label for="service" class="block text-sm font-medium text-gray-700">Servicio:</label>
                <select id="service" name="service" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option>Todos</option>
                    <option>Servicio 1</option>
                    <option>Servicio 2</option>
                    <!-- Agrega más opciones de servicios según sea necesario -->
                </select>
            </div>
        </div>
        <!-- Tabla de Historial de Pagos -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Servicio</th>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">2024-01-01</td>
                        <td class="px-6 py-4 whitespace-nowrap">$100.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">Servicio 1</td>
                        <!-- Agrega más columnas según sea necesario -->
                    </tr>
                    <!-- Agrega más filas de historial de pagos aquí -->
                </tbody>
            </table>
        </div>
    </div>
</div>
