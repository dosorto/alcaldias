




<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')

    <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
</head>

<body class="bg-white dark:bg-gray-900">

@vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')

<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

            <!-- Dropdown menu <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />-->

            <h3 class="text-3xl font-bold dark:text-white">SMIT - PRO </h3>
            </a>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white-100 dark:bg-gray-900 md:dark:bg-gray-800 dark:border-gray-900">
                    <li>
                        <a href="/"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Inicio</a>
                    </li>
                    <li>
                        
                    </li>
                    
            </ul>
           
            <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
            </button>
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
</script>
        </div>
        </div>
    </nav>
<br>
    <!-- Datos personales -->
    
    <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
            <h1 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Datos Personales del Contribuyente</h1>
            <div class="flex justify-between mb-5">
                <div>
                    <img class="rounded-full w-20 h-20" src="https://cdn-icons-png.flaticon.com/512/2922/2922616.png"
                        alt="image description">
                </div>
                <div class="flex space-y-1 mr-4">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Nombre:</b> {{ $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre . ' ' . $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido }}</li>
                        <li><b>N° de Identidad:</b> {{ $contribuyente->identidad }}</li>
                    </ul>
                </div>
                <div class="flex space-y-1 mr-4">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Fecha de Nacimiento:</b> {{ $contribuyente->fecha_nacimiento }}</li>
                        <li><b>N° de Identidad:</b> {{ $contribuyente->identidad }}</li>
                    </ul>
                </div>
                <div class="flex space-y-1 mr-4">
                    <ul class="max-w-md space-y-1 text-gray-500 dark:text-gray-400">
                        <li><b>Correo Electrónico:</b> {{ $contribuyente->email }}</li>
                        <li><b>Dirección:</b> {{ $contribuyente->direccion }}</li>
                    </ul>
                </div>
            
        </div>
        <hr class="my-6 border-gray-200 dark:border-gray-700">
    
    <!-- Historial de Pagos -->
    
      
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white text-center">Historial de Pagos</h2>
            <!-- Tabla de historial de pagos -->
            <div class="overflow-x-hidden dark:bg-gray-900">
    @if ($historialPagos->isNotEmpty())
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50 dark:bg-gray-900">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Fecha de Pago</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Numero Recibo</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Importe Total</th>
                    <th class="px-6 py-3 text-xs font-medium uppercase tracking-wider">Estado</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900">
            @foreach($historialPagos as $pago)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pago->fecha_pago }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pago->num_recibo }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pago->total }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $pago->estado }}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p class="text-sm text-gray-500">No se encontraron registros de pagos de servicios</p>
    @endif
</div>
</div>
</div>
</div>
</body>

</html>
