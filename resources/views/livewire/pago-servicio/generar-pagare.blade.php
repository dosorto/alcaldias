<div>
    @if (session()->has('message'))
        <div id="errorMessage" duration=30
            class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('message') }}

            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div>
                <span class="font-medium">
                    {{ session('error') }}

            </div>
        </div>
    @endif

    <!-- Breadcrumb -->
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/"
                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    Inicio
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="/pago-servicio"
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pago
                        de Servicios</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <a
                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Generar
                        Pagare</a>
                </div>
            </li>

        </ol>
    </nav>

    <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Datos Personales del Contribuyente
    </h1>
    <!-- Datos personales -->
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md">
        <div class="flex justify-between mb-5">
            <div>
                <img class="rounded-full w-20 h-20" src="https://cdn-icons-png.flaticon.com/512/2922/2922616.png"
                    alt="image description">
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Nombre:</b> {{ $nombrecompleto }}</li>
                    <li><b>Dirección:</b> {{ $direccion }}</li>
                    <li><b>Fecha de Nacimiento:</b> {{ $fecha_nacimiento }}</li>
                </ul>
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Correo Electrónico:</b> {{ $email }}</li>
                    <li><b>N° de Identidad:</b> {{ $identidad }}</li>
                    <li><b>Profesión:</b> {{ $profesion->nombre }}</li>

                </ul>
            </div>
            <div class="flex space-y-1 mr-4">
                <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                    <li><b>Sexo:</b>
                        @if ($sexo == 0)
                            Femenino
                        @elseif($sexo == 1)
                            Masculino
                        @else
                            N/D
                        @endif
                    </li>
                    <li><b>Dirección:</b> {{ $direccion }}</li>
                </ul>
            </div>
        </div>
        <div class="flex justify-between gap-8">
            <div class="grid">
                <h1 class="text-lg font-semibold text-gray-900 dark:text-white text-center">Seleccionar Servicio</h1>
                <form wire:submit.prevent="store()" class="flex gap-4 h-10 w-96" id="miFormulario">
                    <div wire:ignore>
        
                        <select id="editable-select" aria-placeholder="Seleccione">
                            @foreach ($servicios as $servi)
                                <option value="{{ $servi->nombre_servicio }}">{{ $servi->nombre_servicio }}</option>
                            @endforeach
                        </select>
        
                        {{-- <select style="height: 120px" wire:model="serviceSelected" class="select2">
                            <option> Seleccione</option>
                            @foreach ($servicios as $servi)
                                <option value="{{ $servi->nombre_servicio }}">{{ $servi->nombre_servicio }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    <div class="content-center justify-center place-content-center">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Seleccionar
                        </button>
                    </div>
                </form>
                <div class="mt-5 w-full relative max-h-56 overflow-y-auto">
                    <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Suscripciones del
                        contribuyente</h1>
                    <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="sm:pb-2 ">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <div class="flex-shrink-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        ID
                                    </p>
                                </div>
                                <div class="flex-1 inline-flex min-w-0 justify-center">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Servicio
                                    </p>
                                </div>
                                <div class="inline-flex min-w-20 justify-center">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                        Acción
                                    </p>
                                </div>
                            </div>
                        </li>
                        @forelse ($suscripciones as $sus)
                            <li class="pb-3 sm:pb-2 sm:pt-2">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $sus->servicio_id }}
                                        </p>
                                    </div>
                                    <div class="flex-1 inline-flex min-w-0 justify-center">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $sus->servicios->nombre_servicio }}
                                        </p>

                                    </div>
                                    <div class="inline-flex min-w-20 justify-center">
                                        <button wire:click="storeSubs({{ $sus->servicios->id }})" type="button"
                                            class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Seleccionar
                                        </button>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li>
                                <p>No Record Found</p>
                            </li>
                        @endforelse
                    </ul>

                    {{-- <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Id</th>
                        <th scope="col" class="px-6 py-3">Servicio</th>
                        <th scope="col" class="px-6 py-3">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suscripciones as $sus)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $sus->id }}</td>
                                <td class="px-6 py-4">{{ $sus->servicios->nombre_servicio }}</td>
                                <td class="px-6 py-4">
                                    <button wire:click="storeSubs({{ $sus->servicios->id }})" type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
            {{ $suscripciones->links()  }}
            <br> --}}
                </div>
            </div>

            <div class="w-full max-h-80">
                <div class="flex justify-between gap-4 h-10 w-full">
                    <div class="flex-1">
                        <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Servicios
                            seleccionados a pagar</h1>

                    </div>
                    <div align="rigth">
                        <button wire:click="abrirModal" type="button" class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm p-2 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Generar
                        </button>
                    </div>
                </div>
                <div class="w-full max-h-80 overflow-y-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">Id</th>
                                <th scope="col" class="px-6 py-3">Servicio</th>
                                <th scope="col" class="px-6 py-3">Importe</th>
                                <th scope="col" class="px-6 py-3">Clave</th>
                                <th scope="col" class="px-6 py-3">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($servicios_pagar as $index => $servicio)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4">{{ $servicio['id'] }}</td>
                                    <td class="px-6 py-4">{{ $servicio['nombre_servicio']  }}</td>
                                    <td class="px-6 py-4">
                                    @if ($indexEditable === $index)
                                        <!-- Modal -->
                                        <div class="fixed inset-0 w-full h-full bg-gray-500 bg-opacity-75 flex items-center justify-center">
                                            <!-- Contenido de la modal -->
            
                                            <div class="bg-white p-4 min-w-96 max-w-md mx-auto rounded-md">
                                                <!-- Contenido de tu modal aquí -->
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        Editar importe
                                                    </h3>
                                                    <button wire:click="closeModal()" type="button" class="mb-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <div class="p-4 md:p-4">
                                                        <div class="mb-2">
                                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Servicio</label>
                                                    <p>{{ $servicio['nombre_servicio'] }}</p>
                                                </div>
                                                            <label for="precioEditable" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Importe</label>
                                                            <input  type="number" wire:model.live="precioEditable" id="simple-search" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                            @if($precioEditable > 999999)
                                                            <div class="mt-2 flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                                </svg>
                                                                <span class="sr-only">Info</span>
                                                                <div>
                                                                  <span class="font-medium">Alerta!</span> El valor del importe excede el límite
                                                                </div>
                                                              </div>
                                                            @endif
                                                        </div>
                                                        <div class="w-full content-center justify-center place-content-center">
                                                            @if($precioEditable < 999999)
                                                            <button  wire:click="actualizarImporte" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                               Guardar
                                                            </button>
                                                            @endif
                                                            <button wire:click="closeModal()" data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                                                        </div>
                                                </div>
                                        </div>
                                        @else
                                    L. {{ $servicio['importes']}}
                                        <button wire:click="editarImporte({{ $index }})">
                                            <svg width="20px" height="20px" viewBox="0 0 24.00 24.00" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#c5c804">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.048"/>
                                                <g id="SVGRepo_iconCarrier"> <path d="M12 3.99997H6C4.89543 3.99997 4 4.8954 4 5.99997V18C4 19.1045 4.89543 20 6 20H18C19.1046 20 20 19.1045 20 18V12M18.4142 8.41417L19.5 7.32842C20.281 6.54737 20.281 5.28104 19.5 4.5C18.7189 3.71895 17.4526 3.71895 16.6715 4.50001L15.5858 5.58575M18.4142 8.41417L12.3779 14.4505C12.0987 14.7297 11.7431 14.9201 11.356 14.9975L8.41422 15.5858L9.00257 12.6441C9.08001 12.2569 9.27032 11.9013 9.54951 11.6221L15.5858 5.58575M18.4142 8.41417L15.5858 5.58575" stroke="#cdd105" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/> </g>
                                                </svg>
                                        </button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $servicio['clave_presupuestaria'] }}</td>
                                    <td class="px-6 py-4">
                                        <button wire:click="removeServicio({{ $index }})" type="button" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @php
                            // Suma el importe del servicio actual al total
                            $totalImporte += $servicio['importes'];
                                $this->totalImportes = $totalImporte;
                            @endphp
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div align="center" class="mt-5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#000" class="bi bi-journal" viewBox="0 0 16 16">
                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                  </svg>
                                </div>
                                <p align="center" class="mt-1 text-xl text-gray-900 dark:text-white">
                                    Sin servicios agregados
                                </p>
                            </td>
                    </tr>

                @endforelse
            </tbody>
                    </table>
                    <input type="hidden" wire:model.live="totalImportes">
                </div>
            </div>
        </div>


        <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md border-t mt-5">
            <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Registro de pagares</h1>

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">Número de Pago</th>
                        <th scope="col" class="px-6 py-3">Servicios a pagar</th>
                        <th scope="col" class="px-6 py-3">Importe Total</th>
                        <th scope="col" class="px-6 py-3">Fecha</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listaPagare as $lista)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $lista->num_recibo }}</td>
                            <td class="px-6 py-4">
                                @foreach ($lista->servicios as $servicio)
                                    {{ $servicio->nombre_servicio }},
                                @endforeach
                            </td>
                            <td class="px-6 py-4">L. {{ number_format($lista->total, 2, '.', ',') }}</td>
                            <td class="px-6 py-4">{{ $lista->fecha_pago }}</td>
                            <td class="px-6 py-4">
                                @if ($lista->estado == 'Pendiente')
                                    <button disabled type="button"
                                        class="text-white bg-red-900  font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ $lista->estado }}
                                    </button>
                                @else
                                    <button disabled type="button"
                                        class="text-white bg-green-900  font-medium rounded-lg text-sm p-1.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        {{ $lista->estado }}
                                    </button>
                                @endif



                            </td>
                            <td>
                                <button wire:click="eliminarRegistro({{ $lista->id }})" type="button"
                                    class="mb-3 text-red-400 bg-transparent hover:bg-gray-200 hover:text-red-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
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
            {{ $listaPagare->links() }}
        </div>



    </div>
    @if($isOpen)
    @include('livewire.pago-servicio.resumen')
    @endif

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<script>
//     jQuery(document).ready(function() {
//         jQuery('.select2').select2();

//         jQuery('.select2').on('select2:select', function (e) {
//             var theSelection = e.params.data.id;
//             @this.set('serviceSelected', this.value)
//             console.log(this.value);
//     })
// })
    $('#editable-select').on('select.editable-select', function (e) {
    @this.set('serviceSelected', this.value)
    }).editableSelect();
</script>
</div>