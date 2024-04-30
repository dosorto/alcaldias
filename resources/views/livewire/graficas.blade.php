<div class="w-full bg-gradient-to-br from-purple-500 via-pink-500 to-red-500 border border-gray-200 rounded-lg shadow-xl dark:bg-gradient-to-br dark:from-purple-700 dark:via-pink-700 dark:to-red-700">
    <ul class="text-center text-sm font-medium text-white divide-x divide-white rounded-lg sm:flex">
        <!-- Aquí puedes agregar más opciones de pestañas si lo necesitas -->
    </ul>
    <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
        <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
            <dl class="grid grid-cols-1 gap-4 p-4 mx-auto text-gray-900 sm:grid-cols-3 xl:grid-cols-5 dark:text-white sm:p-8">
                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-yellow-400 to-red-500 rounded-lg shadow-md p-4">
                    <dt class="mb-2 text-3xl font-extrabold">{{$totalContribuyentes}}</dt>
                    <dd class="text-gray-800 dark:text-gray-400">Contribuyentes</dd>
                </div>
                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-green-400 to-blue-500 rounded-lg shadow-md p-4">
                    <dt class="mb-2 text-3xl font-extrabold">{{$totalservicio}}</dt>
                    <dd class="text-gray-800 dark:text-gray-400">Servicios</dd>
                </div>
                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-pink-400 to-purple-500 rounded-lg shadow-md p-4">
                    <dt class="mb-2 text-3xl font-extrabold">{{$totaluser}}</dt>
                    <dd class="text-gray-800 dark:text-gray-400">Usuarios</dd>
                </div>
                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-blue-400 to-green-500 rounded-lg shadow-md p-4">
                    <dt class="mb-2 text-3xl font-extrabold">{{$totalIngresos}}</dt>
                    <dd class="text-gray-800 dark:text-gray-400">Ingresos último mes</dd>
                </div>
                <div class="flex flex-col items-center justify-center bg-gradient-to-br from-purple-400 to-yellow-500 rounded-lg shadow-md p-4">
                    <dt class="mb-2 text-3xl font-extrabold">{{ $servicioMasPagado }}</dt>
                    <dd class="text-gray-800 dark:text-gray-400">Servicio más pagado</dd>
                </div>
            </dl>

            <h2 class="text-xl font-bold mb-4 text-center text-gray-900 dark:text-white">Últimos Contribuyentes</h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-300">
                    <thead class="text-xs text-white uppercase bg-gradient-to-r from-gray-400 to-gray-700 dark:from-gray-700 dark:to-gray-900">
                        <tr>
                            {{-- <th scope="col" class="px-6 py-3">Id</th> --}}
                            <th scope="col" class="px-6 py-3">Identidad</th>
                            <th scope="col" class="px-6 py-3">Nombre</th>
                            <th scope="col" class="px-6 py-3">Telefono</th>
                            <th scope="col" class="px-6 py-3">Correo</th>
                            <th scope="col" class="px-6 py-3">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ultimosContribuyentes as $con)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                {{-- <td class="px-6 py-4">{{ $con->id }}</td> --}}
                                <td class="px-6 py-4">{{ $con->identidad }}</td>
                                <td class="px-6 py-4">{{ $con->primer_nombre }} {{ $con->segundo_nombre }} {{ $con->primer_apellido }}</td>
                                <td class="px-6 py-4">{{ $con->telefono }}</td>
                                <td class="px-6 py-4">{{ $con->email }}</td>
                                <td class="px-6 py-4">{{ $con->direccion}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Agregar paginación -->
            <div class="mt-4">
                {{ $ultimosContribuyentes->links() }}
            </div>
        </div>
    </div>
</div>
