




<div class="bg-white p-4 modal fade  mx-auto rounded-md w-500" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center"
        role="document">
        <div class="bg-white p-4   mx-auto rounded-md w-500">
            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <button wire:click="closeModal()" type="button"
                    class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="default-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>

                <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Datos personales del contribuyente:</h2>
            <div>
                <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>
            Nombre: {{ $nombrecompleto }}
            </li>
            <li>
            # de Identidad: {{ $identidad }}
            </li>
            <li>
            Sexo: @if($sexo == 0)
                    Femenino
                @elseif($sexo == 1)
                    Masculino
                @else
                    Otro
                @endif
            </li>
            <li>
            # de Teléfono: {{ $telefono }}
            </li>
            <li>
            Correo Electrónico: {{ $email }}
            </li>
        </ul>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Servicio
                </th>
                <th scope="col" class="px-6 py-3">
                    Importe
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Suscripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Eliminar
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suscripciones as $sus)
                @if($sus->contribuyente_id == $contribuyenteId)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4" >{{ $sus->id }}</td>
                    <td class="px-6 py-4">{{ $sus->servicios->nombre_servicio }}</td>
                    <td class="px-6 py-4">{{ $sus->servicios->importes }}</td>
                    <td class="px-6 py-4">{{ $sus->fecha_suscripcion }}</td>
                    <td class="px-6 py-4">
                        <button  wire:click="openModalCreate({{ $con->id }})" type="button" class="text-white bg-red-700 hover:bg-red-800  font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-6 h-6  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                              </svg>
                        </button>   
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
    </div>
</div>
