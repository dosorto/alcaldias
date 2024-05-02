<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
        <h2 class="text-3xl font-extrabold dark:text-white">Contribuyentes</h2>
        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">

        <div
            class="flex items-center justify-between  md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:model.live="search" type="text" id="table-search-users"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar...">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Identidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Primer nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Segundo nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Primer apellido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Segundo apellido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Historial
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contribuyentes as $con)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $con->id }}</td>
                        <td class="px-6 py-4">{{ $con->identidad }}</td>
                        <td class="px-6 py-4">{{ $con->primer_nombre }}</td>
                        <td class="px-6 py-4">{{ $con->segundo_nombre }}</td>
                        <td class="px-6 py-4">{{ $con->primer_apellido }}</td>
                        <td class="px-6 py-4">{{ $con->segundo_apellido }}</td>
                        <td class="px-6 py-4">
                            <button wire:click="historial({{ $con->id }})" type="button"
                                class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80  font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Seleccionar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <br>
        {{ $contribuyentes->links() }}
    </div>

    @if ($createModal)
        @include('livewire.perfil-contribuyentes.perfil-contribuyentes')
    @endif
