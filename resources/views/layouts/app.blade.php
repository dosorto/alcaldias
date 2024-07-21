<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')
    <link rel="icon" href="{{ asset('assets/css/alcaldias.jpg') }}" type="image/x-icon" alt="32">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
</head>

<body>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    </head>

    <body class="bg-white dark:bg-gray-900">

        <nav class=" bg-[#f5f5f7] border-gray-200 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('assets/css/alcaldias.jpg') }}" class="h-12 rounded-full" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Abrir Menú de Usuario</span>
                        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->img }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Inicio</a>
                            </li>
                            <li>
                                <a href="/perfil_usuario"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
                            </li>
                            <li>
                                <a type="button"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="is-hidden">
                                    @csrf
                                </form>

                            </li>
                        </ul>
                    </div>
                    <button data-collapse-toggle="navbar-user" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div id="mega-menu-icons"
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
                    <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                        <li>
                            <a href="/"
                                class="block py-2 px-3 text-blue-600 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-blue-500 md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700"
                                aria-current="page">Inicio</a>
                        </li>
                        <li>
                            @role('Administrador')
                            <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown"
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Administración
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button ton>
                            @endrole

                            <div id="mega-menu-icons-dropdown"
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-3 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('admin.users.index') }}"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Usuarios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <path d="M7.5,5C5.6,5,4,6.6,4,8.5S5.6,12,7.5,12S11,10.4,11,8.5S9.4,5,7.5,5z M16.5,5C14.6,5,13,6.6,13,8.5s1.6,3.5,3.5,3.5
                                                    S20,10.4,20,8.5S18.4,5,16.5,5z M7.5,14C2.6,14,1,18,1,18v2h13v-2C14,18,12.4,14,7.5,14z M16.5,14c-1.5,0-2.7,0.4-3.6,0.9
                                                    c1.4,1.2,2,2.6,2.1,2.7l0.1,0.2V20h8v-2C23,18,21.4,14,16.5,14z" />
                                                    <rect class="st0" width="30" height="30" />
                                                </svg>
                                                Usuarios
                                            </a>

                                        </li>
                                        <li>
                                            <a href="/contribuyente"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Contribuyentes</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z">
                                                        </path>
                                                    </g>
                                                    <rect class="st0" width="30" height="30" />
                                                </svg>
                                                Contribuyentes
                                            </a>
                                        </li>
                                        <li>
                                            <a href="role-list"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Roles</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" viewBox="0 0 1920 1920"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M1600 1066.667c117.653 0 213.333 95.68 213.333 213.333v106.667H1920V1760c0 88.213-71.787 160-160 160h-320c-88.213 0-160-71.787-160-160v-373.333h106.667V1280c0-117.653 95.68-213.333 213.333-213.333ZM800 0c90.667 0 179.2 25.6 254.933 73.6 29.867 18.133 58.667 40.533 84.267 66.133 49.067 49.067 84.8 106.88 108.053 169.814 11.307 30.4 20.8 61.44 25.814 94.08l2.24 14.613 3.626 20.16-.533.32v.213l-52.693 32.427c-44.694 28.907-95.467 61.547-193.067 61.867-.427 0-.747.106-1.173.106-24.534 0-46.08-2.133-65.28-5.653-.64-.107-1.067-.32-1.707-.427-56.32-10.773-93.013-34.24-126.293-55.68-9.6-6.293-18.774-12.16-28.16-17.6-27.947-16-57.92-27.306-108.16-27.306h-.32c-57.814.106-88.747 15.893-121.387 36.266-4.48 2.88-8.853 5.44-13.44 8.427-3.093 2.027-6.72 4.16-9.92 6.187-6.293 4.053-12.693 8.106-19.627 12.16-4.48 2.666-9.493 5.013-14.293 7.573-6.933 3.627-13.973 7.147-21.76 10.453-6.613 2.987-13.76 5.547-21.12 8.107-6.933 2.347-14.507 4.267-22.187 6.293-8.96 2.347-17.813 4.587-27.84 6.187-1.173.213-2.133.533-3.306.747v57.6c0 17.066 1.066 34.133 4.266 50.133C454.4 819.2 611.2 960 800 960c195.2 0 356.267-151.467 371.2-342.4 48-14.933 82.133-37.333 108.8-54.4v23.467c0 165.546-84.373 311.786-212.373 398.08h4.906a1641.19 1641.19 0 0 1 294.08 77.76C1313.28 1119.68 1280 1195.733 1280 1280h-106.667v480c0 1.387.427 2.667.427 4.16-142.933 37.547-272.427 49.173-373.76 49.173-345.493 0-612.053-120.32-774.827-221.333L0 1576.32v-196.373c0-140.054 85.867-263.04 218.667-313.28 100.373-38.08 204.586-64.96 310.186-82.347h4.8C419.52 907.413 339.2 783.787 323.2 640c-2.133-17.067-3.2-35.2-3.2-53.333V480c0-56.533 9.6-109.867 27.733-160C413.867 133.333 592 0 800 0Zm800 1173.333c-58.773 0-106.667 47.894-106.667 106.667v106.667h213.334V1280c0-58.773-47.894-106.667-106.667-106.667Z"
                                                            fill-rule="evenodd"></path>
                                                    </g>
                                                    <rect class="st0" width="30" height="30" />
                                                </svg>
                                                Roles
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/servicio"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Servicios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 600 600" version="1.1" id="svg9724"
                                                    sodipodi:docname="settings.svg"
                                                    inkscape:version="1.2.2 (1:1.2.2+202212051550+b0a8486541)"
                                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                    xmlns:svg="http://www.w3.org/2000/svg">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <defs id="defs9728"></defs>
                                                        <sodipodi:namedview id="namedview9726" pagecolor="#ffffff"
                                                            bordercolor="#666666" borderopacity="1.0"
                                                            inkscape:showpageshadow="2" inkscape:pageopacity="0.0"
                                                            inkscape:pagecheckerboard="0" inkscape:deskcolor="#d1d1d1"
                                                            showgrid="true" inkscape:zoom="1.1896171"
                                                            inkscape:cx="205.52832" inkscape:cy="369.44661"
                                                            inkscape:window-width="1920" inkscape:window-height="1009"
                                                            inkscape:window-x="0" inkscape:window-y="1080"
                                                            inkscape:window-maximized="1"
                                                            inkscape:current-layer="g10449" showguides="true">
                                                            <inkscape:grid type="xygrid" id="grid9972" originx="0"
                                                                originy="0"></inkscape:grid>
                                                        </sodipodi:namedview>
                                                        <g id="g10449"
                                                            transform="matrix(0.95173205,0,0,0.95115787,13.901174,12.168794)"
                                                            style="stroke-width:1.05103">
                                                            <path id="path1129"
                                                                style="stroke-linecap:round;stroke-linejoin:round;-inkscape-stroke:none;paint-order:stroke fill markers"
                                                                d="m -899.99998,-310.79461 c -20.43409,0 -40.0078,4.62259 -52.90398,19.2757 -12.89618,14.65312 -13.31011,30.27623 -14.05636,39.78187 -0.74624,9.50565 -1.36732,15.42265 -2.80675,19.0879 -1.43942,3.66526 -2.62672,6.46545 -11.63186,11.66458 -9.00514,5.19911 -12.02109,4.82429 -15.91499,4.23825 -3.89398,-0.58605 -9.32638,-3.00427 -17.93168,-7.11083 -8.6053,-4.10655 -22.3462,-11.56116 -41.4843,-7.71929 -19.138,3.84186 -32.9287,18.48118 -43.1458,36.17762 -10.2171,17.69644 -15.9985,36.95986 -9.7566,55.45483 6.2418,18.49497 19.5659,26.66798 27.4249,32.06708 7.859,5.39908 12.6704,8.893362 15.1249,11.972567 2.4545,3.079205 4.2876,5.506097 4.2876,15.904332 0,10.398237 -1.8331,12.825128 -4.2876,15.904333 -2.4545,3.079204 -7.2659,6.57348 -15.1249,11.972569 -7.859,5.39909 -21.1831,13.572101 -27.4249,32.067077 -6.2419,18.4949758 -0.4605,37.758386 9.7566,55.454828 10.2171,17.696443 24.0078,32.335764 43.1458,36.177623 19.1381,3.84186 32.879,-3.612739 41.4843,-7.719295 8.6053,-4.106556 14.0377,-6.52478 17.93168,-7.110826 3.8939,-0.586047 6.90985,-0.960867 15.91499,4.238251 9.00514,5.199118 10.19243,7.999328 11.63186,11.664579 1.43943,3.665252 2.06051,9.582259 2.80675,19.087903 0.74625,9.505639 1.16018,25.128749 14.05636,39.781869 12.89618,14.65311 32.46989,19.2757 52.90398,19.2757 20.43409,0 40.0078,-4.62259 52.90398,-19.2757 12.89617,-14.65312 13.31011,-30.27623 14.05635,-39.781869 0.74624,-9.505644 1.36733,-15.422651 2.80676,-19.087903 1.43942,-3.665251 2.62672,-6.465461 11.63186,-11.664579 9.00513,-5.199119 12.02108,-4.824297 15.91499,-4.238251 3.89392,0.586046 9.32639,3.004271 17.93164,7.110826 8.60525,4.106555 22.34625,11.561156 41.48432,7.719295 19.13806,-3.84186 32.92874,-18.481179 43.14579,-36.177623 10.21705,-17.696442 15.99856,-36.9598523 9.75668,-55.454828 -6.24189,-18.494976 -19.56594,-26.667988 -27.42495,-32.067077 -7.859,-5.399088 -12.67039,-8.893365 -15.12488,-11.972569 -2.45449,-3.079205 -4.28764,-5.506097 -4.28764,-15.904333 0,-10.398236 1.83315,-12.825127 4.28764,-15.904332 2.45449,-3.079205 7.26588,-6.573487 15.12488,-11.972567 7.85901,-5.3991 21.18307,-13.57211 27.42495,-32.06708 6.24188,-18.49497 0.46037,-37.75839 -9.75668,-55.45483 -10.21705,-17.69644 -24.00773,-32.33576 -43.14579,-36.17762 -19.13807,-3.84186 -32.87907,3.61274 -41.48432,7.71929 -8.60525,4.10656 -14.03772,6.52478 -17.93164,7.11083 -3.89391,0.58604 -6.90986,0.96086 -15.91499,-4.23825 -9.00514,-5.19913 -10.19243,-7.99932 -11.63186,-11.66458 -1.43943,-3.66525 -2.06052,-9.58225 -2.80676,-19.0879 -0.74624,-9.50564 -1.16018,-25.12875 -14.05635,-39.78187 -12.89618,-14.65311 -32.46989,-19.2757 -52.90398,-19.2757 z m 0.0181,130.78031 c 55.63168,0 100.16735,44.4506 100.16735,100.014299 0,55.563699 -44.53567,100.014302 -100.16735,100.014302 -55.63168,0 -100.16738,-44.450603 -100.16738,-100.014302 0,-55.563699 44.5357,-100.014299 100.16738,-100.014299 z"
                                                                transform="matrix(1.3636076,0,0,1.3667651,1527.8554,411.9526)"
                                                                sodipodi:nodetypes="ssssssssscssssscssssssssssssssssssssssssssssssssssssss">
                                                            </path>
                                                            <g id="path10026" inkscape:transform-center-x="-0.59233046"
                                                                inkscape:transform-center-y="-20.347403"
                                                                transform="matrix(1.3807551,0,0,1.2700888,273.60014,263.99768)">
                                                            </g>
                                                            <g id="g11314"
                                                                transform="matrix(1.5092301,0,0,1.3955555,36.774048,-9.4503933)"
                                                                style="stroke-width:50.6951"></g>
                                                            <path
                                                                style="color:#000000;fill:#020202;stroke-width:1.05103;stroke-linejoin:round;-inkscape-stroke:none;paint-order:stroke fill markers"
                                                                d="m 300.60937,218.51428 c -46.03938,0 -84.05805,38.06434 -84.05805,84.09712 0,46.03278 38.01867,84.09711 84.05805,84.09711 46.03938,0 84.05649,-38.06433 84.05649,-84.09711 0,-46.03278 -38.01711,-84.09712 -84.05649,-84.09712 z"
                                                                id="path344" sodipodi:nodetypes="sssss"></path>
                                                        </g>
                                                    </g>

                                                </svg>
                                                Servicios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/niveles"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Niveles de servicio</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" width="1000px" height="1000px"
                                                    viewBox="0 0 48 48">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <g id="SVGRepo_iconCarrier">
                                                        <title>service-setting</title>
                                                        <g id="Layer_2" data-name="Layer 2">
                                                            <g id="invisible_box" data-name="invisible box">
                                                                <rect width="48" height="48" fill="none" />
                                                                <rect width="48" height="48" fill="none" />
                                                                <rect width="48" height="48" fill="none" />
                                                            </g>
                                                            <g id="icons_Q2" data-name="icons Q2">
                                                                <g>
                                                                    <path
                                                                        d="M28.7,18.8l-1.8,2.9,1.4,1.4,2.9-1.8,1,.4L33,25h2l.8-3.3,1-.4,2.9,1.8,1.4-1.4-1.8-2.9a4.2,4.2,0,0,0,.4-1L43,17V15l-3.3-.8a4.2,4.2,0,0,0-.4-1l1.8-2.9L39.7,8.9l-2.9,1.8-1-.4L35,7H33l-.8,3.3-1,.4L28.3,8.9l-1.4,1.4,1.8,2.9a4.2,4.2,0,0,0-.4,1L25,15v2l3.3.8A4.2,4.2,0,0,0,28.7,18.8ZM34,14a2,2,0,1,1-2,2A2,2,0,0,1,34,14Z" />
                                                                    <path
                                                                        d="M42.2,28.7a5.2,5.2,0,0,0-4-1.1l-9.9,1.8a4.5,4.5,0,0,0-1.4-3.3L19.8,19H5a2,2,0,0,0,0,4H18.2l5.9,5.9a.8.8,0,0,1-1.2,1.2l-3.5-3.5a2,2,0,0,0-2.8,2.8l3.5,3.5a4.5,4.5,0,0,0,3.4,1.4,5.7,5.7,0,0,0,1.8-.3h0l13.6-2.4a1,1,0,0,1,.8.2.9.9,0,0,1,.3.7,1,1,0,0,1-.8,1L20.6,36.9,9.7,28H5a2,2,0,0,0,0,4H8.3l11.1,9.1,20.5-3.7a5,5,0,0,0,2.3-8.7Z" />
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>

                                                </svg>
                                                Niveles de Servicio
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tipos"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Tipos de Servicios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 16 16">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <path
                                                                d="M6.834.33a2.25 2.25 0 012.332 0l5.25 3.182A2.25 2.25 0 0115.5 5.436V6A.75.75 0 0114 6v-.564a.75.75 0 00-.361-.642l-5.25-3.181a.75.75 0 00-.778 0l-5.25 3.181A.75.75 0 002 5.436v5.128a.75.75 0 00.361.642l4.028 2.44a.75.75 0 11-.778 1.283l-4.027-2.44A2.25 2.25 0 01.5 10.563V5.436a2.25 2.25 0 011.084-1.924L6.834.33z">
                                                            </path>
                                                            <path fill-rule="evenodd"
                                                                d="M11.749 7.325l.001-.042v-.286a.75.75 0 00-1.5 0v.286l.001.042a3.73 3.73 0 00-1.318.546.76.76 0 00-.03-.03l-.201-.203a.75.75 0 00-1.06 1.06l.201.203.03.028c-.26.394-.45.84-.547 1.319a.878.878 0 00-.04-.001H7a.75.75 0 000 1.5h.286l.038-.001c.097.48.286.926.547 1.32a.71.71 0 00-.028.027l-.202.202a.75.75 0 001.06 1.06l.203-.202a.695.695 0 00.025-.026c.395.261.842.45 1.322.548l-.001.036v.286a.75.75 0 001.5 0v-.286-.036c.48-.097.926-.287 1.32-.548l.026.026.202.203a.75.75 0 001.06-1.061l-.201-.202a.667.667 0 00-.028-.026c.261-.395.45-.842.547-1.321H15a.75.75 0 000-1.5h-.286l-.04.002a3.734 3.734 0 00-.547-1.319l.03-.028.202-.202a.75.75 0 00-1.06-1.061l-.203.202-.029.03a3.73 3.73 0 00-1.318-.545zM11 8.75A2.247 2.247 0 008.75 11 2.247 2.247 0 0011 13.25 2.247 2.247 0 0013.25 11 2.247 2.247 0 0011 8.75z"
                                                                clip-rule="evenodd"></path>
                                                        </g>
                                                    </g>

                                                </svg>
                                                Tipos de Servicios
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 text-gray-900 dark:text-white">
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/profesion-oficio"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Profesión U Oficio</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    x="0px" y="0px" viewBox="0 0 300 300" xml:space="preserve">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M224.8,102.8c5.5,5.5,5.4,14.3,0,19.8l-34.9,34.6c-2.5,2.5-5.9,3.9-9.4,3.9H130v107H48v-96H38v82c0,7.7-6.3,14-14,14 s-14-6.3-14-14v-88.5c0-17.9,14.6-32.5,32.5-32.5h24.4L83,167.4V133h10v34.4l16.1-34.4h65.7l30.2-30.2c1.7-1.7,3.8-2.9,5.9-3.5V116 c0,2.3,2,4.2,4.4,4c2.1-0.2,3.6-2.1,3.6-4.2V99.3C221.1,100,223.1,101.1,224.8,102.8z M88.7,122.7c14.8,0,26.9-12,26.9-26.9 S103.6,69,88.7,69c-14.8,0-26.9,12-26.9,26.9C61.9,110.7,73.9,122.7,88.7,122.7z M236.4,70.6c0,11.8-9.6,21.5-21.4,21.5 s-21.5-9.6-21.5-21.5s9.6-21.5,21.5-21.5S236.4,58.7,236.4,70.6z M228.4,70.6c0-7.4-6-13.5-13.4-13.5c-7.4,0-13.5,6-13.5,13.5 S207.6,84,215,84C222.4,84,228.4,78,228.4,70.6z M276,38v8h8v-8H276z M276,128v8h8v-8H276z M276,156v8h8v-8H276z M276,184v8h8v-8 H276z M246,55v8h8v-8H246z M246,27v8h8v-8H246z M246,83v8h8v-8H246z M246,111v8h8v-8H246z M246,201v8h8v-8H246z M246,229v8h8v-8H246 z M246,257v8h8v-8H246z M288,100h-4V66h-13c-2.2,0-4,1.8-4,4s1.8,4,4,4h5v26h-4c-2.2,0-4,1.8-4,4s1.8,4,4,4h16c2.2,0,4-1.8,4-4 S290.2,100,288,100z M276,274v8h8v-8H276z M288,246h-4v-34h-13c-2.2,0-4,1.8-4,4s1.8,4,4,4h5v26h-4c-2.2,0-4,1.8-4,4s1.8,4,4,4h16 c2.2,0,4-1.8,4-4S290.2,246,288,246z M264,177v-34c0-2.2-1.8-4-4-4h-20c-2.2,0-4,1.8-4,4v34c0,2.2,1.8,4,4,4h20 C262.2,181,264,179.2,264,177z M244,147h12v26h-12V147z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Profesión U Oficio
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tipo-documento"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Tipo Documento</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M9.29289 1.29289C9.48043 1.10536 9.73478 1 10 1H18C19.6569 1 21 2.34315 21 4V20C21 21.6569 19.6569 23 18 23H6C4.34315 23 3 21.6569 3 20V8C3 7.73478 3.10536 7.48043 3.29289 7.29289L9.29289 1.29289ZM18 3H11V8C11 8.55228 10.5523 9 10 9H5V20C5 20.5523 5.44772 21 6 21H18C18.5523 21 19 20.5523 19 20V4C19 3.44772 18.5523 3 18 3ZM6.41421 7H9V4.41421L6.41421 7ZM7 13C7 12.4477 7.44772 12 8 12H16C16.5523 12 17 12.4477 17 13C17 13.5523 16.5523 14 16 14H8C7.44772 14 7 13.5523 7 13ZM7 17C7 16.4477 7.44772 16 8 16H16C16.5523 16 17 16.4477 17 17C17 17.5523 16.5523 18 16 18H8C7.44772 18 7 17.5523 7 17Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Tipo Documento
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            @hasanyrole('Administrador|Contador')
                            <button id="mega-menu-icons-dropdown-button"
                                data-dropdown-toggle="mega-menu-icons-dropdown1"
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Caja
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            @endhasanyrole

                            <div id="mega-menu-icons-dropdown1"
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="/suscripciones"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Suscripciones</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.18182 12.0909C8.18182 9.98455 9.89364 8.27273 12 8.27273C12.6427 8.27273 13.2536 8.43182 13.7818 8.71818L14.7109 7.78909C13.9282 7.29273 12.9991 7 12 7C9.18727 7 6.90909 9.27818 6.90909 12.0909H5L7.54545 14.6364L10.0909 12.0909H8.18182ZM16.4545 9.54545L13.9091 12.0909H15.8182C15.8182 14.1973 14.1064 15.9091 12 15.9091C11.3573 15.9091 10.7464 15.75 10.2182 15.4636L9.28909 16.3927C10.0718 16.8891 11.0009 17.1818 12 17.1818C14.8127 17.1818 17.0909 14.9036 17.0909 12.0909H19L16.4545 9.54545Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Suscripciones
                                            </a>

                                        </li>
                                        <li>
                                            <a href="/pago-servicio"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Pago de Servicios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" height="400px" width="400px" version="1.1"
                                                    id="Money" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 128 128" xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="_x34__5_">
                                                            <path
                                                                d="M17.6,41.9v53h102.3v-53H17.6z M37.5,87.6h-12v-12h2.4v9.6h9.6V87.6z M37.5,51.5h-9.6v9.6h-2.4v-12h12V51.5z M68.8,87.6 c-10.6,0-19.3-8.6-19.3-19.3c0-10.6,8.6-19.3,19.3-19.3s19.3,8.6,19.3,19.3C88.1,79,79.4,87.6,68.8,87.6z M113.3,87.6h-12v-2.4h9.6 v-9.6h2.4V87.6z M113.3,61.1h-2.4v-9.6h-9.6v-2.4h12V61.1z">
                                                            </path>
                                                        </g>
                                                        <path id="_x33__9_"
                                                            d="M76.7,73c0-3.2-1.9-5.4-6-6.9c-3-1.1-4.3-1.8-4.3-3.2c0-1.2,1.1-2.2,3.3-2.2c2.3,0,3.9,0.6,4.8,1.1l1.2-4.2 c-1-0.5-2.3-0.9-4-1.1v-3.4h-5.9v4c-2.9,1.1-4.6,3.4-4.6,6.2c0,3.3,2.5,5.5,6.3,6.8c2.8,1,3.9,1.8,3.9,3.2c0,1.5-1.3,2.5-3.6,2.5 c-2.2,0-4.4-0.7-5.8-1.4l-1.1,4.3c1,0.6,2.9,1.1,4.9,1.3v3.3h5.9v-3.8C75.1,78.4,76.7,75.9,76.7,73z">
                                                        </path>
                                                        <polygon id="_x32__17_"
                                                            points="115.1,37 12.8,37 12.8,89.4 15.2,89.4 15.2,39.5 115.1,39.5 ">
                                                        </polygon>
                                                        <polygon id="_x31__6_"
                                                            points="110.3,32.2 8,32.2 8,84.6 10.4,84.6 10.4,34.6 110.3,34.6 ">
                                                        </polygon>
                                                    </g>
                                                </svg>
                                                Pago de Servicios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/perfil"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Historial</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <rect x="0" fill="none" width="24" height="24">
                                                        </rect>
                                                        <g>
                                                            <path
                                                                d="M2.12 13.526c.742 4.78 4.902 8.47 9.88 8.47 5.5 0 10-4.5 10-9.998S17.5 2 12 2C8.704 2 5.802 3.6 4 6V2H2.003L2 9h7V7H5.8c1.4-1.8 3.702-3 6.202-3C16.4 4 20 7.6 20 11.998s-3.6 8-8 8c-3.877 0-7.13-2.795-7.848-6.472H2.12z">
                                                            </path>
                                                            <path d="M11.002 7v5.3l3.2 4.298 1.6-1.197-2.8-3.7V7">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                Historial
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            @hasanyrole('Administrador|Contador')
                            <button id="mega-menu-icons-dropdown-button"
                                data-dropdown-toggle="mega-menu-icons-dropdown10"
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Facturas
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            @endhasanyrole

                            <div id="mega-menu-icons-dropdown10"
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="/sesiones"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Cobros</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.18182 12.0909C8.18182 9.98455 9.89364 8.27273 12 8.27273C12.6427 8.27273 13.2536 8.43182 13.7818 8.71818L14.7109 7.78909C13.9282 7.29273 12.9991 7 12 7C9.18727 7 6.90909 9.27818 6.90909 12.0909H5L7.54545 14.6364L10.0909 12.0909H8.18182ZM16.4545 9.54545L13.9091 12.0909H15.8182C15.8182 14.1973 14.1064 15.9091 12 15.9091C11.3573 15.9091 10.7464 15.75 10.2182 15.4636L9.28909 16.3927C10.0718 16.8891 11.0009 17.1818 12 17.1818C14.8127 17.1818 17.0909 14.9036 17.0909 12.0909H19L16.4545 9.54545Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Cobros
                                            </a>

                                        </li>
                                        <li>
                                            <a href="/reporte"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Historial de pagos</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" height="400px" width="400px" version="1.1"
                                                    id="Money" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 128 128" xml:space="preserve">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g id="_x34__5_">
                                                            <path
                                                                d="M17.6,41.9v53h102.3v-53H17.6z M37.5,87.6h-12v-12h2.4v9.6h9.6V87.6z M37.5,51.5h-9.6v9.6h-2.4v-12h12V51.5z M68.8,87.6 c-10.6,0-19.3-8.6-19.3-19.3c0-10.6,8.6-19.3,19.3-19.3s19.3,8.6,19.3,19.3C88.1,79,79.4,87.6,68.8,87.6z M113.3,87.6h-12v-2.4h9.6 v-9.6h2.4V87.6z M113.3,61.1h-2.4v-9.6h-9.6v-2.4h12V61.1z">
                                                            </path>
                                                        </g>
                                                        <path id="_x33__9_"
                                                            d="M76.7,73c0-3.2-1.9-5.4-6-6.9c-3-1.1-4.3-1.8-4.3-3.2c0-1.2,1.1-2.2,3.3-2.2c2.3,0,3.9,0.6,4.8,1.1l1.2-4.2 c-1-0.5-2.3-0.9-4-1.1v-3.4h-5.9v4c-2.9,1.1-4.6,3.4-4.6,6.2c0,3.3,2.5,5.5,6.3,6.8c2.8,1,3.9,1.8,3.9,3.2c0,1.5-1.3,2.5-3.6,2.5 c-2.2,0-4.4-0.7-5.8-1.4l-1.1,4.3c1,0.6,2.9,1.1,4.9,1.3v3.3h5.9v-3.8C75.1,78.4,76.7,75.9,76.7,73z">
                                                        </path>
                                                        <polygon id="_x32__17_"
                                                            points="115.1,37 12.8,37 12.8,89.4 15.2,89.4 15.2,39.5 115.1,39.5 ">
                                                        </polygon>
                                                        <polygon id="_x31__6_"
                                                            points="110.3,32.2 8,32.2 8,84.6 10.4,84.6 10.4,34.6 110.3,34.6 ">
                                                        </polygon>
                                                    </g>
                                                </svg>
                                                Historial de pagos
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            @role('Administrador')
                            <button id="mega-menu-icons-dropdown-button"
                                data-dropdown-toggle="mega-menu-icons-dropdown2"
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Localidad
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            @endrole
                            <div id="mega-menu-icons-dropdown2"
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-2 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('pais') }}"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">País</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <rect x="0" fill="none" width="20" height="20">
                                                        </rect>
                                                        <g>
                                                            <path
                                                                d="M9 0C4.03 0 0 4.03 0 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm3.46 11.95c0 1.47-.8 3.3-4.06 4.7.3-4.17-2.52-3.69-3.2-5 .126-1.1.804-2.063 1.8-2.55-1.552-.266-3-.96-4.18-2 .05.47.28.904.64 1.21-.782-.295-1.458-.817-1.94-1.5.977-3.225 3.883-5.482 7.25-5.63-.84 1.38-1.5 4.13 0 5.57C7.23 7 6.26 5 5.41 5.79c-1.13 1.06.33 2.51 3.42 3.08 3.29.59 3.66 1.58 3.63 3.08zm1.34-4c-.32-1.11.62-2.23 1.69-3.14 1.356 1.955 1.67 4.45.84 6.68-.77-1.89-2.17-2.32-2.53-3.57v.03z">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                País
                                            </a>

                                        </li>
                                        <li>
                                            <a href="/departamentos"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Departamentos</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <rect x="0" fill="none" width="100" height="100">
                                                        </rect>
                                                        <g>
                                                            <path
                                                                d="M13 13.14l1.17-5.94c.79-.43 1.33-1.25 1.33-2.2 0-1.38-1.12-2.5-2.5-2.5S10.5 3.62 10.5 5c0 .95.54 1.77 1.33 2.2zm0-9.64c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm1.72 4.8L18 6.97v9L13.12 18 7 15.97l-5 2v-9l5-2 4.27 1.41 1.73 7.3z">
                                                            </path>
                                                        </g>
                                                    </g>

                                                </svg>
                                                Departamentos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/municipios"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Municipios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M70.285 9.965a1.601 1.601 0 0 0-1.639 1.61l.37 64.608a1.601 1.601 0 0 0 .925 1.444l25.282 11.744a1.601 1.601 0 0 0 2.277-1.453V23.483a1.601 1.601 0 0 0-.926-1.453L70.923 10.113a1.601 1.601 0 0 0-.638-.148zm-7.53.36a1.601 1.601 0 0 0-.653.149l-26.35 12.242a1.601 1.601 0 0 0-.925 1.461l.367 64.264a1.601 1.601 0 0 0 2.276 1.445l26.35-12.242a1.601 1.601 0 0 0 .926-1.461l-.367-64.264a1.601 1.601 0 0 0-1.624-1.593zm-58.616.318a1.601 1.601 0 0 0-1.639 1.6v64.434a1.601 1.601 0 0 0 .926 1.45l25.222 11.72a1.601 1.601 0 0 0 2.276-1.46l-.369-64.608a1.601 1.601 0 0 0-.926-1.445L4.777 10.791a1.601 1.601 0 0 0-.638-.148z"
                                                            fill-rule="evenodd"></path>
                                                    </g>

                                                </svg>
                                                Municipios
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4">
                                        <li>
                                            <a href="/aldeas"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Aldeas</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 100 100" version="1.1" id="svg9724"
                                                    sodipodi:docname="settings.svg"
                                                    inkscape:version="1.2.2 (1:1.2.2+202212051550+b0a8486541)"
                                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                    xmlns:svg="http://www.w3.org/2000/svg">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M50.001 0C33.65 0 20.25 13.36 20.25 29.666c0 6.318 2.018 12.19 5.433 17.016L46.37 82.445c2.897 3.785 4.823 3.066 7.232-.2l22.818-38.83c.46-.834.822-1.722 1.137-2.629a29.28 29.28 0 0 0 2.192-11.12C79.75 13.36 66.354 0 50.001 0zm0 13.9c8.806 0 15.808 6.986 15.808 15.766c0 8.78-7.002 15.763-15.808 15.763c-8.805 0-15.81-6.982-15.81-15.763c0-8.78 7.005-15.765 15.81-15.765z">
                                                        </path>
                                                        <path
                                                            d="M68.913 48.908l-.048.126c.015-.038.027-.077.042-.115l.006-.011z"
                                                            fill="#000000"></path>
                                                        <path
                                                            d="M34.006 69.057C19.88 71.053 10 75.828 10 82.857C10 92.325 26.508 100 50 100s40-7.675 40-17.143c0-7.029-9.879-11.804-24.004-13.8l-1.957 3.332C74.685 73.866 82 76.97 82 80.572c0 5.05-14.327 9.143-32 9.143c-17.673 0-32-4.093-32-9.143c-.001-3.59 7.266-6.691 17.945-8.174c-.645-1.114-1.294-2.226-1.94-3.341z">
                                                        </path>
                                                    </g>

                                                </svg>
                                                Aldeas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/barrios"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Barrios</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" width="1000px" height="1000px"
                                                    viewBox="0 0 512 512">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M256,0C149.3,0,64,85.3,64,192c0,36.9,11,65.4,30.1,94.3l141.7,215v0c4.3,6.5,11.7,10.7,20.2,10.7c8.5,0,16-4.3,20.2-10.7 l141.7-215C437,257.4,448,228.9,448,192C448,85.3,362.7,0,256,0z M256,298.6c-58.9,0-106.7-47.8-106.7-106.8 c0-59,47.8-106.8,106.7-106.8c58.9,0,106.7,47.8,106.7,106.8C362.7,250.8,314.9,298.6,256,298.6z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Barrios
                                            </a>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </li>

                       <!-- Prueba Catastro -->
                       <li>
                            @hasanyrole('Administrador|Catastro')
                            <button id="mega-menu-icons-dropdown-button"
                                data-dropdown-toggle="mega-menu-icons-dropdown4"
                                class="flex items-center justify-between w-full py-2 px-3 font-medium text-gray-900 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">
                                Catastro
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            @endhasanyrole

                            <div id="mega-menu-icons-dropdown4"
                                class="absolute z-10 grid hidden w-auto grid-cols-2 text-sm bg-white border border-gray-100 rounded-lg shadow-md dark:border-gray-700 md:grid-cols-1 dark:bg-gray-700">
                                <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                                    <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                        <li>
                                            <a href="{{ route('tipo-propiedad') }}"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Cobros</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM8.18182 12.0909C8.18182 9.98455 9.89364 8.27273 12 8.27273C12.6427 8.27273 13.2536 8.43182 13.7818 8.71818L14.7109 7.78909C13.9282 7.29273 12.9991 7 12 7C9.18727 7 6.90909 9.27818 6.90909 12.0909H5L7.54545 14.6364L10.0909 12.0909H8.18182ZM16.4545 9.54545L13.9091 12.0909H15.8182C15.8182 14.1973 14.1064 15.9091 12 15.9091C11.3573 15.9091 10.7464 15.75 10.2182 15.4636L9.28909 16.3927C10.0718 16.8891 11.0009 17.1818 12 17.1818C14.8127 17.1818 17.0909 14.9036 17.0909 12.0909H19L16.4545 9.54545Z">
                                                        </path>
                                                    </g>
                                                </svg>
                                                Tipo Propiedad
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('propiedad') }}"
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">Cobros</span>
                                                <svg class="w-4 h-4 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v13c0 .552.448 1 1 1h18c.552 0 1-.448 1-1V7l-10-5zm0 2.18l7 3.3V20H5V7.48l7-3.3zm1 5.82h-2v2h2v-2zm0 4h-2v2h2v-2zm-4-4H7v2h2v-2zm0 4H7v2h2v-2zm8-4h-2v2h2v-2zm0 4h-2v2h2v-2z"/>
                        </svg>
                                                Propiedades
                                            </a>
                                        </li>
                                    
                              
                        
                                        <!-- Prueba Catastro fin -->
                                        <!-- Prueba Georreferenciacion  -->
                                        <li>
                                            <a href='/Georreferenciacion'
                                                class="flex items-center text-gray-500 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                                <span class="sr-only">georeferenciaciones</span>
                                                <svg class="w-3 h-3 me-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 100 100" version="1.1" id="svg9724"
                                                    sodipodi:docname="settings.svg"
                                                    inkscape:version="1.2.2 (1:1.2.2+202212051550+b0a8486541)"
                                                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                                                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                                                    xmlns:svg="http://www.w3.org/2000/svg">
                                                    <style type="text/css">
                                                        .st0 {
                                                            fill: none;
                                                        }
                                                    </style>
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M50.001 0C33.65 0 20.25 13.36 20.25 29.666c0 6.318 2.018 12.19 5.433 17.016L46.37 82.445c2.897 3.785 4.823 3.066 7.232-.2l22.818-38.83c.46-.834.822-1.722 1.137-2.629a29.28 29.28 0 0 0 2.192-11.12C79.75 13.36 66.354 0 50.001 0zm0 13.9c8.806 0 15.808 6.986 15.808 15.766c0 8.78-7.002 15.763-15.808 15.763c-8.805 0-15.81-6.982-15.81-15.763c0-8.78 7.005-15.765 15.81-15.765z">
                                                        </path>
                                                        <path
                                                            d="M68.913 48.908l-.048.126c.015-.038.027-.077.042-.115l.006-.011z"
                                                            fill="#000000"></path>
                                                        <path
                                                            d="M34.006 69.057C19.88 71.053 10 75.828 10 82.857C10 92.325 26.508 100 50 100s40-7.675 40-17.143c0-7.029-9.879-11.804-24.004-13.8l-1.957 3.332C74.685 73.866 82 76.97 82 80.572c0 5.05-14.327 9.143-32 9.143c-17.673 0-32-4.093-32-9.143c-.001-3.59 7.266-6.691 17.945-8.174c-.645-1.114-1.294-2.226-1.94-3.341z">
                                                        </path>
                                                    </g>

                                                </svg>
                                                Georreferenciación
                                            </a>

                                        </li>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Prueva Geolocalizacion fin -->
            <li>
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            </ul>

            </div>


            </div>
        </nav>




        <div class="bg-white dark:bg-gray-900">
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            var themeToggleBtn = document.getElementById('theme-toggle');

            themeToggleBtn.addEventListener('click', function () {

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
        @yield('js')
        @livewire('notifications')
        
        @filamentScripts
        @livewireScripts()



    </body>

</html>