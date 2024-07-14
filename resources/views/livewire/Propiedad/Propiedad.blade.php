<div>
    <!-- Mensaje de sesión -->
    @if (session()->has('message'))
        <div id="alert-border-3" duration=30
            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('message') }}
            </div>
        </div>
    @endif

    <!-- Breadcrumb (migas de pan) -->
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
                    <a href="/propiedades" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Propiedades</a>
                </div>
            </li>
        </ol>
    </nav>
    <br>

    <!-- Contenedor principal -->
    <div class="columns-2"></div>

    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
        <h2 class="text-3xl font-extrabold dark:text-white">Gestión de Propiedades</h2>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

        <!-- Barra de búsqueda y botón de nuevo -->
        <div class="flex items-center justify-between md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search-propiedades"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar...">
            </div>
            <div>
                <div class="inline-flex rounded-md shadow-sm" role="group">
                    <a href="{{route('nuevaPropiedad')}}" type="button"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                        </svg>
                        Nueva Propiedad
                    </a>
                </div>
            </div>
        </div>
        

        <!-- Tabla de propiedades -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">Id</th>
                    <th scope="col" class="p-4">ClaveCatastral</th>
                    <th scope="col" class="px-6 py-3">Propietario</th>
                    <th scope="col" class="px-6 py-3">Tipo de Propiedad</th>
                    <th scope="col" class="px-6 py-3">Georeferenciación</th>
                    <th scope="col" class="px-6 py-3">Direccion</th>
                    <th scope="col" class="px-6 py-3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propiedades as $propiedad)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $propiedad->id }}</td>
                        <td class="px-6 py-4">{{ $propiedad->ClaveCatastral }}</td>
                        <td class="px-6 py-4">{{ $propiedad->Contribuyente->primer_nombre }} {{ $propiedad->Contribuyente->segundo_nombre }} {{ $propiedad->Contribuyente->primer_apellido }} {{ $propiedad->Contribuyente->segundo_apellido }}</td> 
                        <td class="px-6 py-4">{{ $propiedad->TipoPropiedad->Nombre}} </td>
                        <td class="px-6 py-4">{{ $propiedad->IdGeoreferencia}}</td>
                        <td class="px-6 py-4">{{ $propiedad->Barrio->nombre}}</td>
                        <td class="px-6 py-4">
                        <button wire:click="openModalEdit({{ $propiedad->id }})"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#FF9119] hover:bg-[#FF9119]/80 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z" />
                    </svg>
                </button>
                <button wire:click="openModalDelete({{ $propiedad->id }})"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-700 hover:bg-red-800 rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                    </svg>
                </button>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td colspan="6" class="px-6 py-4 text-center">
                            No hay propiedades disponibles.
                        </td>
                    </tr>
                @endforelse
            </tbody>



        </table>


        

        <!-- Paginación -->
        <div class="py-4">
            {{ $propiedades->links() }}
        </div>
    </div>

    @if ($createModal)
        @include('livewire.Propiedad.create')
    @endif

    @if ($updateModal)
        @include('livewire.Propiedad.update')
    @endif

    @if ($deleteModal)
        @include('livewire.Propiedad.delete')
    @endif

</div>