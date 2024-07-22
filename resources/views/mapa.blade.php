@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa con Polígonos</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>

     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <style>
        #map { 
            height: 700px;
            width: 1110px; 
        }
    </style>

</head>
<div class="max-w-6xl mx-auto bg-white p-6 rounded shadow-md dark:bg-gray-900">
    <h2 class="text-3xl text-center font-extrabold dark:text-white">Información de la Propiedad</h2>
    <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700">
    @livewire('VerPropiedad', ['record'=> $propiedad])
    <br>
    <h2 class="text-3xl text-center font-extrabold dark:text-white">Mapa de la Propiedad</h2>
</div>
<body>
    <center>
        <div id="map"></div>
        <br>
        <a href="{{ route('propiedad') }}" class="inline-flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm text-center me-2 mb-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"/>
            </svg>
        </a>

    </center>
    <br>
    <br>
    <br>
    <br>

    <!-- <button href="{{ route('propiedad') }}">Regresar</button> -->

    <script>
        // Obtener las coordenadas del controlador
        var coordenadas = <?php echo json_encode($coordenadas); ?>;
        console.log(coordenadas);

        // Inicializa el mapa
        var map = L.map('map').setView(coordenadas[0], 19);

        // Cargar el mapa
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 30     ,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // crear lista de markers
        var markers = [];

        for (let i = 0; i < coordenadas.length; i++) {
            var marker = L.marker(coordenadas[i]).addTo(map);
            markers.push(marker);
        }
        // var marker = L.marker(coordenadas[0]).addTo(map);

        // Crea un polígono
        var polygon = L.polygon([coordenadas]).addTo(map);

    </script>

</body>

@endsection
