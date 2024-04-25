<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Breadcrumb -->
    <nav class="flex" aria-label="Breadcrumb">
        <!-- Breadcrumb items -->
        <!-- Left breadcrumb items -->
        <ol class="flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="flex items-center">
                <a href="/" class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    Inicio
                </a>
            </li>
            <li class="flex items-center">
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="/reporte" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Reporte de ingresos</a>
                </div>
            </li>
        </ol>
    </nav>

    <br>

    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md">
        <div class="flex items-center justify-between md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <h2 class="text-3xl font-extrabold dark:text-white">Reporte de Ingresos</h2>
            <div class="flex items-center space-x-4">
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M12 3c.3 0 .6.1.8.4l4 5a1 1 0 1 1-1.6 1.2L13 7v7a1 1 0 1 1-2 0V6.9L8.8 9.6a1 1 0 1 1-1.6-1.2l4-5c.2-.3.5-.4.8-.4ZM9 14v-1H5a2 2 0 0 0-2 2v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0-2 1 1 0 1 0 0-2Z" />
                    </svg>
                    Importar
                </button>
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                        <path d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 1 1 0 2Z" />
                    </svg>
                    Exportar
                </button>
            </div>
        </div>
        
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="flex items-center justify-between md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <!-- Filtro por rango de fecha -->
            <div class="flex items-center space-x-4">
                <div>
                    <label for="start_date" class="text-sm font-medium text-gray-700 dark:text-gray-400">Fecha Inicial:</label>
                    <input wire:model="startDate" type="date" id="start_date" class="ml-2 block w-36 py-2 px-3 mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="end_date" class="text-sm font-medium text-gray-700 dark:text-gray-400">Fecha Final:</label>
                    <input wire:model="endDate" type="date" id="end_date" class="ml-2 block w-36 py-2 px-3 mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <!-- Botones Buscar y Mostrar Todo -->
            <div class="flex items-end space-x-4 md:mt-0 md:space-x-2">
                <button wire:click="buscar" class="inline-flex items-center px-6 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5a4 4 0 1 1 0 8 4 4 0 0 1 0-8ZM8 7a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM14 9a2 2 0 1 1-2 2 2 2 0 0 1 2-2Z"/>
                    </svg>
                    Buscar
                </button>
                <button wire:click="mostrarTodos" class="inline-flex items-center px-6 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                    <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm0-6a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Zm-1-6.586a1 1 0 0 0-1.707-.707L9 9.293V2a1 1 0 1 0-2 0v7.293L5.707 8.707a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0 .293-.707Z" clip-rule="evenodd"/>
                    </svg>
                    Mostrar Todo
                </button>
            </div>
        </div>
        
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Total de ingresos -->
        <div class="flex justify-end mt-2 bg-gray-30 dark:bg-gray-800 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Total de Ingresos:</h3>
            <span class="text-xl font-bold text-blue-500 ml-2 dark:text-blue-300">{{ $totalIngresos }}</span>
        </div>
        
        <!-- Tabla de datos -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <!-- Encabezados de tabla -->
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contribuyente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. Recibo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de Pago
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Monto
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Contenido de la tabla -->
                @forelse ($pagoservicios as $pago)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $pago->id }}</td>
                        <td class="px-6 py-4">
                            @if ($pago->primer_nombre && $pago->primer_apellido)
                                {{ $pago->primer_nombre }} {{ $pago->primer_apellido }}
                            @else
                                Sin contribuyente asociado
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $pago->num_recibo }}</td>
                        <td class="px-6 py-4">{{ $pago->fecha_pago }}</td>
                        <td class="px-6 py-4">{{ $pago->total }}</td>
                    </tr>
                @empty
                    <!-- Mensaje si no hay registros -->
                    <tr>
                        <td colspan="5">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Paginación -->
        <div class="mt-4">
            {{ $pagoservicios->links() }}
        </div>
        
      
    </div>
</div>
