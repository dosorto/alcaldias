<div >
    <div class="bg-white p-4 modal fade  mx-auto rounded-md w-500 overflow-x-auto" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- Botón para abrir la modal -->
    <div class="modal-dialog modal-dialog-scrollable overflow-x-auto fixed inset-0 w-full h-600 bg-gray-500 bg-opacity-75 flex items-center justify-center"
        role="document">

        <div style="height:95%;" class="bg-white p-4 mx-auto rounded-md w-500 overflow-x-auto">

            <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Generar pago de servicio
                </h3>
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
            </div>

            <form wire:submit.prevent="storePago()">

            {{-- <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Datos Personales del Contribuyente</h1> --}}
            <!-- Datos personales -->
            <br>
        <div class="flex justify-between mb-1">
                <ul class="max-w-md space-y-1 text-gray-500  dark:text-gray-400">
                    <li><b>N° Recibo:</b> {{ $num_recibo }}</li>
                    <li><b>Fecha:</b> {{ $fechap }}</li>
                    <li><b>Encargado:</b> {{ Auth::user()->name }}</li>
                </ul>
                <div class="border-l pl-4">


                        <h3>Seleccione el periodo a pagar</h3>
                        <div class="flex">
                            <div class="flex items-end me-4">
                                <label for="underline_select" class="sr-only">Seleccione el año</label>
                                <select wire:model.live="anio_id" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Seleccione el año</option>
                                    @foreach ($anio as $an)
                                        <option value="{{ $an->id }}">{{ $an->anio }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="flex items-end me-4">
                                <label for="underline_select" class="sr-only">Seleccione el periodo</label>
                                <select wire:model.live="periodo_id" id="underline_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                    <option selected>Seleccione el periodo</option>
                                    @foreach ($periodos as $an)
                                        <option value="{{ $an->id }}">{{ $an->periodo }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                </div>
            </div>
            <div class="p-4">
                    <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Datos Personales del Contribuyente</h1>
            <!-- Datos personales -->
            <div class="flex justify-between">
                <div class="flex space-y-1 mr-4">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Nombre:</b> {{ $nombrecompleto }}</li>
                        <li><b>N° de Teléfono:</b> {{ $telefono }}</li>
                    </ul>
                </div>
                <div class="flex space-y-1 mr-4">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Correo Electrónico:</b> {{ $email }}</li>
                        <li><b>N° de Identidad:</b> {{ $identidad }}</li>
                    </ul>
                </div>
                <div class="flex space-y-1">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Sexo:</b> @if($sexo == 0) Femenino @elseif($sexo == 1) Masculino @else N/D @endif</li>

                    </ul>
                </div>
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Dirección:</b> {{ $direccion }}</li>

                </ul>
            </div>
        </div>

               <!-- Línea divisora -->
            <hr class="border-t border-gray-300 mb-4">

            <!-- Título de la tabla de suscripciones -->
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Servicios a pagar</h2>


            <!-- Tabla de suscripciones -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Id</th>
                        <th scope="col" class="px-6 py-3">Servicio</th>
                        <th scope="col" class="px-6 py-3" align="center">Importe</th>
                        <th scope="col" class="px-6 py-3" align="center">Fecha</th>
                    </tr>
                </thead>

                    @if ($alert == false)
                    @forelse ($susPeriodo as $sp)

                    <tbody>
                    {{-- @if($sp->contribuyente_id == $contribuyenteId) --}}
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $sp->id }}</td>
                        <input type="hidden" wire:model="servicios_pagar[]" name="servicios_pagar[]" value="{{ $sp->id }}">
                        <td class="px-6 py-4">{{ $sp->servicios->nombre_servicio }}</td>
                        <td class="px-6 py-4" align="center">L. {{ $sp->servicios->importes }}</td>
                        <td class="px-6 py-4">{{ $sp->fecha_suscripcion }}</td>
                    </tr>
                    @php
                    // Suma el importe del servicio actual al total
                    $totalVer += $sp->servicios->importes;
                    $totalFVer = number_format($totalImportes, 2, '.', ',');

                    @endphp
                    {{-- @endif --}}
                    @empty
                    <tr>
                        <td colspan="5">No Record Found</td>
                    </tr>
                    @endforelse
                    @if ($alert == false)
                    <tr>
                        <td colspan="2" align="end"><b>Total a pagar: </b></td>
                        <td align="center"> <b>L. {{ $totalFVer }}</b></td>
                        <input type="hidden" wire:model="totalImportes" name="totalImportes">
                        <td></td>
                    </tr>
                    @endif

                </tbody>

                    @else
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Pago ya relizado!</span> Ya se a generado el pago correspondiente a este periodo
                        </div>
                      </div>

                    @endif


            </table>
            </div>
            <div class="content-end justify-end place-content-end">
                @if ($alert == false && !empty($servicios_pagar))
                <button type="submit" data-modal-hide="popup-modal" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Generar pago
                </button>
                @endif

                <button wire:click="closeModal()" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancelar</button>
                {{-- <button wire:click="closeModal">Cerrar Modal</button> --}}

            </div>
    </form>
        </div>

    </div>
</div>
</div>






@if($deleteModal)
@include('livewire.suscripciones.delete')
@endif
